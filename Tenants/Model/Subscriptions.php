<?php

namespace Numbers\Tenants\Tenants\Model;
class Subscriptions extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Subscriptions';
	public $name = 'tm_subscriptions';
	public $pk = ['tm_subscription_tenant_id', 'tm_subscription_id'];
	public $tenant = true;
	public $module = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'tm_subscription_';
	public $columns = [
		'tm_subscription_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_subscription_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'tm_subscription_id' => ['name' => 'Subscription #', 'domain' => 'big_id_sequence'],
		'tm_subscription_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
		'tm_subscription_plan_code' => ['name' => 'Plan Code', 'domain' => 'group_code'],
		'tm_subscription_item_code' => ['name' => 'Item/Group Code', 'domain' => 'group_code'],
		'tm_subscription_start_date' => ['name' => 'Start Date', 'type' => 'date'],
		'tm_subscription_end_date' => ['name' => 'End Date', 'type' => 'date'],
		'tm_subscription_sync_date' => ['name' => 'Syncronization Date', 'type' => 'date'],
		'tm_subscription_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_subscriptions_pk' => ['type' => 'pk', 'columns' => ['tm_subscription_tenant_id', 'tm_subscription_id']],
		'tm_subscription_tenant_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_subscription_tenant_id'],
			'foreign_model' => '\Numbers\Tenants\Tenants\Model\Tenants',
			'foreign_columns' => ['tm_tenant_id']
		],
		'tm_subscription_module_code_fk' => [
			'type' => 'fk',
			'columns' => ['tm_subscription_module_code'],
			'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
			'foreign_columns' => ['sm_module_code']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
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