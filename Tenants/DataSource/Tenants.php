<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\DataSource;

use Object\DataSource;

class Tenants extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['tm_tenant_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Tenants\Tenants\Model\Tenants';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [
        'tm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_tenant_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'tm_tenant_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_tenant_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->whereMultiple('AND', $parameters);
    }
}
