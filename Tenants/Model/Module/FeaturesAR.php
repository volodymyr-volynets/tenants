<?php

namespace Numbers\Tenants\Tenants\Model\Module;
class FeaturesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Module\Features::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_feature_tenant_id','tm_feature_module_id','tm_feature_feature_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_feature_tenant_id = NULL {
                        get => $this->tm_feature_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_feature_tenant_id', $value);
                            $this->tm_feature_tenant_id = $value;
                        }
                    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $tm_feature_module_id = NULL {
                        get => $this->tm_feature_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_feature_module_id', $value);
                            $this->tm_feature_module_id = $value;
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
    public string|null $tm_feature_module_code = null {
                        get => $this->tm_feature_module_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_feature_module_code', $value);
                            $this->tm_feature_module_code = $value;
                        }
                    }

    /**
     * Feature Code
     *
     *
     *
     * {domain{feature_code}}
     *
     * @var string|null Domain: feature_code Type: varchar
     */
    public string|null $tm_feature_feature_code = null {
                        get => $this->tm_feature_feature_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_feature_feature_code', $value);
                            $this->tm_feature_feature_code = $value;
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
    public int|null $tm_feature_inactive = 0 {
                        get => $this->tm_feature_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_feature_inactive', $value);
                            $this->tm_feature_inactive = $value;
                        }
                    }
}
