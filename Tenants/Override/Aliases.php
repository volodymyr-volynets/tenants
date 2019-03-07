<?php

namespace Numbers\Tenants\Tenants\Override;
class Aliases {
	public $data = [
		'polfolder_id' => [
			'no_data_alias_name' => 'Policy Folder #',
			'no_data_alias_model' => '\Numbers\Tenants\Tenants\Model\Policy\Folders',
			'no_data_alias_column' => 'tm_polfolder_name'
		],
		'module_id' => [
			'no_data_alias_name' => 'Module #',
			'no_data_alias_model' => '\Numbers\Tenants\Tenants\Model\Modules',
			'no_data_alias_column' => 'tm_module_module_code'
		],
		'policy_id' => [
			'no_data_alias_name' => 'Policy #',
			'no_data_alias_model' => '\Numbers\Tenants\Tenants\Model\Policies',
			'no_data_alias_column' => 'tm_policy_code'
		]
	];
}