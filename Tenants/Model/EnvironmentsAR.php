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

class EnvironmentsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Environments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_environment_tenant_id','tm_environment_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_environment_tenant_id = null {
        get => $this->tm_environment_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_tenant_id', $value);
            $this->tm_environment_tenant_id = $value;
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
    public string|null $tm_environment_code = null {
        get => $this->tm_environment_code;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_code', $value);
            $this->tm_environment_code = $value;
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
    public string|null $tm_environment_name = null {
        get => $this->tm_environment_name;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_name', $value);
            $this->tm_environment_name = $value;
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
    public string|null $tm_environment_module_code = null {
        get => $this->tm_environment_module_code;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_module_code', $value);
            $this->tm_environment_module_code = $value;
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
    public int|null $tm_environment_order = 0 {
        get => $this->tm_environment_order;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_order', $value);
            $this->tm_environment_order = $value;
        }
    }

    /**
     * Development
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_environment_development = 0 {
        get => $this->tm_environment_development;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_development', $value);
            $this->tm_environment_development = $value;
        }
    }

    /**
     * Testing
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_environment_testing = 0 {
        get => $this->tm_environment_testing;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_testing', $value);
            $this->tm_environment_testing = $value;
        }
    }

    /**
     * Production
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_environment_production = 0 {
        get => $this->tm_environment_production;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_production', $value);
            $this->tm_environment_production = $value;
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
    public int|null $tm_environment_inactive = 0 {
        get => $this->tm_environment_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_inactive', $value);
            $this->tm_environment_inactive = $value;
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
    public string|null $tm_environment_optimistic_lock = 'now()' {
        get => $this->tm_environment_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_optimistic_lock', $value);
            $this->tm_environment_optimistic_lock = $value;
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
    public string|null $tm_environment_inserted_timestamp = null {
        get => $this->tm_environment_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_inserted_timestamp', $value);
            $this->tm_environment_inserted_timestamp = $value;
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
    public int|null $tm_environment_inserted_user_id = null {
        get => $this->tm_environment_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_inserted_user_id', $value);
            $this->tm_environment_inserted_user_id = $value;
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
    public string|null $tm_environment_updated_timestamp = null {
        get => $this->tm_environment_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_updated_timestamp', $value);
            $this->tm_environment_updated_timestamp = $value;
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
    public int|null $tm_environment_updated_user_id = null {
        get => $this->tm_environment_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_environment_updated_user_id', $value);
            $this->tm_environment_updated_user_id = $value;
        }
    }
}
