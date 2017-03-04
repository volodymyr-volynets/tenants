<?php

class numbers_tenants_tenants_datasource_activation_feature_features extends object_datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['sm_feature_code'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'sm_feature_name' => 'name'
	];
	public $column_prefix;

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = 'numbers_backend_system_modules_model_module_features';
	public $parameters = [
		'tm_feature_module_id' => ['name' => 'Module #', 'domain' => 'module_id', 'required' => true]
	];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'sm_feature_code' => 'a.sm_feature_code',
			'sm_feature_name' => 'a.sm_feature_name',
			'sm_feature_activation_model' => 'a.sm_feature_activation_model'
		]);
		// join
		$this->query->join('INNER', new numbers_tenants_tenants_model_modules(), 'b', 'ON', [
			['AND', ['a.sm_feature_module_code', '=', 'b.tm_module_module_code', true], false],
			['AND', ['b.tm_module_id', '=', $parameters['tm_feature_module_id'], false], false]
		]);
		$this->query->join('LEFT', new numbers_tenants_tenants_model_module_features(), 'c', 'ON', [
			['AND', ['c.tm_feature_module_id', '=', $parameters['tm_feature_module_id'], false], false],
			['AND', ['c.tm_feature_feature_code', '=', 'a.sm_feature_code', true], false],
		]);
		// where
		$this->query->where('AND', ['a.sm_feature_inactive', '=', 0]);
		$this->query->where('AND', function(& $query) {
			$query->where('OR', ['c.tm_feature_feature_code', 'IS', null]);
			$query->where('OR', ['a.sm_feature_type', '=', 30]);
		});
	}
}