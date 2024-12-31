<?php

namespace Numbers\Tenants\Tenants\Model\Integration;
class TypesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Integration\Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_integtype_tenant_id','tm_integtype_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_integtype_tenant_id = NULL {
                        get => $this->tm_integtype_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_tenant_id', $value);
                            $this->tm_integtype_tenant_id = $value;
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
    public string|null $tm_integtype_code = null {
                        get => $this->tm_integtype_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_code', $value);
                            $this->tm_integtype_code = $value;
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
    public string|null $tm_integtype_name = null {
                        get => $this->tm_integtype_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_name', $value);
                            $this->tm_integtype_name = $value;
                        }
                    }

    /**
     * Params
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $tm_integtype_params = null {
                        get => $this->tm_integtype_params;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_params', $value);
                            $this->tm_integtype_params = $value;
                        }
                    }

    /**
     * Password Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_integtype_password_code = null {
                        get => $this->tm_integtype_password_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_password_code', $value);
                            $this->tm_integtype_password_code = $value;
                        }
                    }

    /**
     * Group
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_integtype_group = null {
                        get => $this->tm_integtype_group;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_group', $value);
                            $this->tm_integtype_group = $value;
                        }
                    }

    /**
     * Start Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $tm_integtype_start_datetime = null {
                        get => $this->tm_integtype_start_datetime;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_start_datetime', $value);
                            $this->tm_integtype_start_datetime = $value;
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
    public int|null $tm_integtype_inactive = 0 {
                        get => $this->tm_integtype_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_integtype_inactive', $value);
                            $this->tm_integtype_inactive = $value;
                        }
                    }
}
