<?php

namespace Numbers\Tenants\Tenants\Form\Activation\List2;
class Linked extends \Object\Form\Wrapper\List2 {
	public $form_link = 'tm_linked_activation_list';
	public $module_code = 'TM';
	public $title = 'T/M Linked Modules List';
	public $options = [
		'segment' => self::SEGMENT_LIST,
		'actions' => [
			'refresh' => true,
			'new' => ['value' => 'Link Modules', 'onclick' => ''],
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
		'buttons' => ['default_row_type' => 'grid', 'order' => 2000, 'class' => 'numbers_form_filter_sort_container'],
		self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
	];
	public $rows = [
		'tabs' => [
			'filter' => ['order' => 100, 'label_name' => 'Filter'],
			'sort' => ['order' => 200, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'filter' => [
				'filter' => ['container' => 'filter', 'order' => 100]
			],
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'filter' => [
			'tm_module_id' => [
				'tm_modlinked_parent_module_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Parent Module', 'domain' => 'module_id', 'percent' => 50, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Feature\Modules', 'query_builder' => 'a.tm_modlinked_parent_module_id;>='],
				'tm_modlinked_child_module_id1' => ['order' => 2, 'label_name' => 'Child Module', 'domain' => 'module_id', 'percent' => 50, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Feature\Modules', 'query_builder' => 'a.tm_modlinked_child_module_id;>='],
			],
			'tm_feature_feature_code' => [
				'tm_modlinked_inactive1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 100, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.tm_modlinked_inactive;=']
			],
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
		self::LIST_CONTAINER => [
			'row1' => [
				'tm_modlinked_parent_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Parent Module', 'domain' => 'module_id', 'percent' => 50, 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules'],
				'tm_modlinked_child_module_id' => ['order' => 2, 'label_name' => 'Child Module', 'domain' => 'module_id', 'percent' => 45, 'options_model' => '\Numbers\Tenants\Tenants\Model\Modules'],
				'tm_modlinked_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		]
	];
	public $query_primary_model = '\Numbers\Tenants\Tenants\Model\Module\Linked';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'tm_modlinked_parent_module_id' => SORT_ASC,
			'tm_modlinked_child_module_id' => SORT_ASC
		]
	];
	const LIST_SORT_OPTIONS = [
		'tm_modlinked_parent_module_id' => ['name' => 'Parent Module'],
		'tm_modlinked_child_module_id' => ['name' => 'Child Module'],
	];
}