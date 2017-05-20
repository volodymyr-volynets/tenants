<?php

namespace Numbers\Tenants\Widgets\Attributes\Form;
class Attributes extends \Object\Form\Wrapper\Base {
	public $form_link = 'attributes';
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
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organizations',
			'details_pk' => ['tm_attrorg_organization_id'],
			'required' => true,
			'order' => 800
		],
		'models_container' => [
			'type' => 'subdetails',
			'label_name' => 'Models',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_parent_key' => '\Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organizations',
			'details_key' => '\Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organization\Models',
			'details_pk' => ['tm_attrmdl_model_id'],
			'order' => 1000,
			'required' => false
		],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'tm_attribute_id' => [
				'tm_attribute_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Attribute #', 'domain' => 'group_id_sequence', 'percent' => 45, 'navigation' => true],
				'tm_attribute_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 50, 'navigation' => true],
				'tm_attribute_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'tm_attribute_name' => [
				'tm_attribute_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'tm_attribute_model_id' => [
				'tm_attribute_model_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Model', 'domain' => 'group_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models', 'options_params' => ['sm_model_relation_enabled' => 1]]
			],
			'tm_attribute_method' => [
				'tm_attribute_method' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Method', 'domain' => 'code', 'percent' => 33, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Widgets\Attributes\Model\Methods'],
				'tm_attribute_domain' => ['order' => 2, 'label_name' => 'Domain', 'domain' => 'code', 'null' => true, 'percent' => 33, 'method' => 'select', 'options_model' => '\Object\Data\Domains::optionsNoSequences'],
				'tm_attribute_type' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'code', 'percent' => 34, 'required' => true, 'method' => 'select', 'options_model' => '\Object\Data\Types']
			]
		],
		'organizations_container' => [
			'row1' => [
				'tm_attrorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'tm_attrorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'models_container' => [
			'row1' => [
				'tm_attrmdl_model_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Model', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models', 'options_params' => ['sm_model_widget_attributes' => 1], 'onchange' => 'this.form.submit();'],
				'tm_attrmdl_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'model' => '\Numbers\Tenants\Widgets\Attributes\Model\Attributes',
		'details' => [
			'\Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organizations' => [
				'pk' => ['tm_attrorg_tenant_id', 'tm_attrorg_attribute_id', 'tm_attrorg_organization_id'],
				'type' => '1M',
				'map' => ['tm_attribute_tenant_id' => 'tm_attrorg_tenant_id', 'tm_attribute_id' => 'tm_attrorg_attribute_id'],
				'details' => [
					'\Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organization\Models' => [
						'pk' => ['tm_attrmdl_tenant_id', 'tm_attrmdl_attribute_id', 'tm_attrmdl_organization_id', 'tm_attrmdl_model_id'],
						'type' => '1M',
						'map' => ['tm_attrorg_tenant_id' => 'tm_attrmdl_tenant_id', 'tm_attrorg_attribute_id' => 'tm_attrmdl_attribute_id', 'tm_attrorg_organization_id' => 'tm_attrmdl_organization_id']
					]
				]
			]
		]
	];

	public function validate(& $form) {
		if (!$form->hasErrors()) {
			if (!empty($form->values['tm_attribute_model_id'])) {
				$model = \Numbers\Backend\Db\Common\Model\Models::getStatic([
					'where' => [
						'sm_model_id' => $form->values['tm_attribute_model_id'],
						'sm_model_relation_enabled' => 1
					],
					'single_row' => true,
					'no_cache' => true
				]);
				$form->values['tm_attribute_domain'] = $model['sm_model_relation_domain'];
				$form->values['tm_attribute_type'] = $model['sm_model_relation_type'];
				// method
				if (!in_array($form->values['tm_attribute_method'], ['select', 'multiselect', 'autocomplete', 'multiautocomplete'])) {
					$form->error('danger', 'You can only have Select(s) and Autocomplete(s) if model is selected!', 'tm_attribute_method');
				}
			} else {
				// method
				if (!in_array($form->values['tm_attribute_method'], ['text', 'boolean'])) {
					$form->error('danger', 'You can only have Text and Boolean!', 'tm_attribute_method');
				}
			}
		}
	}
}