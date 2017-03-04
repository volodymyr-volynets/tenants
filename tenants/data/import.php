<?php

class numbers_tenants_tenants_data_import extends object_import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => 'numbers_backend_system_modules_model_collection_modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'TM',
					'sm_module_type' => 10,
					'sm_module_name' => 'T/M Tenants',
					'sm_module_parent_module_code' => null,
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => false,
					'sm_module_inactive' => 0,
					'numbers_backend_system_modules_model_module_dependencies' => []
				]
			]
		],
		'tenants' => [
			'options' => [
				'pk' => ['tm_tenant_id'],
				'model' => 'numbers_tenants_tenants_model_tenants',
				'method' => 'save'
			],
			'data' => [
				[
					'tm_tenant_id' => 1,
					'tm_tenant_code' => 'SYSTEM',
					'tm_tenant_name' => 'System',
					'tm_tenant_inactive' => 0
				],
				[
					'tm_tenant_id' => 2,
					'tm_tenant_code' => 'MAINTENANCE',
					'tm_tenant_name' => 'Maintenance',
					'tm_tenant_inactive' => 0
				],
				[
					'tm_tenant_id' => 100,
					'tm_tenant_code' => 'DEFAULT',
					'tm_tenant_name' => 'Default',
					'tm_tenant_inactive' => 0
				]
			]
		],
	];
}