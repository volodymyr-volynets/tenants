<?php

namespace Numbers\Tenants\Tenants\Model\Module;
class SequencesAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Module\Sequences::class;

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
	public ?int $tm_mdlseq_tenant_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $tm_mdlseq_module_id = NULL;

	/**
	 * Type
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $tm_mdlseq_type_code = null;

	/**
	 * Prefix
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $tm_mdlseq_prefix = null;

	/**
	 * Length
	 *
	 *
	 *
	 * {domain{counter}}
	 *
	 * @var int Domain: counter Type: integer
	 */
	public ?int $tm_mdlseq_length = 0;

	/**
	 * Suffix
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $tm_mdlseq_suffix = null;

	/**
	 * Counter
	 *
	 *
	 *
	 * {domain{bigcounter}}
	 *
	 * @var int Domain: bigcounter Type: bigint
	 */
	public ?int $tm_mdlseq_counter = 0;
}