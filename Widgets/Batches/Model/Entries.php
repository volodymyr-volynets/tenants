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

class Entries extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Batch Entries';
    public $name = 'tm_batch_entries';
    public $pk = ['tm_batchentry_tenant_id', 'tm_batchentry_code'];
    public $tenant = true;
    public $orderby = ['tm_batchentry_inserted_timestamp' => SORT_ASC];
    public $limit;
    public $column_prefix = 'tm_batchentry_';
    public $columns = [
        'tm_batchentry_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_batchentry_code' => ['name' => 'Batch Code', 'domain' => 'batch_code'],
        'tm_batchentry_tm_batchtype_code' => ['name' => 'Batch Type', 'domain' => 'code'],
        'tm_batchentry_record_counter' => ['name' => '# of Records', 'domain' => 'counter', 'default' => 0],
        'tm_batchentry_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'tm_batchentry_resource_code' => ['name' => 'Code', 'domain' => 'code', 'null' => true],
        'tm_batchentry_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'tm_batch_entries_pk' => ['type' => 'pk', 'columns' => ['tm_batchentry_tenant_id', 'tm_batchentry_code']],
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

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
