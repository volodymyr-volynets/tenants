<?php

namespace Numbers\Tenants\Widgets\Filters\DataSource;
class Filters extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
	public $columns;
	public $orderby = ['tm_filterform_timestamp' => SORT_ASC];
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[];
	public $column_prefix;

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Tenants\Widgets\Filters\Model\Forms';
	public $parameters = [
		'resource_code' => ['name' => 'Resource', 'domain' => 'code', 'required' => true],
		'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
		'only_visible' => ['name' => 'Only Visible', 'type' => 'boolean'],
	];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.tm_filterform_id',
			'timestamp' => 'a.tm_filterform_timestamp',
			'name' => 'a.tm_filterform_name',
			'params' => 'a.tm_filterform_params'
		]);
		// where
		$this->query->where('AND', ['a.tm_filterform_resource_code', '=', $parameters['resource_code']]);
		$this->query->where('AND', ['a.tm_filterform_user_id', '=', $parameters['user_id']]);
		if (!empty($parameters['only_visible'])) {
			$this->query->where('AND', ['a.tm_filterform_name', 'IS NOT', null]);
		}
	}
}