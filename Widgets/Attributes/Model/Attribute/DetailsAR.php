<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Attributes\Model\Attribute;

use Object\ActiveRecord;

class DetailsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Details::class;

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
    public int|null $tm_attrdetail_tenant_id = null {
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
    public int|null $tm_attrdetail_attribute_id = null {
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
    public int|null $tm_attrdetail_module_id = null {
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
    public int|null $tm_attrdetail_model_id = null {
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
