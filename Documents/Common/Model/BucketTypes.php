<?php

namespace Numbers\Tenants\Documents\Common\Model;
class BucketTypes extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DM';
	public $title = 'D/M Bucket Types';
	public $name = 'dm_bckttype_types';
	public $pk = ['dm_bckttype_tenant_id', 'dm_bckttype_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'dm_bckttype_';
	public $columns = [
		'dm_bckttype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dm_bckttype_code' => ['name' => 'Code', 'domain' => 'type_code'],
		'dm_bckttype_name' => ['name' => 'Name', 'domain' => 'name'],
		'dm_bckttype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dm_buckets_pk' => ['type' => 'pk', 'columns' => ['dm_bckttype_tenant_id', 'dm_bckttype_code']]
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

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}