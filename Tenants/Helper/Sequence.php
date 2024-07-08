<?php

namespace Numbers\Tenants\Tenants\Helper;
class Sequence {

	/**
	 * Next value
	 *
	 * @param string $type_code
	 * @param int $module_id_id
	 * @param int $tenant_id
	 * @return int|string
	 */
	public static function nextval(string $group_code, string $type_code, int $module_id, $tenant_id = null, $extended = false) {
		$model = new \Numbers\Tenants\Tenants\Model\Module\Sequences();
		$query = new \Object\Query\Builder($model->db_link);
		// extended sequence
		if (empty($tenant_id)) {
			$tenant_id = \Tenant::id();
		}
		$query->columns([
			'counter' => "tm_next_sequence_value('{$group_code}', '{$type_code}', {$tenant_id}, {$module_id})"
		]);
		$query->dblink([
			'counter' => 'bigint'
		]);
		$result = $query->query();
		if (!$result['success']) {
			Throw new \Exception($result['error'][0]);
		}
		if ($extended) {
			$data = $model->get([
				'where' => [
					'tm_mdlseq_module_id' => $module_id,
					'tm_mdlseq_group_code' => $group_code,
					'tm_mdlseq_type_code' => $type_code,
				],
				'pk' => null,
				'single_row' => true
			]);
			$length = $data['tm_mdlseq_length'] - strlen($data['tm_mdlseq_prefix'] . '') - strlen($data['tm_mdlseq_suffix'] . '');
			return $data['tm_mdlseq_prefix'] . str_pad($result['rows'][0]['counter'], $length, '0', STR_PAD_LEFT) . $data['tm_mdlseq_suffix'];
		} else {
			return $result['rows'][0]['counter'];
		}
	}

	/**
	 * Preset if not set
	 *
	 * @param object $form
	 * @param array $default_sequences
	 * @param string|null $key
	 */
	public static function presetIfNotSet(& $form, array $default_sequences, ?string $key = null) {
		$key = $key ?? '\Numbers\Tenants\Tenants\Model\Module\Sequences';
		if (!is_array($form->values[$key])) {
			$form->values[$key] = [];
		}
		$existing_sequences = array_extract_values_by_key($form->values[$key], 'tm_mdlseq_type_code');
		foreach ($default_sequences as $k => $v) {
			if (!in_array($v['tm_mdlseq_type_code'], $existing_sequences)) {
				$form->values[$key][] = $v;
			}
		}
	}

	/**
	 * Validate sequence types
	 *
	 * @param object $form
	 */
	public static function validateSequenceTypes(& $form, ?string $key = null) {
		// check sequence length
		$key = $key ?? '\Numbers\Tenants\Tenants\Model\Module\Sequences';
		foreach ($form->values[$key] as $k => $v) {
			$length = $v['tm_mdlseq_length'] - strlen($v['tm_mdlseq_prefix'] . '') + strlen($v['tm_mdlseq_suffix'] . '');
			if ($length > 19 || $length < 5) {
				$form->error(DANGER, \Numbers\Tenants\Tenants\Helper\Messages::SEQUENCE_LENGTH, $key . "[{$k}][tm_mdlseq_length]");
			}
			if ($v['tm_mdlseq_counter'] < 0) {
				$form->error(DANGER,  \Numbers\Tenants\Tenants\Helper\Messages::SEQUENCE_MIN, $key . "[{$k}][tm_mdlseq_length]");
			}
		}
	}
}