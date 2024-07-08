<?php

namespace Numbers\Tenants\Tenants\Model\Assignment;
class DetailsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Assignment\Details::class;

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
	public ?int $tm_assigndet_tenant_id = NULL;

	/**
	 * Assignment #
	 *
	 *
	 *
	 * {domain{assignment_id}}
	 *
	 * @var int Domain: assignment_id Type: integer
	 */
	public ?int $tm_assigndet_assignment_id = NULL;

	/**
	 * Detail #
	 *
	 *
	 *
	 * {domain{big_id_sequence}}
	 *
	 * @var int Domain: big_id_sequence Type: bigserial
	 */
	public ?int $tm_assigndet_id = null;

	/**
	 * Attribute #
	 *
	 *
	 *
	 * {domain{attribute_id}}
	 *
	 * @var int Domain: attribute_id Type: integer
	 */
	public ?int $tm_assigndet_abacattr_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_assigndet_name = null;

	/**
	 * Primary
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_assigndet_primary = 0;

	/**
	 * Multiple
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_assigndet_multiple = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_assigndet_inactive = 0;
}