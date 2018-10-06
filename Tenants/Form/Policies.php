<?php

namespace Numbers\Tenants\Tenants\Form;
class Policies extends \Object\Form\Wrapper\Base {
	public $form_link = 'tm_policies';
	public $module_code = 'TM';
	public $title = 'T/M Policies Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'tm_policy_id' => [
				'tm_policy_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy #', 'domain' => 'policy_id_sequence', 'percent' => 45, 'navigation' => true],
				'tm_policy_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => 'c', 'percent' => 50, 'navigation' => true],
				'tm_policy_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'tm_policy_name' => [
				'tm_policy_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'percent' => 50],
				'tm_policy_icon' => ['order' => 2, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			'tm_policy_polroot_code' => [
				'tm_policy_polroot_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Root', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots::optionsActive', 'onchange' => 'this.form.submit();'],
				'tm_policy_polfolder_id' => ['order' => 2, 'label_name' => 'Folder', 'domain' => 'folder_id', 'null' => true, 'required' => true, 'percent' => 75, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Policy\Folders::optionsJson', 'options_depends' => ['polroot_code' => 'tm_policy_polroot_code']],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Policies',
		'model' => '\Numbers\Tenants\Tenants\Model\Policies',
	];

	public function validate(& $form) {
		// prepopulate sequence number
		if (empty($form->values['tm_policy_code'])) {
			$sequence = new \Numbers\Tenants\Tenants\Model\Policy\CodeSequence();
			$form->values['tm_policy_code'] = $sequence->nextval('advanced');
		}
	}
}