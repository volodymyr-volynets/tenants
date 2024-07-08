<?php

namespace Numbers\Tenants\Tenants\Model;
class PoliciesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Policies::class;

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
	public ?int $tm_policy_tenant_id = NULL;

	/**
	 * Policy #
	 *
	 *
	 *
	 * {domain{policy_id_sequence}}
	 *
	 * @var int Domain: policy_id_sequence Type: serial
	 */
	public ?int $tm_policy_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $tm_policy_code = null;

	/**
	 * Root Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $tm_policy_polroot_code = null;

	/**
	 * Folder #
	 *
	 *
	 *
	 * {domain{folder_id}}
	 *
	 * @var int Domain: folder_id Type: integer
	 */
	public ?int $tm_policy_polfolder_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_policy_name = null;

	/**
	 * Icon
	 *
	 *
	 *
	 * {domain{icon}}
	 *
	 * @var string Domain: icon Type: varchar
	 */
	public ?string $tm_policy_icon = null;

	/**
	 * Type
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $tm_policy_type_code = null;

	/**
	 * Global Attribute #
	 *
	 *
	 *
	 * {domain{attribute_id}}
	 *
	 * @var int Domain: attribute_id Type: integer
	 */
	public ?int $tm_policy_global_abacattr_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_policy_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $tm_policy_optimistic_lock = 'now()';
}