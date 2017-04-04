<?php

class numbers_tenants_tenants_datasource_module_features extends \Object\Datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['module_id', 'feature_code'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'module_name' => 'name',
		'feature_name' => 'name'
	];
	public $column_prefix;

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Tenants\Tenants\Model\Module\Features';
	public $parameters = [
		'sm_feature_type' => ['name' => 'Type', 'domain' => 'type_id', 'required' => true]
	];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'module_id' => 'a.tm_feature_module_id',
			'module_name' => 'b.tm_module_name',
			'module_icon' => 'd.sm_module_icon',
			'feature_code' => 'a.tm_feature_feature_code',
			'feature_name' => 'c.sm_feature_name',
			'feature_icon' => 'c.sm_feature_icon',
			'inactive' => 'a.tm_feature_inactive'
		]);
		// join
		$this->query->join('INNER', new \Numbers\Tenants\Tenants\Model\Modules(), 'b', 'ON', [
			['AND', ['b.tm_module_id', '=', 'a.tm_feature_module_id', true], false]
		]);
		$this->query->join('INNER', new \Numbers\Backend\System\Modules\Model\Module\Features(), 'c', 'ON', [
			['AND', ['a.tm_feature_feature_code', '=', 'c.sm_feature_code', true], false]
		]);
		$this->query->join('INNER', new \Numbers\Backend\System\Modules\Model\Modules(), 'd', 'ON', [
			['AND', ['b.tm_module_module_code', '=', 'd.sm_module_code', true], false]
		]);
		// where
		$this->query->where('AND', ['a.tm_feature_inactive', '=', 0]);
		$this->query->where('AND', ['b.tm_module_inactive', '=', 0]);
		$this->query->where('AND', ['c.sm_feature_inactive', '=', 0]);
		$this->query->where('AND', ['d.sm_module_inactive', '=', 0]);
		$this->query->where('AND', ['c.sm_feature_type', '=', $parameters['sm_feature_type']]);
	}

	/**
	 * @see $this->options()
	 */
	public function options_json($options = []) {
		$data = $this->get($options);
		$result = [];
		foreach ($data as $k => $v) {
			foreach ($v as $k2 => $v2) {
				$parent = \Object\Table\Options::optionJsonFormatKey(['module_id' => $k]);
				// add method
				if (!isset($result[$parent])) {
					$result[$parent] = ['name' => $v2['module_name'], 'icon_class' => \HTML::icon(['type' => $v2['module_icon'], 'class_only' => true]), 'parent' => null, 'disabled' => true];
				}
				// add item
				$key = \Object\Table\Options::optionJsonFormatKey(['feature_code' => $k2, 'module_id' => $k]);
				$result[$key] = ['name' => $v2['feature_name'], 'icon_class' => \HTML::icon(['type' => $v2['feature_icon'], 'class_only' => true]), '__selected_name' => i18n(null, $v2['module_name']) . ': ' . i18n(null, $v2['feature_name']), 'parent' => $parent];
			}
		}
		if (!empty($result)) {
			$converted = \Helper\Tree::convertByParent($result, 'parent');
			$result = [];
			\Helper\Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
		}
		return $result;
	}
}