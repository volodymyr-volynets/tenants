<?php

namespace Numbers\Tenants\Widgets\Filters\Model;
class Forms extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Filter Forms';
	public $name = 'tm_filter_forms';
	public $pk = ['tm_filterform_tenant_id', 'tm_filterform_id'];
	public $tenant = true;
	public $orderby = ['tm_filterform_timestamp' => SORT_ASC];
	public $limit;
	public $column_prefix = 'tm_filterform_';
	public $columns = [
		'tm_filterform_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_filterform_id' => ['name' => 'Filter #', 'domain' => 'big_id_sequence'],
		'tm_filterform_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		'tm_filterform_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
		'tm_filterform_resource_code' => ['name' => 'Code', 'domain' => 'code'],
		'tm_filterform_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'tm_filterform_params' => ['name' => 'Parameters', 'type' => 'json'],
		'tm_filterform_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_filter_forms_pk' => ['type' => 'pk', 'columns' => ['tm_filterform_tenant_id', 'tm_filterform_id']],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = true;
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