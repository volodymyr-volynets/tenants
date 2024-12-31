<?php

namespace Numbers\Tenants\Widgets\Attributes\Model\Attribute;
class DetailsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Widgets\Attributes\Model\Attribute\Details::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_attrdetail_tenant_id','tm_attrdetail_attribute_id','tm_attrdetail_module_id','tm_attrdetail_model_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_attrdetail_tenant_id = NULL {
                        get => $this->tm_attrdetail_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attrdetail_tenant_id', $value);
                            $this->tm_attrdetail_tenant_id = $value;
                        }
                    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $tm_attrdetail_timestamp = 'now()' {
                        get => $this->tm_attrdetail_timestamp;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attrdetail_timestamp', $value);
                            $this->tm_attrdetail_timestamp = $value;
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
    public int|null $tm_attrdetail_attribute_id = NULL {
                        get => $this->tm_attrdetail_attribute_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attrdetail_attribute_id', $value);
                            $this->tm_attrdetail_attribute_id = $value;
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
    public int|null $tm_attrdetail_module_id = NULL {
                        get => $this->tm_attrdetail_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attrdetail_module_id', $value);
                            $this->tm_attrdetail_module_id = $value;
                        }
                    }

    /**
     * Model #
     *
     *
     *
     * {domain{model_id}}
     *
     * @var int|null Domain: model_id Type: integer
     */
    public int|null $tm_attrdetail_model_id = NULL {
                        get => $this->tm_attrdetail_model_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attrdetail_model_id', $value);
                            $this->tm_attrdetail_model_id = $value;
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
    public int|null $tm_attrdetail_inactive = 0 {
                        get => $this->tm_attrdetail_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_attrdetail_inactive', $value);
                            $this->tm_attrdetail_inactive = $value;
                        }
                    }
}
