<?php

namespace Numbers\Tenants\Tenants\Model;
class AssignmentsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Assignments::class;

	/**
	 * Constructing object
	 *
	 * @param array $options
	 *		skip_db_object
	 *		skip_table_object
	 */
	public function __construct($options = []) {
		if (empty($options['skip_table_object'])) {
			$this->object_table_object = new $this->object_table_class($options);
		}
	}
	/**
	 * Tenant #
	 *
	 *
	 *
	 * {domain{tenant_id}}
	 *
	 * @var int Domain: tenant_id Type: integer
	 */
	public ?int $tm_assignment_tenant_id = NULL;

	/**
	 * Assignment #
	 *
	 *
	 *
	 * {domain{assignment_id_sequence}}
	 *
	 * @var int Domain: assignment_id_sequence Type: serial
	 */
	public ?int $tm_assignment_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $tm_assignment_code = null;

	/**
	 * Type
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $tm_assignment_type_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_assignment_name = null;

	/**
	 * Bidirectional
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_assignment_bidirectional = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_assignment_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $tm_assignment_optimistic_lock = 'now()';
}