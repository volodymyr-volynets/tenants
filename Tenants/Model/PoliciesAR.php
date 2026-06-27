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

class PoliciesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Policies::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_policy_tenant_id','tm_policy_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_policy_tenant_id = null {
        get => $this->tm_policy_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_tenant_id', $value);
            $this->tm_policy_tenant_id = $value;
        }
    }

    /**
     * Policy #
     *
     *
     *
     * {domain{policy_id_sequence}}
     *
     * @var int|null Domain: policy_id_sequence Type: serial
     */
    public int|null $tm_policy_id = null {
        get => $this->tm_policy_id;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_id', $value);
            $this->tm_policy_id = $value;
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
    public string|null $tm_policy_code = null {
        get => $this->tm_policy_code;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_code', $value);
            $this->tm_policy_code = $value;
        }
    }

    /**
     * Root Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $tm_policy_polroot_code = null {
        get => $this->tm_policy_polroot_code;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_polroot_code', $value);
            $this->tm_policy_polroot_code = $value;
        }
    }

    /**
     * Folder #
     *
     *
     *
     * {domain{folder_id}}
     *
     * @var int|null Domain: folder_id Type: integer
     */
    public int|null $tm_policy_polfolder_id = null {
        get => $this->tm_policy_polfolder_id;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_polfolder_id', $value);
            $this->tm_policy_polfolder_id = $value;
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
    public string|null $tm_policy_name = null {
        get => $this->tm_policy_name;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_name', $value);
            $this->tm_policy_name = $value;
        }
    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $tm_policy_icon = null {
        get => $this->tm_policy_icon;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_icon', $value);
            $this->tm_policy_icon = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_policy_type_code = null {
        get => $this->tm_policy_type_code;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_type_code', $value);
            $this->tm_policy_type_code = $value;
        }
    }

    /**
     * Global Attribute #
     *
     *
     *
     * {domain{attribute_id}}
     *
     * @var int|null Domain: attribute_id Type: integer
     */
    public int|null $tm_policy_global_abacattr_id = null {
        get => $this->tm_policy_global_abacattr_id;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_global_abacattr_id', $value);
            $this->tm_policy_global_abacattr_id = $value;
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
    public int|null $tm_policy_inactive = 0 {
        get => $this->tm_policy_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_inactive', $value);
            $this->tm_policy_inactive = $value;
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
    public string|null $tm_policy_optimistic_lock = 'now()' {
        get => $this->tm_policy_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('tm_policy_optimistic_lock', $value);
            $this->tm_policy_optimistic_lock = $value;
        }
    }
}
