<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Policy;

use Object\Table;

class Roots extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Policy Roots';
    public $name = 'tm_policy_roots';
    public $pk = ['tm_polroot_tenant_id', 'tm_polroot_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_polroot_';
    public $columns = [
        'tm_polroot_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_polroot_code' => ['name' => 'Code', 'domain' => 'type_code'],
        'tm_polroot_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_polroot_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'tm_polroot_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_policy_roots_pk' => ['type' => 'pk', 'columns' => ['tm_polroot_tenant_id', 'tm_polroot_code']]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'tm_polroot_name' => 'name',
        'tm_polroot_icon' => 'icon_class',
        'tm_polroot_inactive' => 'inactive'
    ];
    public $options_active = [
        'tm_polroot_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
