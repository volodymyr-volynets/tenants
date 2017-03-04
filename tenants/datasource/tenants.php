<?php

class numbers_tenants_tenants_datasource_tenants extends object_datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['tm_tenant_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = 'numbers_tenants_tenants_model_tenants';
	public $parameters = [
		'tm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_tenant_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'tm_tenant_name' => ['name' => 'Name', 'domain' => 'name'],
		'tm_tenant_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
	];

	public function query($parameters, $options = []) {
		$this->query->where_multiple('AND', $parameters);
	}
}