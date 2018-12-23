<?php

namespace Numbers\Tenants\Tenants\Data\Activation;
class PoliciesActivate extends \Object\Import {
	public $data = [
		'policy_roots' => [
			'options' => [
				'pk' => ['tm_polroot_code'],
				'model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots',
				'method' => 'save_insert_new'
			],
			'data' => [
				[
					'tm_polroot_tenant_id' => null,
					'tm_polroot_code' => 'SYSTEM',
					'tm_polroot_name' => 'System Policies',
					'tm_polroot_icon' => 'fas fa-wrench',
					'tm_polroot_inactive' => 0
				],
				[
					'tm_polroot_tenant_id' => null,
					'tm_polroot_code' => 'USER',
					'tm_polroot_name' => 'User Defined Policies',
					'tm_polroot_icon' => 'far fa-user',
					'tm_polroot_inactive' => 0
				],
			]
		],
		'policy_folders' => [
			'options' => [
				'pk' => ['tm_polfolder_id'],
				'model' => '\Numbers\Tenants\Tenants\Model\Policy\Folders',
				'method' => 'save_insert_new'
			],
			'data' => [
				[
					'tm_polfolder_tenant_id' => null,
					'tm_polfolder_id' =>  '::id::Global Assignments',
					'tm_polfolder_polroot_code' => 'SYSTEM',
					'tm_polfolder_parent_polfolder_id' => null,
					'tm_polfolder_name' => 'Global Assignments',
					'tm_polfolder_icon' => 'fas fa-assistive-listening-systems',
					'tm_polfolder_counter' => 0,
					'tm_polfolder_inactive' => 0
				],
			]
		]
	];
}