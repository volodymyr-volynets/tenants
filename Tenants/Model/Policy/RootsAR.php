<?php

namespace Numbers\Tenants\Tenants\Model\Policy;
class RootsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Policy\Roots::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_polroot_tenant_id','tm_polroot_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_polroot_tenant_id = NULL {
                        get => $this->tm_polroot_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polroot_tenant_id', $value);
                            $this->tm_polroot_tenant_id = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $tm_polroot_code = null {
                        get => $this->tm_polroot_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polroot_code', $value);
                            $this->tm_polroot_code = $value;
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
    public string|null $tm_polroot_name = null {
                        get => $this->tm_polroot_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polroot_name', $value);
                            $this->tm_polroot_name = $value;
                        }
                    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $tm_polroot_icon = null {
                        get => $this->tm_polroot_icon;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polroot_icon', $value);
                            $this->tm_polroot_icon = $value;
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
    public int|null $tm_polroot_inactive = 0 {
                        get => $this->tm_polroot_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polroot_inactive', $value);
                            $this->tm_polroot_inactive = $value;
                        }
                    }
}
