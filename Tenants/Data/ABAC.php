<?php

namespace Numbers\Tenants\Tenants\Data;
class ABAC extends \Object\Import {
	public $data = [
		'abac_assignments' => [
			'options' => [
				'pk' => ['sm_abacassign_code'],
				'model' => '\Numbers\Backend\ABAC\Model\Assignments',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_abacassign_code' => 'CUSTOM-ASSIGNMENTS',
					'sm_abacassign_name' => 'Custom Assignments',
					'sm_abacassign_module_code' => 'TM',
					'sm_abacassign_model_id' => '::id::\Numbers\Tenants\Tenants\Model\Assignments',
					'sm_abacassign_model_code' => '\Numbers\Tenants\Tenants\Model\Assignments',
					'sm_abacassign_inactive' => 0
				],
			],
		],
	];
}