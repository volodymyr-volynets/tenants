<?php

namespace Numbers\Tenants\Tenants\Model\Integration;
class Data extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Integration Data';
	public $name = 'tm_integration_data';
	public $pk = ['tm_integdata_tenant_id', 'tm_integdata_integtype_code', 'tm_integdata_integmodel_code', 'tm_integdata_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'tm_integdata_';
	public $columns = [
		'tm_integdata_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_integdata_integtype_code' => ['name' => 'Integration Type Code', 'domain' => 'group_code'],
		'tm_integdata_integmodel_code' => ['name' => 'Integration Model Code', 'domain' => 'group_code'],
		'tm_integdata_code' => ['name' => 'Code', 'domain' => 'code'],
		'tm_integdata_name' => ['name' => 'Name', 'domain' => 'name'],
		'tm_integdata_map' => ['name' => 'Map', 'type' => 'text', 'null' => true],
		'tm_integdata_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_integration_data_pk' => ['type' => 'pk', 'columns' => ['tm_integdata_tenant_id', 'tm_integdata_integtype_code', 'tm_integdata_integmodel_code', 'tm_integdata_code']],
		'tm_integdata_integmodel_code_fk' => [
			'type' => 'fk',
			'columns' => ['tm_integdata_tenant_id', 'tm_integdata_integmodel_code', 'tm_integdata_integtype_code'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Integration\Models',
			'foreign_columns' => ['tm_integmodel_tenant_id', 'tm_integmodel_code', 'tm_integmodel_integtype_code']
		],
	];
	public $indexes = [
		'tm_integration_data_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['tm_integdata_code', 'tm_integdata_name']],
	];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'tm_integdata_name' => 'name',
		'tm_integdata_inactive' => 'inactive'
	];
	public $options_active = [
		'tm_integdata_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = true;

	public $data_asset = [
		'classification' => 'proprietary',
		'protection' => 1,
		'scope' => 'global'
	];
}