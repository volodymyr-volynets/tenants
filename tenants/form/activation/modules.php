<?php

class numbers_tenants_tenants_form_activation_modules extends object_form_wrapper_base {
	public $form_link = 'module_activation';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'cog'],
				'title' => 'Module Activation:'
			]
		],
		'actions' => [
			'refresh' => true
		]
	];
	public $containers = [
		'default' => ['default_row_type' => 'grid', 'order' => 1]
	];
	public $rows = [];
	public $elements = [
		'default' => [
			'tm_module_module_code' => [
				'tm_module_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => 'numbers_tenants_tenants_datasource_activation_module_modules'],
			],
			'tm_module_name' => [
				'tm_module_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100],
			],
			self::buttons => [
				self::button_submit => self::button_submit_data
			]
		]
	];

	public function save(& $form) {
		$result = numbers_tenants_tenants_model_activation::activate_module($form->values['tm_module_module_code'], $form->values['tm_module_name']);
		if ($result['success']) {
			$form->error('success', 'Module has been activated!');
			return true;
		} else {
			$form->error('danger', $result['error']);
			return false;
		}
	}
}