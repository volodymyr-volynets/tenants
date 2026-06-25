<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Model;

use Object\ActiveRecord;

class TypesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Types::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_batchtype_tenant_id','tm_batchtype_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_batchtype_tenant_id = null {
        get => $this->tm_batchtype_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_tenant_id', $value);
            $this->tm_batchtype_tenant_id = $value;
        }
    }

    /**
     * Batch Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_batchtype_code = null {
        get => $this->tm_batchtype_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_code', $value);
            $this->tm_batchtype_code = $value;
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
    public string|null $tm_batchtype_name = null {
        get => $this->tm_batchtype_name;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_name', $value);
            $this->tm_batchtype_name = $value;
        }
    }

    /**
     * Prefix
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $tm_batchtype_prefix = null {
        get => $this->tm_batchtype_prefix;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_prefix', $value);
            $this->tm_batchtype_prefix = $value;
        }
    }

    /**
     * Length
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $tm_batchtype_length = 0 {
        get => $this->tm_batchtype_length;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_length', $value);
            $this->tm_batchtype_length = $value;
        }
    }

    /**
     * Suffix
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $tm_batchtype_suffix = null {
        get => $this->tm_batchtype_suffix;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_suffix', $value);
            $this->tm_batchtype_suffix = $value;
        }
    }

    /**
     * Counter
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $tm_batchtype_counter = 0 {
        get => $this->tm_batchtype_counter;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_counter', $value);
            $this->tm_batchtype_counter = $value;
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
    public int|null $tm_batchtype_inactive = 0 {
        get => $this->tm_batchtype_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_inactive', $value);
            $this->tm_batchtype_inactive = $value;
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
    public string|null $tm_batchtype_optimistic_lock = 'now()' {
        get => $this->tm_batchtype_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('tm_batchtype_optimistic_lock', $value);
            $this->tm_batchtype_optimistic_lock = $value;
        }
    }
}
