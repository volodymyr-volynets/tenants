<?php

class numbers_tenants_tenants_form_activation_list_modules extends object_form_wrapper_list {
	public $form_link = 'module_activation_list';
	public $options = [
		'segment' => [
			'type' => 'primary',
			'header' => [
				'icon' => ['type' => 'cubes'],
				'title' => 'General Modules:'
			]
		],
		'actions' => [
			'refresh' => true,
			'new' => ['value' => 'Activate Module', 'onclick' => ''],
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'filter', 'onclick' => 'numbers.form.list_filter_sort_toggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => 'numbers_framework_object_form_model_dummy_sort',
			'details_pk' => ['__sort'],
			'order' => 1600
		],
		self::list_container => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
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
				'tm_module_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.tm_module_id;>='],
				'tm_module_id2' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.tm_module_id;<='],
				'tm_module_module_code1' => ['order' => 3, 'label_name' => 'Module Type', 'domain' => 'module_code', 'percent' => 50, 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => 'numbers_backend_system_modules_model_modules', 'query_builder' => 'a.tm_module_module_code'],
			],
			'tm_module_module_code' => [
				'tm_module_name1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 50, 'null' => true, 'query_builder' => 'a.tm_module_name;like%'],
				'tm_module_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'query_builder' => 'a.tm_module_inactive;=']
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['tm_module_name'], 'placeholder' => 'Search in Name', 'domain' => 'name', 'percent' => 100, 'null' => true],
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::list_sort_options, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => 'object_data_model_order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::list_buttons => self::list_buttons_data,
		self::list_container => [
			'row1' => [
				'tm_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module #', 'domain' => 'module_id_sequence', 'width' => '10%'],
				'tm_module_module_code' => ['order' => 2, 'label_name' => 'Module Type', 'domain' => 'module_code', 'width' => '30%', 'options_model' => 'numbers_backend_system_modules_model_modules'],
				'tm_module_name' => ['order' => 3, 'label_name' => 'Name', 'domain' => 'name', 'width' => '45%'],
				'tm_module_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'width' => '5%']
			]
		]
	];
	public $query_primary_model = 'numbers_tenants_tenants_model_modules';
	public $list_options = [
		'pagination_top' => 'numbers_frontend_html_form_renderers_html_pagination_base',
		'pagination_bottom' => 'numbers_frontend_html_form_renderers_html_pagination_base',
		'default_limit' => 30
	];
	const list_sort_options = [
		'tm_module_id' => ['name' => 'Module #'],
		'tm_module_name' => ['name' => 'Name']
	];

	public function list_query(& $form) {
		//$form->query
	}
}