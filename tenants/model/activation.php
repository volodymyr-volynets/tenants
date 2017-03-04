<?php

class numbers_tenants_tenants_model_activation {

	/**
	 * Activate module
	 *
	 * @param string $module_code
	 * @param string $module_name
	 * @param array $options
	 */
	public static function activate_module(string $module_code, $module_name = null, array $options = []) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		do {
			$modules = numbers_tenants_tenants_datasource_activation_module_modules::get_static();
			if (empty($modules[$module_code])) {
				$result['error'][] = 'Module cannot be activated!';
				break;
			}
			$model = new numbers_tenants_tenants_model_modules();
			$model->db_object->begin();
			// save new module
			if (empty($module_name)) {
				$module_name = $modules[$module_code]['sm_module_name'];
			}
			$module_result = $model->collection()->merge([
				'tm_module_module_code' => $module_code,
				'tm_module_name' => $module_name,
				'tm_module_inactive' => 0
			]);
			if (!$module_result['success']) {
				$result['error'] = array_merge($result['error'], $module_result['error']);
				break;
			}
			$module_id = $module_result['new_serials']['tm_module_id'];
			// activate default features
			$default_features = numbers_backend_system_modules_model_module_features::get_static([
				'where' => [
					'sm_feature_module_code' => $module_code,
					'sm_feature_type' => 10,
					'sm_feature_inactive' => 0
				]
			]);
			foreach ($default_features as $k => $v) {
				$feature_result = self::activate_feature($module_id, $module_code, $v['sm_feature_code']);
				if (!$feature_result['success']) {
					$result['error'] = array_merge($result['error'], $feature_result['error']);
					goto finish;
				}
			}
			// commit if we got here
			$model->db_object->commit();
			$result['success'] = true;
		} while(0);
finish:
		return $result;
	}

	/**
	 * Activate feature
	 *
	 * @param int $module_id
	 * @param string $feature_code
	 * @param array $options
	 */
	public static function activate_feature(int $module_id, string $module_code, string $feature_code, array $options = []) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		do {
			$model = new numbers_tenants_tenants_model_modules();
			$model->db_object->begin();
			$feature_model = new numbers_tenants_tenants_model_module_features();
			// check dependencies
			$feature_collection = new numbers_backend_system_modules_model_collection_module_features();
			$feature_result = $feature_collection->get([
				'where' => [
					'sm_feature_code' => $feature_code
				],
				'single_row' => true
			]);
			if (!$feature_result['success']) {
				$result['error'] = array_merge($result['error'], $feature_result['error']);
				break;
			}
			if (empty($feature_result['data'])) {
				$result['error'][] = object_content_messages::record_not_found;
				$model->db_object->rollback();
				break;
			}
			// grab module code from features
			if (empty($module_code)) {
				$module_code = $feature_result['data']['sm_feature_module_code'];
			}
			if ($feature_result['data']['sm_feature_type'] != 30) {
				// see if we have a feature
				$feature_check = $feature_model->get([
					'where' => [
						'tm_feature_module_id' => $module_id,
						'tm_feature_feature_code' => $feature_code
					]
				]);
				if (!empty($feature_check)) {
					goto success;
				}
			}
			// see if we have dependencies
			if (!empty($feature_result['data']['numbers_backend_system_modules_model_module_dependencies'])) {
				// see if module is already active
				$already_active_modules_result = $model->get([
					'where' => [
						'tm_module_inactive' => 0
					],
					'pk' => ['tm_module_module_code']
				]);
				$already_active_features_result = $feature_model->get([
					'where' => [
						'tm_feature_inactive' => 0
					],
					'pk' => ['tm_feature_module_code', 'tm_feature_feature_code']
				]);
				// check dependencies
				foreach ($feature_result['data']['numbers_backend_system_modules_model_module_dependencies'] as $k => $v) {
					// see if we have a feature from another module
					if ($v['sm_mdldep_child_module_code'] != $module_code && empty($already_active_modules_result[$v['sm_mdldep_child_module_code']])) {
						$result['error'][] = 'You need to activate ' . $v['sm_mdldep_child_module_code'] . ' module first!';
						$model->db_object->rollback();
						goto finish;
					} else if ($v['sm_mdldep_child_module_code'] != $module_code) {
						if (empty($already_active_features_result[$v['sm_mdldep_child_module_code']][$v['sm_mdldep_child_feature_code']])) {
							$result['error'][] = 'You need to activate ' . $v['sm_mdldep_child_module_code'] . ' module and ' . $v['sm_mdldep_child_feature_code'] . ' feature first!';
							$model->db_object->rollback();
							goto finish;
						}
					}
					// we activate features from the same module
					if ($v['sm_mdldep_child_module_code'] == $module_code) {
						// see if we have a feature
						$feature_check = $feature_model->get([
							'where' => [
								'tm_feature_module_id' => $module_id,
								'tm_feature_feature_code' => $v['sm_mdldep_child_feature_code']
							]
						]);
						if (!empty($feature_check)) continue;
						// activate dependent feature if its the same module
						$activation_dependency_result = self::activate_feature($module_id, $v['sm_mdldep_child_module_code'], $v['sm_mdldep_child_feature_code']);
						if (!$activation_dependency_result['success']) {
							$result['error'] = array_merge($result['error'], $activation_dependency_result['error']);
							break;
						}
					}
				}
			}
			// activation model
			if (!empty($feature_result['data']['sm_feature_activation_model'])) {
				$activation_model_class = $feature_result['data']['sm_feature_activation_model'];
				$activation_model_model = new $activation_model_class();
				$activation_model_result = $activation_model_model->activate();
				if (!$activation_model_result['success']) {
					$result['error'] = array_merge($result['error'], $activation_model_result['error']);
					break;
				}
			}
			// save
			$activation_result = $feature_model->collection()->merge([
				'tm_feature_module_id' => $module_id,
				'tm_feature_module_code' => $module_code,
				'tm_feature_feature_code' => $feature_code,
				'tm_feature_inactive' => 0
			]);
			if (!$activation_result['success']) {
				$result['error'] = array_merge($result['error'], $activation_result['error']);
				break;
			}
success:
			// commit if we got here
			$model->db_object->commit();
			$result['success'] = true;
		} while(0);
finish:
		return $result;
	}
}