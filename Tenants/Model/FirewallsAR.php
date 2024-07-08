<?php

namespace Numbers\Tenants\Tenants\Model;
class FirewallsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\Firewalls::class;

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
	public ?int $tm_firewall_tenant_id = NULL;

	/**
	 * IP Address
	 *
	 *
	 *
	 * {domain{ip}}
	 *
	 * @var string Domain: ip Type: varchar
	 */
	public ?string $tm_firewall_ip = null;

	/**
	 * Decoded IP Address Info
	 *
	 *
	 *
	 *
	 *
	 * @var mixed Type: json
	 */
	public ?mixed $tm_firewall_info = null;

	/**
	 * Timestamp Inserted
	 *
	 *
	 *
	 * {domain{timestamp_now}}
	 *
	 * @var string Domain: timestamp_now Type: timestamp
	 */
	public ?string $tm_firewall_inserted_timestamp = 'now()';

	/**
	 * Last Timestamp
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: timestamp
	 */
	public ?string $tm_firewall_last_timestamp = null;

	/**
	 * Last 10 Messages
	 *
	 *
	 *
	 *
	 *
	 * @var mixed Type: json
	 */
	public ?mixed $tm_firewall_last_10_messages = null;

	/**
	 * Requests
	 *
	 *
	 *
	 * {domain{bigcounter}}
	 *
	 * @var int Domain: bigcounter Type: bigint
	 */
	public ?int $tm_firewall_requests = 0;

	/**
	 * Blocked
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_firewall_blocked = 0;

	/**
	 * Inactive
	 *
	 *
	 *
	 *
	 *
	 * @var int Type: boolean
	 */
	public ?int $tm_firewall_inactive = 0;
}