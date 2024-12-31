<?php

namespace Numbers\Tenants\Tenants\Model;
class ModulesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Modules::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_module_tenant_id','tm_module_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_module_tenant_id = NULL {
                        get => $this->tm_module_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_module_tenant_id', $value);
                            $this->tm_module_tenant_id = $value;
                        }
                    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id_sequence}}
     *
     * @var int|null Domain: module_id_sequence Type: serial
     */
    public int|null $tm_module_id = null {
                        get => $this->tm_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_module_id', $value);
                            $this->tm_module_id = $value;
                        }
                    }

    /**
     * Module Code
     *
     *
     *
     * {domain{module_code}}
     *
     * @var string|null Domain: module_code Type: char
     */
    public string|null $tm_module_module_code = null {
                        get => $this->tm_module_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_module_module_code', $value);
                            $this->tm_module_module_code = $value;
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
    public string|null $tm_module_name = null {
                        get => $this->tm_module_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_module_name', $value);
                            $this->tm_module_name = $value;
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
    public int|null $tm_module_inactive = 0 {
                        get => $this->tm_module_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_module_inactive', $value);
                            $this->tm_module_inactive = $value;
                        }
                    }
}
