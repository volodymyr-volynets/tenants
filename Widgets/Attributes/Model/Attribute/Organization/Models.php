<?php

namespace Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organization;
class Models extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Attribute Organization Models';
	public $name = 'tm_attribute_organization_models';
	public $pk = ['tm_attrmdl_tenant_id', 'tm_attrmdl_attribute_id', 'tm_attrmdl_organization_id', 'tm_attrmdl_model_id'];
	public $tenant = true;
	public $orderby = [
		'tm_attrmdl_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'tm_attrmdl_';
	public $columns = [
		'tm_attrmdl_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'tm_attrmdl_id' => ['name' => '#', 'type' => 'bigserial'],
		'tm_attrmdl_attribute_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'tm_attrmdl_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'tm_attrmdl_model_id' => ['name' => 'Model #', 'domain' => 'group_id'],
		'tm_attrmdl_mandatory' => ['name' => 'Mandatory', 'type' => 'boolean'],
		'tm_attrmdl_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'tm_attribute_organization_models_pk' => ['type' => 'pk', 'columns' => ['tm_attrmdl_tenant_id', 'tm_attrmdl_attribute_id', 'tm_attrmdl_organization_id', 'tm_attrmdl_model_id']],
		'tm_attrmdl_model_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_attrmdl_model_id'],
			'foreign_model' => '\Numbers\Backend\Db\Common\Model\Models',
			'foreign_columns' => ['sm_model_id']
		],
		'tm_attrmdl_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['tm_attrmdl_tenant_id', 'tm_attrmdl_attribute_id', 'tm_attrmdl_organization_id'],
			'foreign_model' => '\Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organizations',
			'foreign_columns' => ['tm_attrorg_tenant_id', 'tm_attrorg_attribute_id', 'tm_attrorg_organization_id']
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