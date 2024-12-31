<?php

namespace Numbers\Tenants\Tenants\Model;
class RegistriesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Registries::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_registry_tenant_id','tm_registry_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_registry_tenant_id = NULL {
                        get => $this->tm_registry_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_registry_tenant_id', $value);
                            $this->tm_registry_tenant_id = $value;
                        }
                    }

    /**
     * Registry Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_registry_code = null {
                        get => $this->tm_registry_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_registry_code', $value);
                            $this->tm_registry_code = $value;
                        }
                    }

    /**
     * Value
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $tm_registry_value = null {
                        get => $this->tm_registry_value;
                        set {
                            $this->setFullPkAndFilledColumn('tm_registry_value', $value);
                            $this->tm_registry_value = $value;
                        }
                    }

    /**
     * Description
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $tm_registry_description = null {
                        get => $this->tm_registry_description;
                        set {
                            $this->setFullPkAndFilledColumn('tm_registry_description', $value);
                            $this->tm_registry_description = $value;
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
    public int|null $tm_registry_inactive = 0 {
                        get => $this->tm_registry_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_registry_inactive', $value);
                            $this->tm_registry_inactive = $value;
                        }
                    }
}
