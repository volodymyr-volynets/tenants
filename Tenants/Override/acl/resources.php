<?php

namespace Numbers\Tenants\Tenants\Override\ACL;
class Resources {
	public $data = [
		'application_structure' => [
			'tenant' => [
				'tenant_datasource' => '\Numbers\Tenants\Tenants\DataSource\Tenants',
				'column_prefix' => 'tm_tenant_'
			]
		],
		'system' => [
			'modules_by_code' => [
				'datasource_name' => '\Numbers\Tenants\Tenants\DataSource\Module\ByCode',
			]
		]
	];
}