<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model;

use Object\ActiveRecord;

class ApplicationLayerTypesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ApplicationLayerTypes::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_applaytype_tenant_id','tm_applaytype_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_applaytype_tenant_id = null {
        get => $this->tm_applaytype_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_tenant_id', $value);
            $this->tm_applaytype_tenant_id = $value;
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
    public string|null $tm_applaytype_code = null {
        get => $this->tm_applaytype_code;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_code', $value);
            $this->tm_applaytype_code = $value;
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
    public string|null $tm_applaytype_name = null {
        get => $this->tm_applaytype_name;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_name', $value);
            $this->tm_applaytype_name = $value;
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
    public string|null $tm_applaytype_module_code = null {
        get => $this->tm_applaytype_module_code;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_module_code', $value);
            $this->tm_applaytype_module_code = $value;
        }
    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $tm_applaytype_order = 0 {
        get => $this->tm_applaytype_order;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_order', $value);
            $this->tm_applaytype_order = $value;
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
    public int|null $tm_applaytype_inactive = 0 {
        get => $this->tm_applaytype_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_inactive', $value);
            $this->tm_applaytype_inactive = $value;
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
    public string|null $tm_applaytype_optimistic_lock = 'now()' {
        get => $this->tm_applaytype_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_optimistic_lock', $value);
            $this->tm_applaytype_optimistic_lock = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $tm_applaytype_inserted_timestamp = null {
        get => $this->tm_applaytype_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_inserted_timestamp', $value);
            $this->tm_applaytype_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $tm_applaytype_inserted_user_id = null {
        get => $this->tm_applaytype_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_inserted_user_id', $value);
            $this->tm_applaytype_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $tm_applaytype_updated_timestamp = null {
        get => $this->tm_applaytype_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_updated_timestamp', $value);
            $this->tm_applaytype_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $tm_applaytype_updated_user_id = null {
        get => $this->tm_applaytype_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_applaytype_updated_user_id', $value);
            $this->tm_applaytype_updated_user_id = $value;
        }
    }
}
