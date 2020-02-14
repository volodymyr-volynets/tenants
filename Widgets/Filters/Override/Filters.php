<?php

namespace Numbers\Tenants\Widgets\Filters\Override;
class Filters {
	public $data = [
		'widgets' => [
			'filters' => [
				'fetch_filters' => '\Numbers\Tenants\Widgets\Filters\DataSource\Filters',
				'form_builder' => '\Numbers\Tenants\Widgets\Filters\Helper\Filters'
			]
		]
	];
}