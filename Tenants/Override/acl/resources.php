<?php

namespace Numbers\Tenants\Tenants\Override\ACL;
class Resources {
	public $data = [
		'application_structure' => [
			'tenant' => [
				'tenant_datasource' => 'numbers_tenants_tenants_datasource_tenants',
				'column_prefix' => 'tm_tenant_'
			]
		]
	];
}