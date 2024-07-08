<?php

namespace Numbers\Tenants\Tenants\Model;
class TenantsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Tenants::class;

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
	 * {domain{tenant_id_sequence}}
	 *
	 * @var int Domain: tenant_id_sequence Type: serial
	 */
	public ?int $tm_tenant_id = null;

	/**
	 * Code
	 *
	 *
	 *
	 * {domain{domain_part}}
	 *
	 * @var string Domain: domain_part Type: varchar
	 */
	public ?string $tm_tenant_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_tenant_name = null;

	/**
	 * Primary Email
	 *
	 *
	 *
	 * {domain{email}}
	 *
	 * @var string Domain: email Type: varchar
	 */
	public ?string $tm_tenant_email = null;

	/**
	 * Primary Phone
	 *
	 *
	 *
	 * {domain{phone}}
	 *
	 * @var string Domain: phone Type: varchar
	 */
	public ?string $tm_tenant_phone = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_tenant_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $tm_tenant_optimistic_lock = 'now()';
}