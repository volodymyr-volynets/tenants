<?php

namespace Numbers\Tenants\Widgets\Attributes\Model\Attribute;
class Organizations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Attribute Organizations';
	public $name = 'tm_attribute_organizations';
	public $pk = ['tm_attrorg_tenant_id', 'tm_attrorg_attribute_id', 'tm_attrorg_organization_id'];
	public $tenant = true;
	public $orderby = [
		'tm_attrorg_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'tm_attrorg_';
	public $columns = [
		'tm_attrorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_attrorg_id' => ['name' => '#', 'type' => 'bigserial'],
		'tm_attrorg_attribute_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'tm_attrorg_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'tm_attrorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_attribute_organizations_pk' => ['type' => 'pk', 'columns' => ['tm_attrorg_tenant_id', 'tm_attrorg_attribute_id', 'tm_attrorg_organization_id']],
		'tm_attrorg_attribute_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_attrorg_tenant_id', 'tm_attrorg_attribute_id'],
			'foreign_model' => '\Numbers\Tenants\Widgets\Attributes\Model\Attributes',
			'foreign_columns' => ['tm_attribute_tenant_id', 'tm_attribute_id']
		],
		'tm_attrorg_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_attrorg_tenant_id', 'tm_attrorg_organization_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
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