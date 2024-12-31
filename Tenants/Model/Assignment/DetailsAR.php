<?php

namespace Numbers\Tenants\Tenants\Model\Assignment;
class DetailsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Assignment\Details::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_assigndet_tenant_id','tm_assigndet_assignment_id','tm_assigndet_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_assigndet_tenant_id = NULL {
                        get => $this->tm_assigndet_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_tenant_id', $value);
                            $this->tm_assigndet_tenant_id = $value;
                        }
                    }

    /**
     * Assignment #
     *
     *
     *
     * {domain{assignment_id}}
     *
     * @var int|null Domain: assignment_id Type: integer
     */
    public int|null $tm_assigndet_assignment_id = NULL {
                        get => $this->tm_assigndet_assignment_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_assignment_id', $value);
                            $this->tm_assigndet_assignment_id = $value;
                        }
                    }

    /**
     * Detail #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $tm_assigndet_id = null {
                        get => $this->tm_assigndet_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_id', $value);
                            $this->tm_assigndet_id = $value;
                        }
                    }

    /**
     * Attribute #
     *
     *
     *
     * {domain{attribute_id}}
     *
     * @var int|null Domain: attribute_id Type: integer
     */
    public int|null $tm_assigndet_abacattr_id = NULL {
                        get => $this->tm_assigndet_abacattr_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_abacattr_id', $value);
                            $this->tm_assigndet_abacattr_id = $value;
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
    public string|null $tm_assigndet_name = null {
                        get => $this->tm_assigndet_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_name', $value);
                            $this->tm_assigndet_name = $value;
                        }
                    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_assigndet_primary = 0 {
                        get => $this->tm_assigndet_primary;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_primary', $value);
                            $this->tm_assigndet_primary = $value;
                        }
                    }

    /**
     * Multiple
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_assigndet_multiple = 0 {
                        get => $this->tm_assigndet_multiple;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_multiple', $value);
                            $this->tm_assigndet_multiple = $value;
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
    public int|null $tm_assigndet_inactive = 0 {
                        get => $this->tm_assigndet_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_assigndet_inactive', $value);
                            $this->tm_assigndet_inactive = $value;
                        }
                    }
}
