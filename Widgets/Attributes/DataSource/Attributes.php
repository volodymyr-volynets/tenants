<?php

namespace Numbers\Tenants\Widgets\Attributes\DataSource;
class Attributes extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map = [];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model;
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true, 'required' => true],
		'model' => ['name' => 'Model', 'type' => 'text'],
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed']
	];

	public function query($parameters, $options = []) {
		// create a query object
		$this->query = \Numbers\Tenants\Widgets\Attributes\Model\Attributes::queryBuilderStatic([
			'alias' => 'a',
			'skip_acl' => true
		])->select();
		// columns
		$this->query->columns([
			'id' => 'a.tm_attribute_id',
			'name' => 'a.tm_attribute_name'
		]);
		// where
		$this->query->where('AND', function (& $query) use ($parameters) {
			if (!empty($parameters['existing_values'])) {
				$query->where('OR', ['a.tm_attribute_id', '=', $parameters['existing_values']]);
			}
			$query->where('OR', ['a.tm_attribute_inactive', '=', 0]);
			/*
			if (!empty($parameters['selected_organizations'])) {
				$query->where('OR', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\Role\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
					$query->columns(1);
					$query->where('AND', ['inner_a.um_rolorg_role_id', '=', 'a.um_role_id', true]);
					$query->where('AND', ['inner_a.um_rolorg_structure_code', '=', 'BELONGS_TO', false]);
					$query->where('AND', ['inner_a.um_rolorg_organization_id', 'IN', $parameters['selected_organizations'], false]);
				}, true);
			} else {
				$this->query->where('AND', ['a.tm_attribute_inactive', '=', 0]);
			}
			*/
		});
	}
}