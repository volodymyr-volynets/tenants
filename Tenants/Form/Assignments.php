<?php

namespace Numbers\Tenants\Tenants\Form;
class Assignments extends \Object\Form\Wrapper\Base {
	public $form_link = 'tm_assignments';
	public $module_code = 'TM';
	public $title = 'T/M Assignments Form';
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
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		'details_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Tenants\Tenants\Model\Assignment\Details',
			'details_pk' => ['tm_assigndet_type_id', 'tm_assigndet_parent_abacattr_id', 'tm_assigndet_child_abacattr_id'],
			'required' => true,
			'order' => 800
		],
	];
	public $rows = [
		'tabs' => [
			'details' => ['order' => 200, 'label_name' => 'Details'],
		]
	];
	public $elements = [
		'top' => [
			'tm_assignment_id' => [
				'tm_assignment_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment #', 'domain' => 'assignment_id_sequence', 'percent' => 45, 'navigation' => true],
				'tm_assignment_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 50, 'navigation' => true],
				'tm_assignment_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'tm_assignment_name' => [
				'tm_assignment_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'details' => [
				'details' => ['container' => 'details_container', 'order' => 100],
			]
		],
		'details_container' => [
			'row1' => [
				'tm_assigndet_parent_abacattr_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Parent Attribute', 'domain' => 'attribute_id', 'required' => true, 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\ABAC\Model\Attributes::optionsActive', 'options_params' => ['sm_abacattr_flag_assingment' => 1], 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'tm_assigndet_child_abacattr_id' => ['order' => 2, 'label_name' => 'Child Attribute', 'domain' => 'attribute_id', 'required' => true, 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\ABAC\Model\Attributes::optionsActive', 'options_params' => ['sm_abacattr_flag_assingment' => 1], 'searchable' => true, 'onchange' => 'this.form.submit();'],
			],
			'row2' => [
			    'tm_assigndet_type_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Assignment\Detail\Types', 'onchange' => 'this.form.submit();'],
			    'tm_assigndet_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 45],
			    'tm_assigndet_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Assignments',
		'model' => '\Numbers\Tenants\Tenants\Model\Assignments',
		'details' => [
			'\Numbers\Tenants\Tenants\Model\Assignment\Details' => [
				'name' => 'Details',
				'pk' => ['tm_assigndet_tenant_id', 'tm_assigndet_assignment_id', 'tm_assigndet_type_id', 'tm_assigndet_parent_abacattr_id', 'tm_assigndet_child_abacattr_id'],
				'type' => '1M',
				'map' => ['tm_assignment_tenant_id' => 'tm_assigndet_tenant_id', 'tm_assignment_id' => 'tm_assigndet_assignment_id']
			]
		]
	];

	public function validate(& $form) {

	}
}