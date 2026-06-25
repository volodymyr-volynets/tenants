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

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Batch Types';
    public $name = 'tm_batch_types';
    public $pk = ['tm_batchtype_tenant_id', 'tm_batchtype_code'];
    public $tenant = true;
    public $orderby = ['tm_batchtype_name' => SORT_ASC];
    public $limit;
    public $column_prefix = 'tm_batchtype_';
    public $columns = [
        'tm_batchtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_batchtype_code' => ['name' => 'Batch Code', 'domain' => 'code'],
        'tm_batchtype_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_batchtype_prefix' => ['name' => 'Prefix', 'domain' => 'name', 'null' => true],
        'tm_batchtype_length' => ['name' => 'Length', 'domain' => 'counter'],
        'tm_batchtype_suffix' => ['name' => 'Suffix', 'domain' => 'name', 'null' => true],
        'tm_batchtype_counter' => ['name' => 'Counter', 'domain' => 'counter'],
        'tm_batchtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'tm_batch_types_pk' => ['type' => 'pk', 'columns' => ['tm_batchtype_tenant_id', 'tm_batchtype_code']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = true;
    public $options_map = [
        'tm_batchtype_name' => 'name',
        'tm_batchtype_code' => 'name',
        'tm_batchtype_inactive' => 'inactive'
    ];
    public $options_active = [
        'tm_batchtype_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
