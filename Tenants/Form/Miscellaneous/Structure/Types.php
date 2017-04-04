<?php

namespace Numbers\Tenants\Tenants\Form\Miscellaneous\Structure;
class Types extends \Object\Form\Wrapper\Base {
	public $form_link = 'structure_types';
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
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'tm_structure_code' => [
				'tm_structure_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Structure Code', 'domain' => 'type_code', 'percent' => 95, 'required' => true, 'navigation' => true],
				'tm_structure_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'tm_structure_name' => [
				'tm_structure_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'model' => '\Numbers\Tenants\Tenants\Model\Structure\Types'
	];
}