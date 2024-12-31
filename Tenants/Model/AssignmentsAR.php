<?php

namespace Numbers\Tenants\Tenants\Model;
class AssignmentsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Assignments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_assignment_tenant_id','tm_assignment_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_assignment_tenant_id = NULL {
                        get => $this->tm_assignment_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_tenant_id', $value);
                            $this->tm_assignment_tenant_id = $value;
                        }
                    }

    /**
     * Assignment #
     *
     *
     *
     * {domain{assignment_id_sequence}}
     *
     * @var int|null Domain: assignment_id_sequence Type: serial
     */
    public int|null $tm_assignment_id = null {
                        get => $this->tm_assignment_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_id', $value);
                            $this->tm_assignment_id = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_assignment_code = null {
                        get => $this->tm_assignment_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_code', $value);
                            $this->tm_assignment_code = $value;
                        }
                    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_assignment_type_code = null {
                        get => $this->tm_assignment_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_type_code', $value);
                            $this->tm_assignment_type_code = $value;
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
    public string|null $tm_assignment_name = null {
                        get => $this->tm_assignment_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_name', $value);
                            $this->tm_assignment_name = $value;
                        }
                    }

    /**
     * Bidirectional
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_assignment_bidirectional = 0 {
                        get => $this->tm_assignment_bidirectional;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_bidirectional', $value);
                            $this->tm_assignment_bidirectional = $value;
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
    public int|null $tm_assignment_inactive = 0 {
                        get => $this->tm_assignment_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_inactive', $value);
                            $this->tm_assignment_inactive = $value;
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
    public string|null $tm_assignment_optimistic_lock = 'now()' {
                        get => $this->tm_assignment_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assignment_optimistic_lock', $value);
                            $this->tm_assignment_optimistic_lock = $value;
                        }
                    }
}
