<?php

namespace Numbers\Tenants\Widgets\Attributes\Model;
class AttributesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Widgets\Attributes\Model\Attributes::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_attribute_tenant_id','tm_attribute_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_attribute_tenant_id = NULL {
                        get => $this->tm_attribute_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_tenant_id', $value);
                            $this->tm_attribute_tenant_id = $value;
                        }
                    }

    /**
     * Attribute #
     *
     *
     *
     * {domain{attribute_id_sequence}}
     *
     * @var int|null Domain: attribute_id_sequence Type: serial
     */
    public int|null $tm_attribute_id = null {
                        get => $this->tm_attribute_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_id', $value);
                            $this->tm_attribute_id = $value;
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
    public string|null $tm_attribute_code = null {
                        get => $this->tm_attribute_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_code', $value);
                            $this->tm_attribute_code = $value;
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
    public string|null $tm_attribute_name = null {
                        get => $this->tm_attribute_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_name', $value);
                            $this->tm_attribute_name = $value;
                        }
                    }

    /**
     * Method
     *
     *
     * {options_model{\Numbers\Tenants\Widgets\Attributes\Model\Methods}}
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_attribute_method = null {
                        get => $this->tm_attribute_method;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_method', $value);
                            $this->tm_attribute_method = $value;
                        }
                    }

    /**
     * ABAC Attribute #
     *
     *
     *
     * {domain{attribute_id}}
     *
     * @var int|null Domain: attribute_id Type: integer
     */
    public int|null $tm_attribute_abacattr_id = NULL {
                        get => $this->tm_attribute_abacattr_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_abacattr_id', $value);
                            $this->tm_attribute_abacattr_id = $value;
                        }
                    }

    /**
     * Domain
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_attribute_domain = null {
                        get => $this->tm_attribute_domain;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_domain', $value);
                            $this->tm_attribute_domain = $value;
                        }
                    }

    /**
     * Type
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_attribute_type = null {
                        get => $this->tm_attribute_type;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_type', $value);
                            $this->tm_attribute_type = $value;
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
    public int|null $tm_attribute_inactive = 0 {
                        get => $this->tm_attribute_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_inactive', $value);
                            $this->tm_attribute_inactive = $value;
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
    public string|null $tm_attribute_optimistic_lock = 'now()' {
                        get => $this->tm_attribute_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attribute_optimistic_lock', $value);
                            $this->tm_attribute_optimistic_lock = $value;
                        }
                    }
}
