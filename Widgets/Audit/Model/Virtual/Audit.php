<?php

namespace Numbers\Tenants\Widgets\Audit\Model\Virtual;
class Audit extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $name = null;
	public $pk = ['wg_audit_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'wg_audit_'; // must not change it
	public $columns = [];
	public $constraints = [];
	public $indexes = [];
	public $history = false;
	public $audit = false; // must not change it
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $relation; // must not change it
	public $attributes = false; // must not change it

	public $who = [
		'inserted' => true
	];

	/**
	 * Constructor
	 */
	public function __construct($class, $virtual_class_name, $options = []) {
		// add regular columns
		$this->columns['wg_audit_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
		$this->columns['wg_audit_id'] = ['name' => 'Audit #', 'domain' => 'big_id_sequence'];
		$this->determineModelMap($class, 'audit', $virtual_class_name, $options);
		$this->columns['wg_audit_changes'] = ['name' => '# of Changes', 'domain' => 'counter', 'default' => 0];
		$this->columns['wg_audit_description'] = ['name' => 'Description', 'type' => 'text', 'null' => true];
		$this->columns['wg_audit_action'] = ['name' => 'Action', 'type' => 'text', 'null' => true];
		$this->columns['wg_audit_value'] = ['name' => 'Value', 'type' => 'json'];
		// add constraints
		$this->constraints[$this->name . '_pk'] = [
			'type' => 'pk',
			'columns' => ['wg_audit_tenant_id', 'wg_audit_id']
		];
		$this->indexes[$this->name . '_parent_idx'] = ['type' => 'btree', 'columns' => array_values($this->map)];
		// construct table
		parent::__construct($options);
	}

	/**
	 * Merge
	 *
	 * @param array $data
	 * @param array $options
	 * @return array
	 */
	public function merge($data, $options = []) {
		$save = [];
		$this->columns['wg_audit_tenant_id'] = \Tenant::id();
		foreach ($this->map as $k => $v) {
			$save[$v] = $data['pk'][$k];
		}
		$save['wg_audit_description'] = $data['description'];
		$save['wg_audit_action'] = $data['action'];
		unset($data['description'], $data['action']);
		$save['wg_audit_value'] = json_encode($data);
		$save['wg_audit_changes'] = $options['changes'];
		$this->processWhoColumns(['inserted'], $save);
		$save['wg_audit_id'] = $this->sequence('wg_audit_id');
		return $this->db_object->insert($this->full_table_name, [$save]);
	}
}