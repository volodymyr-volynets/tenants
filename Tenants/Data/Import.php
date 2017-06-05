<?php

namespace Numbers\Tenants\Tenants\Data;
class Import extends \Object\Import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'TM',
					'sm_module_type' => 10,
					'sm_module_name' => 'T/M Tenants',
					'sm_module_icon' => 'user-secret',
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => false,
					'sm_module_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				]
			]
		],
		'tenants' => [
			'options' => [
				'pk' => ['tm_tenant_code'],
				'model' => '\Numbers\Tenants\Tenants\Model\Tenants',
				'method' => 'save'
			],
			'data' => [
				[
					'tm_tenant_code' => 'SYSTEM',
					'tm_tenant_name' => 'System',
					'tm_tenant_inactive' => 0
				]
			]
		],
	];
}