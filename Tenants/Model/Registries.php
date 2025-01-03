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

use Object\Table;

class Registries extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Registries';
    public $name = 'tm_registries';
    public $pk = ['tm_registry_tenant_id', 'tm_registry_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_registry_';
    public $columns = [
        'tm_registry_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_registry_code' => ['name' => 'Registry Code', 'domain' => 'code'],
        'tm_registry_value' => ['name' => 'Value', 'type' => 'text'],
        'tm_registry_description' => ['name' => 'Description', 'domain' => 'description', 'null' => true],
        'tm_registry_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_registries_pk' => ['type' => 'pk', 'columns' => ['tm_registry_tenant_id', 'tm_registry_code']]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
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
