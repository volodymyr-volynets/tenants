<?php

namespace Numbers\Tenants\Tenants\Model\Integration;
class DataAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Integration\Data::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_integdata_tenant_id','tm_integdata_integtype_code','tm_integdata_integmodel_code','tm_integdata_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_integdata_tenant_id = NULL {
                        get => $this->tm_integdata_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_tenant_id', $value);
                            $this->tm_integdata_tenant_id = $value;
                        }
                    }

    /**
     * Integration Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_integdata_integtype_code = null {
                        get => $this->tm_integdata_integtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_integtype_code', $value);
                            $this->tm_integdata_integtype_code = $value;
                        }
                    }

    /**
     * Integration Model Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_integdata_integmodel_code = null {
                        get => $this->tm_integdata_integmodel_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_integmodel_code', $value);
                            $this->tm_integdata_integmodel_code = $value;
                        }
                    }

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_integdata_code = null {
                        get => $this->tm_integdata_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_code', $value);
                            $this->tm_integdata_code = $value;
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
    public string|null $tm_integdata_name = null {
                        get => $this->tm_integdata_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_name', $value);
                            $this->tm_integdata_name = $value;
                        }
                    }

    /**
     * Map
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $tm_integdata_map = null {
                        get => $this->tm_integdata_map;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_map', $value);
                            $this->tm_integdata_map = $value;
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
    public int|null $tm_integdata_inactive = 0 {
                        get => $this->tm_integdata_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integdata_inactive', $value);
                            $this->tm_integdata_inactive = $value;
                        }
                    }
}
