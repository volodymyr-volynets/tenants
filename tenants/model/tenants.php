<?php

class numbers_tenants_tenants_model_tenants extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Tenants';
	public $name = 'tm_tenants';
	public $pk = ['tm_tenant_id'];
	public $tenant = false;
	public $orderby;
	public $limit;
	public $column_prefix = 'tm_tenant_';
	public $columns = [
		'tm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id_sequence'],
		'tm_tenant_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'tm_tenant_name' => ['name' => 'Name', 'domain' => 'name'],
		'tm_tenant_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
		'tm_tenant_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
		'tm_tenant_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_tenants_pk' => ['type' => 'pk', 'columns' => ['tm_tenant_id']],
		'tm_tenant_code_un' => ['type' => 'unique', 'columns' => ['tm_tenant_code']],
	];
	public $indexes = [
		'tm_tenants_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['tm_tenant_code', 'tm_tenant_name']]
	];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'proprietary',
		'protection' => 1,
		'scope' => 'global'
	];
}