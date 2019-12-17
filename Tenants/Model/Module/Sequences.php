<?php

namespace Numbers\Tenants\Tenants\Model\Module;
class Sequences extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Module Sequences';
	public $name = 'tm_module_sequences';
	public $pk = ['tm_mdlseq_tenant_id', 'tm_mdlseq_module_id', 'tm_mdlseq_type_code'];
	public $tenant = true;
	public $module = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'tm_mdlseq_';
	public $columns = [
		'tm_mdlseq_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_mdlseq_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'tm_mdlseq_type_code' => ['name' => 'Type', 'domain' => 'type_code'],
		'tm_mdlseq_prefix' => ['name' => 'Prefix', 'domain' => 'type_code', 'null' => true],
		'tm_mdlseq_length' => ['name' => 'Length', 'domain' => 'counter'],
		'tm_mdlseq_suffix' => ['name' => 'Suffix', 'domain' => 'type_code', 'null' => true],
		'tm_mdlseq_counter' => ['name' => 'Counter', 'domain' => 'bigcounter'],
	];
	public $constraints = [
		'tm_module_sequences_pk' => ['type' => 'pk', 'columns' => ['tm_mdlseq_tenant_id', 'tm_mdlseq_module_id', 'tm_mdlseq_type_code']],
		'tm_mdlseq_module_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_mdlseq_tenant_id', 'tm_mdlseq_module_id'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
			'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
		],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}