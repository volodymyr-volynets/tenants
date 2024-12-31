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

class Databases extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Databases';
    public $name = 'tm_databases';
    public $pk = ['tm_database_code'];
    public $tenant = false;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_database_';
    public $columns = [
        'tm_database_code' => ['name' => 'Code', 'domain' => 'database'],
        'tm_database_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_database_schema_set' => ['name' => 'Schema Set', 'type' => 'boolean'],
        'tm_database_data_set' => ['name' => 'Data Set', 'type' => 'boolean'],
        'tm_database_current' => ['name' => 'Current', 'type' => 'boolean'],
        'tm_database_next_tm_tenant_id' => ['name' => 'Next Tenant #', 'domain' => 'tenant_id', 'null' => true],
        'tm_database_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_databases_pk' => ['type' => 'pk', 'columns' => ['tm_database_code']],
    ];
    public $indexes = [
        'tm_databases_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['tm_database_code', 'tm_database_name']]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = true;
    public $options_map = [
        'tm_database_name' => 'name',
        'tm_database_code' => 'name',
    ];
    public $options_active = [
        'tm_database_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
