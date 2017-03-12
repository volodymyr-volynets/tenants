<?php

class numbers_tenants_tenants_data_system extends object_import {
	public $data = [
		'controllers' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => 'numbers_backend_system_modules_model_collection_resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::numbers_tenants_tenants_controller_activation_modules',
					'sm_resource_code' => 'numbers_tenants_tenants_controller_activation_modules',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'T/M General Modules',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'cubes',
					'sm_resource_module_code' => 'TM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'System',
					'sm_resource_group3_name' => 'Data Activation',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [],
					'numbers_backend_system_modules_model_resource_map' => [
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_new',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
				[
					'sm_resource_id' => '::id::numbers_tenants_tenants_controller_activation_features',
					'sm_resource_code' => 'numbers_tenants_tenants_controller_activation_features',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'T/M General Features',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'cube',
					'sm_resource_module_code' => 'TM',
					'sm_resource_group1_name' => 'Activation',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [],
					'numbers_backend_system_modules_model_resource_map' => [
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_new',
							'sm_rsrcmp_inactive' => 0
						]
					]
				]
			]
		],
		'menu' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => 'numbers_backend_system_modules_model_collection_resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::menu_operations_system_data_activation',
					'sm_resource_code' => 'menu_operations_system_data_activation',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Data Activation',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'cogs',
					'sm_resource_module_code' => 'TM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'System',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_tenants_tenants_controller_activation_modules',
					'sm_resource_code' => 'menu_numbers_tenants_tenants_controller_activation_modules',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'General Modules',
					'sm_resource_description' => 'T/M General Modules',
					'sm_resource_icon' => 'cubes',
					'sm_resource_module_code' => 'TM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'System',
					'sm_resource_group3_name' => 'Data Activation',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::numbers_tenants_tenants_controller_activation_modules',
					'sm_resource_menu_acl_method_code' => 'index',
					'sm_resource_menu_acl_action_id' => '::id::list_view',
					'sm_resource_menu_url' => '/numbers/tenants/tenants/controller/activation/modules',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_tenants_tenants_controller_activation_features',
					'sm_resource_code' => 'menu_numbers_tenants_tenants_controller_activation_features',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'General Features',
					'sm_resource_description' => 'T/M General Features',
					'sm_resource_icon' => 'cube',
					'sm_resource_module_code' => 'TM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'System',
					'sm_resource_group3_name' => 'Data Activation',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::numbers_tenants_tenants_controller_activation_features',
					'sm_resource_menu_acl_method_code' => 'index',
					'sm_resource_menu_acl_action_id' => '::id::list_view',
					'sm_resource_menu_url' => '/numbers/tenants/tenants/controller/activation/features',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				]
			]
		]
	];
}