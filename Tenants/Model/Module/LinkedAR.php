<?php

namespace Numbers\Tenants\Tenants\Model\Module;
class LinkedAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Module\Linked::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_modlinked_tenant_id','tm_modlinked_parent_module_id','tm_modlinked_child_module_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_modlinked_tenant_id = NULL {
                        get => $this->tm_modlinked_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_modlinked_tenant_id', $value);
                            $this->tm_modlinked_tenant_id = $value;
                        }
                    }

    /**
     * Parent Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $tm_modlinked_parent_module_id = NULL {
                        get => $this->tm_modlinked_parent_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_modlinked_parent_module_id', $value);
                            $this->tm_modlinked_parent_module_id = $value;
                        }
                    }

    /**
     * Parent Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $tm_modlinked_parent_module_code = null {
                        get => $this->tm_modlinked_parent_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_modlinked_parent_module_code', $value);
                            $this->tm_modlinked_parent_module_code = $value;
                        }
                    }

    /**
     * Child Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $tm_modlinked_child_module_id = NULL {
                        get => $this->tm_modlinked_child_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_modlinked_child_module_id', $value);
                            $this->tm_modlinked_child_module_id = $value;
                        }
                    }

    /**
     * Child Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $tm_modlinked_child_module_code = null {
                        get => $this->tm_modlinked_child_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_modlinked_child_module_code', $value);
                            $this->tm_modlinked_child_module_code = $value;
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
    public int|null $tm_modlinked_inactive = 0 {
                        get => $this->tm_modlinked_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_modlinked_inactive', $value);
                            $this->tm_modlinked_inactive = $value;
                        }
                    }
}
