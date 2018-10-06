<?php

namespace Numbers\Tenants\Tenants\Form\List2;
class Policies extends \Object\Form\Wrapper\List2 {
	public $form_link = 'tm_policies_list';
	public $module_code = 'TM';
	public $title = 'T/M Policies List';
	public $options = [
		'segment' => self::SEGMENT_LIST,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
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
			'tm_policy_id' => [
				'tm_policy_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy #', 'domain' => 'policy_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.tm_policy_id;>='],
				'tm_policy_id2' => ['order' => 2, 'label_name' => 'Policy #', 'domain' => 'policy_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.tm_policy_id;<='],
				'tm_policy_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.tm_policy_inactive;=']
			],
			'tm_policy_polroot_code' => [
				'tm_policy_polroot_code1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Root', 'domain' => 'type_code', 'null' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots', 'query_builder' => 'a.tm_policy_polroot_code;=', 'onchange' => 'this.form.submit();'],
				'tm_policy_polfolder_id1' => ['order' => 2, 'label_name' => 'Folder', 'domain' => 'folder_id', 'null' => true, 'percent' => 75, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Policy\Folders::optionsJson', 'options_depends' => ['polroot_code' => 'tm_policy_polroot_code1'], 'query_builder' => 'a.tm_policy_polfolder_id;='],
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.tm_policy_code', 'a.tm_policy_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
			]
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
				'tm_policy_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy #', 'domain' => 'policy_id_sequence', 'percent' => 15, 'url_edit' => true],
				'tm_policy_name' => ['order' => 2, 'label_name' => 'Name', 'type' => 'text', 'percent' => 50],
				'tm_policy_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 30],
				'tm_policy_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
			],
			'row2' => [
				'__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 15],
				'tm_policy_polroot_code' => ['order' => 2, 'label_name' => 'Root', 'domain' => 'type_code', 'percent' => 25, 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots'],
				'tm_policy_polfolder_id' => ['order' => 3, 'label_name' => 'Folder', 'domain' => 'folder_id', 'percent' => 60, 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Folders', 'options_depends' => ['tm_polfolder_polroot_code' => 'tm_policy_polroot_code']],
			]
		]
	];
	public $query_primary_model = '\Numbers\Tenants\Tenants\Model\Policies';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'tm_policy_id' => SORT_ASC
		]
	];
	const LIST_SORT_OPTIONS = [
		'tm_policy_id' => ['name' => 'Policy #'],
		'tm_policy_code' => ['name' => 'Code'],
		'tm_policy_name' => ['name' => 'Name'],
	];
}