<?php

namespace Numbers\Tenants\Tenants\DataSource\Policy;
class AllPolicies extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Tenants\Tenants\Model\Policies';
	public $primary_params = ['skip_acl' => true];
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.tm_policy_id',
			'code' => 'a.tm_policy_code',
			'type' => 'a.tm_policy_type_code',
			'global_abacattr_id' => 'a.tm_policy_global_abacattr_id'
		]);
		$this->query->where('AND', ['a.tm_policy_inactive', '=', 0]);
	}
}