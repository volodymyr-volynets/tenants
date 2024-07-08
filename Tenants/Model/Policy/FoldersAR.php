<?php

namespace Numbers\Tenants\Tenants\Model\Policy;
class FoldersAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Policy\Folders::class;

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
	public ?int $tm_polfolder_tenant_id = NULL;

	/**
	 * Folder #
	 *
	 *
	 *
	 * {domain{folder_id_sequence}}
	 *
	 * @var int Domain: folder_id_sequence Type: serial
	 */
	public ?int $tm_polfolder_id = null;

	/**
	 * Root Code
	 *
	 *
	 *
	 * {domain{type_code}}
	 *
	 * @var string Domain: type_code Type: varchar
	 */
	public ?string $tm_polfolder_polroot_code = null;

	/**
	 * Parent Folder #
	 *
	 *
	 *
	 * {domain{folder_id}}
	 *
	 * @var int Domain: folder_id Type: integer
	 */
	public ?int $tm_polfolder_parent_polfolder_id = NULL;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_polfolder_name = null;

	/**
	 * Icon
	 *
	 *
	 *
	 * {domain{icon}}
	 *
	 * @var string Domain: icon Type: varchar
	 */
	public ?string $tm_polfolder_icon = null;

	/**
	 * Counter
	 *
	 *
	 *
	 * {domain{counter}}
	 *
	 * @var int Domain: counter Type: integer
	 */
	public ?int $tm_polfolder_counter = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_polfolder_inactive = 0;

	/**
	 * Optimistic Lock
	 *
	 *
	 *
	 * {domain{optimistic_lock}}
	 *
	 * @var string Domain: optimistic_lock Type: timestamp
	 */
	public ?string $tm_polfolder_optimistic_lock = 'now()';
}