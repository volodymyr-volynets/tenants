<?php

namespace Numbers\Tenants\Tenants\DataSource\Module;
class AllModules extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'name' => 'name'
	];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Tenants\Tenants\Model\Modules';
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.tm_module_id',
			'name' => 'a.tm_module_name',
			'module_code' => 'a.tm_module_module_code',
			'module_multiple' => 'b.sm_module_multiple',
		]);
		// join
		$this->query->join('INNER', new \Numbers\Backend\System\Modules\Model\Modules(), 'b', 'ON', [
			['AND', ['b.sm_module_code', '=', 'a.tm_module_module_code', true], false],
		]);
		// where
		$this->query->where('AND', ['a.tm_module_inactive', '=', 0]);
		$this->query->where('AND', ['b.sm_module_inactive', '=', 0]);
	}
}