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

class EntriesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Entries::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_batchentry_tenant_id','tm_batchentry_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_batchentry_tenant_id = null {
        get => $this->tm_batchentry_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_tenant_id', $value);
            $this->tm_batchentry_tenant_id = $value;
        }
    }

    /**
     * Batch Code
     *
     *
     *
     * {domain{batch_code}}
     *
     * @var string|null Domain: batch_code Type: varchar
     */
    public string|null $tm_batchentry_code = null {
        get => $this->tm_batchentry_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_code', $value);
            $this->tm_batchentry_code = $value;
        }
    }

    /**
     * Batch Type
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_batchentry_tm_batchtype_code = null {
        get => $this->tm_batchentry_tm_batchtype_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_tm_batchtype_code', $value);
            $this->tm_batchentry_tm_batchtype_code = $value;
        }
    }

    /**
     * # of Records
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $tm_batchentry_record_counter = 0 {
        get => $this->tm_batchentry_record_counter;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_record_counter', $value);
            $this->tm_batchentry_record_counter = $value;
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
    public string|null $tm_batchentry_name = null {
        get => $this->tm_batchentry_name;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_name', $value);
            $this->tm_batchentry_name = $value;
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
    public string|null $tm_batchentry_resource_code = null {
        get => $this->tm_batchentry_resource_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_resource_code', $value);
            $this->tm_batchentry_resource_code = $value;
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
    public int|null $tm_batchentry_inactive = 0 {
        get => $this->tm_batchentry_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_inactive', $value);
            $this->tm_batchentry_inactive = $value;
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
    public string|null $tm_batchentry_inserted_timestamp = null {
        get => $this->tm_batchentry_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_inserted_timestamp', $value);
            $this->tm_batchentry_inserted_timestamp = $value;
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
    public int|null $tm_batchentry_inserted_user_id = null {
        get => $this->tm_batchentry_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_inserted_user_id', $value);
            $this->tm_batchentry_inserted_user_id = $value;
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
    public string|null $tm_batchentry_updated_timestamp = null {
        get => $this->tm_batchentry_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_updated_timestamp', $value);
            $this->tm_batchentry_updated_timestamp = $value;
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
    public int|null $tm_batchentry_updated_user_id = null {
        get => $this->tm_batchentry_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchentry_updated_user_id', $value);
            $this->tm_batchentry_updated_user_id = $value;
        }
    }
}
