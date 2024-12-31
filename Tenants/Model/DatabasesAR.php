<?php

namespace Numbers\Tenants\Tenants\Model;
class DatabasesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Databases::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_database_code'];
    /**
     * Code
     *
     *
     *
     * {domain{database}}
     *
     * @var string|null Domain: database Type: varchar
     */
    public string|null $tm_database_code = null {
                        get => $this->tm_database_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_code', $value);
                            $this->tm_database_code = $value;
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
    public string|null $tm_database_name = null {
                        get => $this->tm_database_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_name', $value);
                            $this->tm_database_name = $value;
                        }
                    }

    /**
     * Schema Set
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_database_schema_set = 0 {
                        get => $this->tm_database_schema_set;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_schema_set', $value);
                            $this->tm_database_schema_set = $value;
                        }
                    }

    /**
     * Data Set
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_database_data_set = 0 {
                        get => $this->tm_database_data_set;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_data_set', $value);
                            $this->tm_database_data_set = $value;
                        }
                    }

    /**
     * Current
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_database_current = 0 {
                        get => $this->tm_database_current;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_current', $value);
                            $this->tm_database_current = $value;
                        }
                    }

    /**
     * Next Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_database_next_tm_tenant_id = NULL {
                        get => $this->tm_database_next_tm_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_next_tm_tenant_id', $value);
                            $this->tm_database_next_tm_tenant_id = $value;
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
    public int|null $tm_database_inactive = 0 {
                        get => $this->tm_database_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_inactive', $value);
                            $this->tm_database_inactive = $value;
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
    public string|null $tm_database_optimistic_lock = 'now()' {
                        get => $this->tm_database_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('tm_database_optimistic_lock', $value);
                            $this->tm_database_optimistic_lock = $value;
                        }
                    }
}
