<?php

class numbers_tenants_tenants_override_acl_resources {
	public $data = [
		'application_structure' => [
			'tenant' => [
				'tenant_datasource' => 'numbers_tenants_tenants_datasource_tenants',
				'column_prefix' => 'tm_tenant_'
			]
		]
	];
}