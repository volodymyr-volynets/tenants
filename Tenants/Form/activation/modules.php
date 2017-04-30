<?php

namespace Numbers\Tenants\Tenants\Form\Activation;
class Modules extends \Object\Form\Wrapper\Base {
	public $form_link = 'module_activation_form';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'cubes'],
				'title' => 'Activate Module:'
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
			'tm_module_module_code' => [
				'tm_module_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Module\Modules'],
			],
			'tm_module_name' => [
				'tm_module_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100],
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
			]
		]
	];

	public function save(& $form) {
		$result = \Numbers\Tenants\Tenants\Model\Activation::activateModule($form->values['tm_module_module_code'], $form->values['tm_module_name']);
		if ($result['success']) {
			$form->error('success', 'Module has been activated!');
			return true;
		} else {
			$form->error('danger', $result['error']);
			return false;
		}
	}
}