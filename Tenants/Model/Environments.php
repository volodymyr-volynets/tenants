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

class Environments extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Environments';
    public $name = 'tm_environments';
    public $pk = ['tm_environment_tenant_id', 'tm_environment_code'];
    public $tenant = true;
    public $orderby = [
        'tm_environment_order' => SORT_ASC,
        'tm_environment_name' => SORT_ASC,
    ];
    public $limit;
    public $column_prefix = 'tm_environment_';
    public $columns = [
        'tm_environment_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_environment_code' => ['name' => 'Code', 'domain' => 'code'],
        'tm_environment_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_environment_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'tm_environment_order' => ['name' => 'Order', 'domain' => 'order'],
        // flags
        'tm_environment_development' => ['name' => 'Development', 'type' => 'boolean'],
        'tm_environment_testing' => ['name' => 'Testing', 'type' => 'boolean'],
        'tm_environment_production' => ['name' => 'Production', 'type' => 'boolean'],
        // other
        'tm_environment_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_environments_pk' => ['type' => 'pk', 'columns' => ['tm_environment_tenant_id', 'tm_environment_code']],
        'tm_environment_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['tm_environment_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = true;
    public $options_map = [
        'tm_environment_name' => 'name',
        'tm_environment_code' => 'code',
        'tm_environment_inactive' => 'inactive',
    ];
    public $options_active = [
        'tm_environment_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $who = [
        'inserted' => true,
        'updated' => true,
    ];

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
