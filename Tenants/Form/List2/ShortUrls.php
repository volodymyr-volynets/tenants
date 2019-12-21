<?php

namespace Numbers\Tenants\Tenants\Form\List2;
class ShortUrls extends \Object\Form\Wrapper\List2 {
	public $form_link = 'tm_short_urls_list';
	public $module_code = 'TM';
	public $title = 'T/M Short URLs List';
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
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.tm_shorturl_id', 'a.tm_shorturl_value'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
				'tm_shorturl_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'URL #', 'domain' => 'big_id', 'percent' => 15, 'url_edit' => true],
				'tm_shorturl_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 50],
				'tm_shorturl_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
			],
			'row2' => [
				'__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 15],
				'tm_shorturl_full_url' => ['order' => 2, 'label_name' => 'Full Url', 'type' => 'text', 'percent' => 85],
			],
			'row3' => [
				'__blank2' => ['order' => 1, 'row_order' => 300, 'label_name' => '', 'percent' => 15],
				'tm_shorturl_short_url' => ['order' => 2, 'label_name' => 'Short Url', 'type' => 'text', 'percent' => 60],
				'tm_shorturl_expires' => ['order' => 3, 'label_name' => 'Expires', 'type' => 'timestamp', 'percent' => 25],
			]
		]
	];
	public $query_primary_model = '\Numbers\Tenants\Tenants\Model\ShortUrls';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'tm_shorturl_id' => SORT_ASC
		]
	];
	const LIST_SORT_OPTIONS = [
		'tm_shorturl_id' => ['name' => 'Url #'],
	];
}