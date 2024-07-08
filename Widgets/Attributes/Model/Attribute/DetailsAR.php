<?php

namespace Numbers\Tenants\Widgets\Attributes\Model\Attribute;
class DetailsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Widgets\Attributes\Model\Attribute\Details::class;

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
	public ?int $tm_attrdetail_tenant_id = NULL;

	/**
	 * Timestamp
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $tm_attrdetail_timestamp = 'now()';

	/**
	 * Attribute #
	 *
	 *
	 *
	 * {domain{attribute_id}}
	 *
	 * @var int Domain: attribute_id Type: integer
	 */
	public ?int $tm_attrdetail_attribute_id = NULL;

	/**
	 * Module #
	 *
	 *
	 *
	 * {domain{module_id}}
	 *
	 * @var int Domain: module_id Type: integer
	 */
	public ?int $tm_attrdetail_module_id = NULL;

	/**
	 * Model #
	 *
	 *
	 *
	 * {domain{model_id}}
	 *
	 * @var int Domain: model_id Type: integer
	 */
	public ?int $tm_attrdetail_model_id = NULL;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_attrdetail_inactive = 0;
}