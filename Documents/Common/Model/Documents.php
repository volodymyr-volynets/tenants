<?php

namespace Numbers\Tenants\Documents\Common\Model;
class Documents extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DM';
	public $title = 'D/M Documents';
	public $name = 'dm_documents';
	public $pk = ['dm_document_tenant_id', 'dm_document_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'dm_document_';
	public $columns = [
		'dm_document_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dm_document_id' => ['name' => 'Document #', 'domain' => 'big_id_sequence'],
		'dm_document_bucket_id' => ['name' => 'Bucket #', 'domain' => 'group_id'],
		'dm_document_name' => ['name' => 'Name', 'domain' => 'name'],
		'dm_document_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dm_documents_pk' => ['type' => 'pk', 'columns' => ['dm_document_tenant_id', 'dm_document_id']],
		'dm_document_bucket_id_fk' => [
			'type' => 'fk',
			'columns' => ['dm_document_tenant_id', 'dm_document_bucket_id'],
			'foreign_model' => '\Numbers\Tenants\Documents\Common\Model\Buckets',
			'foreign_columns' => ['dm_bucket_tenant_id', 'dm_bucket_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = true;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
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