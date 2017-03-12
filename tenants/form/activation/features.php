<?php

class numbers_tenants_tenants_form_activation_features extends object_form_wrapper_base {
	public $form_link = 'feature_activation';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'cog'],
				'title' => 'Feature Activation:'
			]
		],
		'actions' => [
			'refresh' => true,
			'back' => true
		]
	];
	public $containers = [
		'default' => ['default_row_type' => 'grid', 'order' => 1]
	];
	public $rows = [];
	public $elements = [
		'default' => [
			'tm_feature_module_id' => [
				'tm_feature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_id', 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => 'numbers_tenants_tenants_datasource_activation_feature_modules', 'onchange' => 'this.form.submit();'],
			],
			'tm_feature_feature_code' => [
				'tm_feature_feature_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Feature', 'domain' => 'feature_code', 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => 'numbers_tenants_tenants_datasource_activation_feature_features', 'options_depends' => ['tm_feature_module_id' => 'tm_feature_module_id']],
			],
			self::buttons => [
				self::button_submit => self::button_submit_data
			]
		]
	];

	public function save(& $form) {
		$result = numbers_tenants_tenants_model_activation::activate_feature($form->values['tm_feature_module_id'], '', $form->values['tm_feature_feature_code']);
		if ($result['success']) {
			$form->error('success', 'Feature has been activated!');
			return true;
		} else {
			$form->error('danger', 'Could not activate feature!');
			return false;
		}
	}
}