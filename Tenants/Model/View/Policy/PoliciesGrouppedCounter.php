<?php

namespace Numbers\Tenants\Tenants\Model\View\Policy;
class PoliciesGrouppedCounter extends \Object\View {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'TM';
	public $title = 'T/M Groupped Policies';
	public $schema;
	public $name = 'tm_policies_groupped_counter_view';
	public $pk = ['tm_policy_tenant_id', 'tm_policy_polfolder_id'];
	public $backend = ['Oracle', 'MySQLi', 'PostgreSQL'];
	public $sql_version = '1.0.0';
	public $tenant = true;
	public $column_prefix = 'tm_policy_';

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = true;

	public function definition() {
		$this->query->from(new \Numbers\Tenants\Tenants\Model\Policies(), 'a');
		$this->query->columns([
			'a.tm_policy_tenant_id',
			'a.tm_policy_polfolder_id',
			'counter' => 'COUNT(*)',
		]);
		$this->query->groupby(['a.tm_policy_tenant_id', 'a.tm_policy_polfolder_id']);
	}
}