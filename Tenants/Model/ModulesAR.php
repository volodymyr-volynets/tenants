<?php

namespace Numbers\Tenants\Tenants\Model;
class ModulesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Modules::class;

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
	public ?int $tm_module_tenant_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id_sequence}}
	 *
	 * @var int Domain: module_id_sequence Type: serial
	 */
	public ?int $tm_module_id = null;

	/**
	 * Module Code
	 *
	 *
	 *
	 * {domain{module_code}}
	 *
	 * @var string Domain: module_code Type: char
	 */
	public ?string $tm_module_module_code = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_module_name = null;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_module_inactive = 0;
}