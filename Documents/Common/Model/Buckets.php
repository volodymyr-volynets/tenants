<?php

namespace Numbers\Tenants\Documents\Common\Model;
class Buckets extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DM';
	public $title = 'D/M Buckets';
	public $name = 'dm_buckets';
	public $pk = ['dm_bucket_tenant_id', 'dm_bucket_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'dm_bucket_';
	public $columns = [
		'dm_bucket_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dm_bucket_id' => ['name' => 'Bucket #', 'domain' => 'group_id_sequence'],
		'dm_bucket_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'dm_bucket_type_code' => ['name' => 'Type', 'domain' => 'type_code'],
		'dm_bucket_name' => ['name' => 'Name', 'domain' => 'name'],
		'dm_bucket_temporary' => ['name' => 'Temporary', 'type' => 'boolean'],
		'dm_bucket_cleanup_duration' => ['name' => 'Cleanup Duration (Seconds)', 'type' => 'integer'],
		'dm_bucket_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dm_buckets_pk' => ['type' => 'pk', 'columns' => ['dm_bucket_tenant_id', 'dm_bucket_id']],
		'dm_bucket_code_un' => ['type' => 'unique', 'columns' => ['dm_bucket_tenant_id', 'dm_bucket_code']],
		'dm_bucket_type_code_fk' => [
			'type' => 'fk',
			'columns' => ['dm_bucket_tenant_id', 'dm_bucket_type_code'],
			'foreign_model' => '\Numbers\Tenants\Documents\Common\Model\BucketTypes',
			'foreign_columns' => ['dm_bckttype_tenant_id', 'dm_bckttype_code']
		]
	];
	public $indexes = [
		'dm_buckets_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['dm_bucket_code', 'dm_bucket_name']]
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
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}