<?php

namespace Numbers\Tenants\Tenants\Model\Policy;
class Types extends \Object\Data {
	public $column_key = 'tm_poltype_code';
	public $column_prefix = 'tm_poltype_';
	public $orderby;
	public $columns = [
		'tm_poltype_code' => ['name' => 'Type', 'domain' => 'group_code'],
		'tm_poltype_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		'GLOBAL_ASSIGNMENT_ENFORCEMENT' => ['tm_poltype_name' => 'Global Assignment Enforcement'],
	];
}