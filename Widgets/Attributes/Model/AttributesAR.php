<?php

namespace Numbers\Tenants\Widgets\Attributes\Model;
class AttributesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Widgets\Attributes\Model\Attributes::class;

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
	public ?int $tm_attribute_tenant_id = NULL;

	/**
	 * Attribute #
	 *
	 *
	 *
	 * {domain{attribute_id_sequence}}
	 *
	 * @var int Domain: attribute_id_sequence Type: serial
	 */
	public ?int $tm_attribute_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{group_code}}
	 *
	 * @var string Domain: group_code Type: varchar
	 */
	public ?string $tm_attribute_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_attribute_name = null;

	/**
	 * Method
	 *
	 *
	 * {options_model{\Numbers\Tenants\Widgets\Attributes\Model\Methods}}
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $tm_attribute_method = null;

	/**
	 * ABAC Attribute #
	 *
	 *
	 *
	 * {domain{attribute_id}}
	 *
	 * @var int Domain: attribute_id Type: integer
	 */
	public ?int $tm_attribute_abacattr_id = NULL;

	/**
	 * Domain
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $tm_attribute_domain = null;

	/**
	 * Type
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $tm_attribute_type = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_attribute_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $tm_attribute_optimistic_lock = 'now()';
}