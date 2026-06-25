<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Filters\Model;

use Object\ActiveRecord;

class FormsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Forms::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_filterform_tenant_id','tm_filterform_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_filterform_tenant_id = null {
        get => $this->tm_filterform_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_tenant_id', $value);
            $this->tm_filterform_tenant_id = $value;
        }
    }

    /**
     * Filter #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $tm_filterform_id = null {
        get => $this->tm_filterform_id;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_id', $value);
            $this->tm_filterform_id = $value;
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
    public string|null $tm_filterform_timestamp = 'now()' {
        get => $this->tm_filterform_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_timestamp', $value);
            $this->tm_filterform_timestamp = $value;
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
    public string|null $tm_filterform_name = null {
        get => $this->tm_filterform_name;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_name', $value);
            $this->tm_filterform_name = $value;
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
    public string|null $tm_filterform_resource_code = null {
        get => $this->tm_filterform_resource_code;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_resource_code', $value);
            $this->tm_filterform_resource_code = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $tm_filterform_user_id = null {
        get => $this->tm_filterform_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_user_id', $value);
            $this->tm_filterform_user_id = $value;
        }
    }

    /**
     * Parameters
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $tm_filterform_params = null {
        get => $this->tm_filterform_params;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_params', $value);
            $this->tm_filterform_params = $value;
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
    public int|null $tm_filterform_inactive = 0 {
        get => $this->tm_filterform_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_inactive', $value);
            $this->tm_filterform_inactive = $value;
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
    public string|null $tm_filterform_optimistic_lock = 'now()' {
        get => $this->tm_filterform_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('tm_filterform_optimistic_lock', $value);
            $this->tm_filterform_optimistic_lock = $value;
        }
    }
}
