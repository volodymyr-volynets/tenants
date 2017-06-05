<?php

namespace Numbers\Tenants\Tenants\DataSource\Module;
class ByCode extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['module_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'module_name' => 'name'
	];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Tenants\Tenants\Model\Modules';
	public $parameters = [
		'module_code' => ['name' => 'Module Code', 'domain' => 'module_code', 'required' => true],
	];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'module_id' => 'a.tm_module_id',
			'module_name' => 'a.tm_module_name'
		]);
		// where
		$this->query->where('AND', ['a.tm_module_inactive', '=', 0]);
		$this->query->where('AND', ['a.tm_module_module_code', '=', $parameters['module_code']]);
	}
}