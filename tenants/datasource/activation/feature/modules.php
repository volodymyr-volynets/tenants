<?php

class numbers_tenants_tenants_datasource_activation_feature_modules extends object_datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['tm_module_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'tm_module_name' => 'name'
	];
	public $column_prefix;

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = 'numbers_tenants_tenants_model_modules';
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'tm_module_id' => 'a.tm_module_id',
			'tm_module_name' => 'a.tm_module_name'
		]);
	}
}