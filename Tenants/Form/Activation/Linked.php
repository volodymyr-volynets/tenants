<?php

namespace Numbers\Tenants\Tenants\Form\Activation;
class Linked extends \Object\Form\Wrapper\Base {
	public $form_link = 'tm_linked_activation';
	public $module_code = 'TM';
	public $title = 'T/M Linked Modules Form';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'cog'],
				'title' => 'Link Modules:'
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
			'tm_modlinked_parent_module_id' => [
				'tm_modlinked_parent_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Parent Module', 'domain' => 'module_id', 'percent' => 100, 'required' => true, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Feature\Modules'],
			],
			'tm_modlinked_child_module_id' => [
				'tm_modlinked_child_module_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Child Module', 'domain' => 'module_id', 'percent' => 100, 'required' => true, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Feature\Modules'],
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
			]
		]
	];

	public function save(& $form) {
		$result = \Numbers\Tenants\Tenants\Model\Module\Linked::collectionStatic()->merge([
			'tm_modlinked_parent_module_id' => $form->values['tm_modlinked_parent_module_id'],
			'tm_modlinked_parent_module_code' => \Numbers\Tenants\Tenants\Model\Modules::loadByIdStatic($form->values['tm_modlinked_parent_module_id'], 'tm_module_module_code'),
			'tm_modlinked_child_module_id' => $form->values['tm_modlinked_child_module_id'],
			'tm_modlinked_child_module_code' => \Numbers\Tenants\Tenants\Model\Modules::loadByIdStatic($form->values['tm_modlinked_child_module_id'], 'tm_module_module_code'),
			'tm_modlinked_inactive' => 0
		]);
		if ($result['success']) {
			$form->error(SUCCESS, 'Modules have been linked!');
			return true;
		} else {
			$form->error(DANGER, $result['error']);
			return false;
		}
	}
}