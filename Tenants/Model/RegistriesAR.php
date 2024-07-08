<?php

namespace Numbers\Tenants\Tenants\Model;
class RegistriesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Registries::class;

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
	public ?int $tm_registry_tenant_id = NULL;

	/**
	 * Registry Code
	 *
	 *
	 *
	 * {domain{code}}
	 *
	 * @var string Domain: code Type: varchar
	 */
	public ?string $tm_registry_code = null;

	/**
	 * Value
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $tm_registry_value = null;

	/**
	 * Description
	 *
	 *
	 *
	 * {domain{description}}
	 *
	 * @var string Domain: description Type: varchar
	 */
	public ?string $tm_registry_description = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_registry_inactive = 0;
}