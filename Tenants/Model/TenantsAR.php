<?php

namespace Numbers\Tenants\Tenants\Model;
class TenantsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Tenants::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_tenant_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id_sequence}}
     *
     * @var int|null Domain: tenant_id_sequence Type: serial
     */
    public int|null $tm_tenant_id = null {
                        get => $this->tm_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_id', $value);
                            $this->tm_tenant_id = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{domain_part}}
     *
     * @var string|null Domain: domain_part Type: varchar
     */
    public string|null $tm_tenant_code = null {
                        get => $this->tm_tenant_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_code', $value);
                            $this->tm_tenant_code = $value;
                        }
                    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $tm_tenant_name = null {
                        get => $this->tm_tenant_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_name', $value);
                            $this->tm_tenant_name = $value;
                        }
                    }

    /**
     * Primary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $tm_tenant_email = null {
                        get => $this->tm_tenant_email;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_email', $value);
                            $this->tm_tenant_email = $value;
                        }
                    }

    /**
     * Primary Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $tm_tenant_phone = null {
                        get => $this->tm_tenant_phone;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_phone', $value);
                            $this->tm_tenant_phone = $value;
                        }
                    }

    /**
     * Database
     *
     *
     *
     * {domain{database}}
     *
     * @var string|null Domain: database Type: varchar
     */
    public string|null $tm_tenant_tm_database_code = null {
                        get => $this->tm_tenant_tm_database_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_tm_database_code', $value);
                            $this->tm_tenant_tm_database_code = $value;
                        }
                    }

    /**
     * Registration #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $tm_tenant_um_regten_id = NULL {
                        get => $this->tm_tenant_um_regten_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_um_regten_id', $value);
                            $this->tm_tenant_um_regten_id = $value;
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
    public int|null $tm_tenant_inactive = 0 {
                        get => $this->tm_tenant_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_inactive', $value);
                            $this->tm_tenant_inactive = $value;
                        }
                    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $tm_tenant_optimistic_lock = 'now()' {
                        get => $this->tm_tenant_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('tm_tenant_optimistic_lock', $value);
                            $this->tm_tenant_optimistic_lock = $value;
                        }
                    }
}
