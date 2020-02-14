<?php

namespace Numbers\Tenants\Tenants\Form\List2\Integration;
class Data extends \Object\Form\Wrapper\List2 {
	public $form_link = 'tm_integration_data_list';
	public $module_code = 'TM';
	public $title = 'T/M Integration Data List';
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
			'tm_integdata_integtype_code' => [
				'tm_integdata_integtype_code1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Integration Type', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types', 'query_builder' => 'a.tm_integdata_integtype_code;='],
				'tm_integdata_integmodel_code1' => ['order' => 2, 'label_name' => 'Integration Model', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Models', 'query_builder' => 'a.tm_integdata_integmodel_code;='],
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.tm_integdata_code', 'a.tm_integdata_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
				'tm_integdata_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 30, 'url_edit' => true],
				'tm_integdata_name' => ['order' => 2, 'label_name' => 'Name', 'type' => 'text', 'percent' => 65],
				'tm_integdata_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
			],
			'row2' => [
				'__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 30, 'url_edit' => true],
				'tm_integdata_integtype_code' => ['order' => 2, 'label_name' => 'Integration Type', 'domain' => 'group_code', 'percent' => 35, 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types'],
				'tm_integdata_integmodel_code' => ['order' => 3, 'label_name' => 'Integration Model', 'domain' => 'group_code', 'percent' => 35, 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Models'],
			]
		]
	];
	public $query_primary_model = '\Numbers\Tenants\Tenants\Model\Integration\Data';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'tm_integdata_name' => SORT_ASC
		]
	];
	const LIST_SORT_OPTIONS = [
		'tm_integdata_name' => ['name' => 'Name'],
	];
}