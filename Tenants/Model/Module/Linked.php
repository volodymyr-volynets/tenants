<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Module;

use Object\Table;

class Linked extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Module Linked';
    public $name = 'tm_module_linked';
    public $pk = ['tm_modlinked_tenant_id', 'tm_modlinked_parent_module_id', 'tm_modlinked_child_module_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_modlinked_';
    public $columns = [
        'tm_modlinked_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_modlinked_parent_module_id' => ['name' => 'Parent Module #', 'domain' => 'module_id'],
        'tm_modlinked_parent_module_code' => ['name' => 'Parent Module Code', 'domain' => 'module_code'],
        'tm_modlinked_child_module_id' => ['name' => 'Child Module #', 'domain' => 'module_id'],
        'tm_modlinked_child_module_code' => ['name' => 'Child Module Code', 'domain' => 'module_code'],
        'tm_modlinked_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_module_linked_pk' => ['type' => 'pk', 'columns' => ['tm_modlinked_tenant_id', 'tm_modlinked_parent_module_id', 'tm_modlinked_child_module_id']],
        'tm_modlinked_parent_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['tm_modlinked_tenant_id', 'tm_modlinked_parent_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
        ],
        'tm_modlinked_child_module_id_fk' => [
            'type' => 'fk',
            'columns' => ['tm_modlinked_tenant_id', 'tm_modlinked_child_module_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Modules',
            'foreign_columns' => ['tm_module_tenant_id', 'tm_module_id']
        ],
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

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
