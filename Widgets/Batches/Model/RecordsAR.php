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

class RecordsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Records::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_batchrecord_tenant_id','tm_batchrecord_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_batchrecord_tenant_id = null {
        get => $this->tm_batchrecord_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_tenant_id', $value);
            $this->tm_batchrecord_tenant_id = $value;
        }
    }

    /**
     * Record #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $tm_batchrecord_id = null {
        get => $this->tm_batchrecord_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_id', $value);
            $this->tm_batchrecord_id = $value;
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
    public string|null $tm_batchrecord_tm_batchtype_code = null {
        get => $this->tm_batchrecord_tm_batchtype_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_tm_batchtype_code', $value);
            $this->tm_batchrecord_tm_batchtype_code = $value;
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
    public string|null $tm_batchrecord_tm_batchentry_code = null {
        get => $this->tm_batchrecord_tm_batchentry_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_tm_batchentry_code', $value);
            $this->tm_batchrecord_tm_batchentry_code = $value;
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
    public int|null $tm_batchrecord_sm_model_id = null {
        get => $this->tm_batchrecord_sm_model_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_sm_model_id', $value);
            $this->tm_batchrecord_sm_model_id = $value;
        }
    }

    /**
     * Model Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_batchrecord_sm_model_code = null {
        get => $this->tm_batchrecord_sm_model_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_sm_model_code', $value);
            $this->tm_batchrecord_sm_model_code = $value;
        }
    }

    /**
     * Role Code
     *
     *
     *
     * {domain{lgroup_code}}
     *
     * @var string|null Domain: lgroup_code Type: varchar
     */
    public string|null $tm_batchrecord_no_data_model_role_code = 'primary' {
        get => $this->tm_batchrecord_no_data_model_role_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_no_data_model_role_code', $value);
            $this->tm_batchrecord_no_data_model_role_code = $value;
        }
    }

    /**
     * Field Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_batchrecord_field_code = null {
        get => $this->tm_batchrecord_field_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_field_code', $value);
            $this->tm_batchrecord_field_code = $value;
        }
    }

    /**
     * Field Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $tm_batchrecord_field_name = null {
        get => $this->tm_batchrecord_field_name;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_field_name', $value);
            $this->tm_batchrecord_field_name = $value;
        }
    }

    /**
     * Field Value #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $tm_batchrecord_field_value_id = null {
        get => $this->tm_batchrecord_field_value_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_field_value_id', $value);
            $this->tm_batchrecord_field_value_id = $value;
        }
    }

    /**
     * Field Value Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_batchrecord_field_value_code = null {
        get => $this->tm_batchrecord_field_value_code;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_field_value_code', $value);
            $this->tm_batchrecord_field_value_code = $value;
        }
    }

    /**
     * Field Value Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $tm_batchrecord_field_value_name = null {
        get => $this->tm_batchrecord_field_value_name;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_field_value_name', $value);
            $this->tm_batchrecord_field_value_name = $value;
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
    public int|null $tm_batchrecord_module_id = null {
        get => $this->tm_batchrecord_module_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_module_id', $value);
            $this->tm_batchrecord_module_id = $value;
        }
    }

    /**
     * Is Context
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_batchrecord_is_context = 0 {
        get => $this->tm_batchrecord_is_context;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_is_context', $value);
            $this->tm_batchrecord_is_context = $value;
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
    public int|null $tm_batchrecord_inactive = 0 {
        get => $this->tm_batchrecord_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_inactive', $value);
            $this->tm_batchrecord_inactive = $value;
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
    public string|null $tm_batchrecord_inserted_timestamp = null {
        get => $this->tm_batchrecord_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_inserted_timestamp', $value);
            $this->tm_batchrecord_inserted_timestamp = $value;
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
    public int|null $tm_batchrecord_inserted_user_id = null {
        get => $this->tm_batchrecord_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('tm_batchrecord_inserted_user_id', $value);
            $this->tm_batchrecord_inserted_user_id = $value;
        }
    }
}
