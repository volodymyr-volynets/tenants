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
			$query->where('OR', function (& $query) use ($parameters) {
				if (!empty($parameters['selected_organizations'])) {
					// organizations
					$query->where('AND', function (& $query) use ($parameters) {
						$query = \Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
						$query->columns(1);
						$query->where('AND', ['inner_a.tm_attrorg_attribute_id', '=', 'a.tm_attribute_id', true]);
						$query->where('AND', ['inner_a.tm_attrorg_organization_id', '=', $parameters['selected_organizations'], false]);
					}, true);
					// model
					$query->where('AND', function (& $query) use ($parameters) {
						$query = \Numbers\Tenants\Widgets\Attributes\Model\Attribute\Organization\Models::queryBuilderStatic(['alias' => 'inner_b'])->select();
						$query->columns(1);
						$query->where('AND', ['inner_b.tm_attrmdl_attribute_id', '=', 'a.tm_attribute_id', true]);
						$query->where('AND', ['inner_b.tm_attrmdl_organization_id', '=', $parameters['selected_organizations'], false]);
							$query2 = \Numbers\Backend\Db\Common\Model\Models::queryBuilderStatic(['alias' => 'inner_c'])->select();
							$query2->columns('sm_model_id');
							$query2->where('AND', ['inner_c.sm_model_code', '=', $parameters['model'], false]);
						$query->where('AND', ['inner_b.tm_attrmdl_model_id', '=', '(' . $query2->sql() . ')', true]);
						$query->where('AND', ['inner_b.tm_attrmdl_inactive', '=', 0]);
					}, true);
				}
				$query->where('AND', ['a.tm_attribute_inactive', '=', 0]);
			});
		});
	}
}