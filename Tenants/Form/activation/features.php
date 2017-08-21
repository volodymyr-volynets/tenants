<?php

namespace Numbers\Tenants\Tenants\Form\Activation;
class Features extends \Object\Form\Wrapper\Base {
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
		],
		'no_ajax_form_reload' => true
	];
	public $containers = [
		'default' => ['default_row_type' => 'grid', 'order' => 1]
	];
	public $rows = [];
	public $elements = [
		'default' => [
			'tm_feature_module_id' => [
				'tm_feature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_id', 'percent' => 100, 'required' => true, 'null' => true, 'method' => 'select', 'options_model' => 'numbers_tenants_tenants_datasource_activation_feature_modules', 'onchange' => 'this.form.submit();'],
			],
			'tm_feature_feature_code' => [
				'tm_feature_feature_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Feature', 'domain' => 'feature_code', 'percent' => 100, 'required' => true, 'null' => true, 'method' => 'select', 'options_model' => 'numbers_tenants_tenants_datasource_activation_feature_features', 'options_depends' => ['tm_feature_module_id' => 'tm_feature_module_id']],
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
			]
		]
	];

	public function save(& $form) {
		// need to disable debug
		\Application::set('debug.debug', 0);
		// execution limit is 1 hour
		set_time_limit(3600);
		$result = \Numbers\Tenants\Tenants\Model\Activation::activateFeature($form->values['tm_feature_module_id'], '', $form->values['tm_feature_feature_code']);
		if ($result['success']) {
			$form->error(SUCCESS, 'Feature has been activated!');
			return true;
		} else {
			$form->error(DANGER, 'Could not activate feature!');
			return false;
		}
	}
}