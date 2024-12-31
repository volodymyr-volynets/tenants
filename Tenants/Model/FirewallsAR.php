<?php

namespace Numbers\Tenants\Tenants\Model;
class FirewallsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Firewalls::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_firewall_tenant_id','tm_firewall_ip'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_firewall_tenant_id = NULL {
                        get => $this->tm_firewall_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_tenant_id', $value);
                            $this->tm_firewall_tenant_id = $value;
                        }
                    }

    /**
     * IP Address
     *
     *
     *
     * {domain{ip}}
     *
     * @var string|null Domain: ip Type: varchar
     */
    public string|null $tm_firewall_ip = null {
                        get => $this->tm_firewall_ip;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_ip', $value);
                            $this->tm_firewall_ip = $value;
                        }
                    }

    /**
     * Decoded IP Address Info
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $tm_firewall_info = null {
                        get => $this->tm_firewall_info;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_info', $value);
                            $this->tm_firewall_info = $value;
                        }
                    }

    /**
     * Timestamp Inserted
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $tm_firewall_inserted_timestamp = 'now()' {
                        get => $this->tm_firewall_inserted_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_inserted_timestamp', $value);
                            $this->tm_firewall_inserted_timestamp = $value;
                        }
                    }

    /**
     * Last Timestamp
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $tm_firewall_last_timestamp = null {
                        get => $this->tm_firewall_last_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_last_timestamp', $value);
                            $this->tm_firewall_last_timestamp = $value;
                        }
                    }

    /**
     * Last 10 Messages
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $tm_firewall_last_10_messages = null {
                        get => $this->tm_firewall_last_10_messages;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_last_10_messages', $value);
                            $this->tm_firewall_last_10_messages = $value;
                        }
                    }

    /**
     * Requests
     *
     *
     *
     * {domain{bigcounter}}
     *
     * @var int|null Domain: bigcounter Type: bigint
     */
    public int|null $tm_firewall_requests = 0 {
                        get => $this->tm_firewall_requests;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_requests', $value);
                            $this->tm_firewall_requests = $value;
                        }
                    }

    /**
     * Blocked
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_firewall_blocked = 0 {
                        get => $this->tm_firewall_blocked;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_blocked', $value);
                            $this->tm_firewall_blocked = $value;
                        }
                    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_firewall_inactive = 0 {
                        get => $this->tm_firewall_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_firewall_inactive', $value);
                            $this->tm_firewall_inactive = $value;
                        }
                    }
}
