<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Integration;

use Object\ActiveRecord;

class ModelsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Models::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_integmodel_tenant_id','tm_integmodel_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_integmodel_tenant_id = null {
        get => $this->tm_integmodel_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('tm_integmodel_tenant_id', $value);
            $this->tm_integmodel_tenant_id = $value;
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
    public string|null $tm_integmodel_code = null {
        get => $this->tm_integmodel_code;
        set {
            $this->setFullPkAndFilledColumn('tm_integmodel_code', $value);
            $this->tm_integmodel_code = $value;
        }
    }

    /**
     * Integration Type Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $tm_integmodel_integtype_code = null {
        get => $this->tm_integmodel_integtype_code;
        set {
            $this->setFullPkAndFilledColumn('tm_integmodel_integtype_code', $value);
            $this->tm_integmodel_integtype_code = $value;
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
    public string|null $tm_integmodel_name = null {
        get => $this->tm_integmodel_name;
        set {
            $this->setFullPkAndFilledColumn('tm_integmodel_name', $value);
            $this->tm_integmodel_name = $value;
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
    public int|null $tm_integmodel_inactive = 0 {
        get => $this->tm_integmodel_inactive;
        set {
            $this->setFullPkAndFilledColumn('tm_integmodel_inactive', $value);
            $this->tm_integmodel_inactive = $value;
        }
    }
}
