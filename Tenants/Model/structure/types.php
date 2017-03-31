<?php

namespace Numbers\Tenants\Tenants\Model\Structure;
class Types extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Structure Types';
	public $name = 'tm_structure_types';
	public $pk = ['tm_structure_tenant_id', 'tm_structure_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'tm_structure_';
	public $columns = [
		'tm_structure_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_structure_code' => ['name' => 'Structure Code', 'domain' => 'type_code'],
		'tm_structure_name' => ['name' => 'Name', 'domain' => 'name'],
		'tm_structure_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_structure_types_pk' => ['type' => 'pk', 'columns' => ['tm_structure_tenant_id', 'tm_structure_code']],
		'tm_structure_tenant_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_structure_tenant_id'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Tenants',
			'foreign_columns' => ['tm_tenant_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
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