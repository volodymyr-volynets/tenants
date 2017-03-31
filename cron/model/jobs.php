<?php

class numbers_tenants_cron_model_jobs extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Cron Jobs';
	public $name = 'tm_cron_jobs';
	public $pk = ['tm_cronjob_tenant_id', 'tm_cronjob_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'tm_cronjob_';
	public $columns = [
		'tm_cronjob_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_cronjob_id' => ['name' => 'Module #', 'domain' => 'module_id_sequence'],
		'tm_cronjob_name' => ['name' => 'Name', 'domain' => 'name'],
		'tm_cronjob_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_cron_jobs_pk' => ['type' => 'pk', 'columns' => ['tm_cronjob_tenant_id', 'tm_cronjob_id']],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'tm_cronjob_name' => 'name'
	];
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