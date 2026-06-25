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

class Records extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Batch Records';
    public $name = 'tm_batch_records';
    public $pk = ['tm_batchrecord_tenant_id', 'tm_batchrecord_id'];
    public $tenant = true;
    public $orderby = ['tm_batchrecord_id' => SORT_ASC];
    public $limit;
    public $column_prefix = 'tm_batchrecord_';
    public $columns = [
        'tm_batchrecord_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_batchrecord_id' => ['name' => 'Record #', 'domain' => 'big_id_sequence'],
        'tm_batchrecord_tm_batchtype_code' => ['name' => 'Batch Type', 'domain' => 'code'],
        'tm_batchrecord_tm_batchentry_code' => ['name' => 'Batch Code', 'domain' => 'batch_code'],
        'tm_batchrecord_sm_model_id' => ['name' => 'Model #', 'domain' => 'model_id'],
        'tm_batchrecord_sm_model_code' => ['name' => 'Model Code', 'domain' => 'code'],
        'tm_batchrecord_no_data_model_role_code' => ['name' => 'Role Code', 'domain' => 'lgroup_code', 'default' => 'primary'],
        'tm_batchrecord_field_code' => ['name' => 'Field Code', 'domain' => 'code'],
        'tm_batchrecord_field_name' => ['name' => 'Field Name', 'domain' => 'name'],
        'tm_batchrecord_field_value_id' => ['name' => 'Field Value #', 'domain' => 'big_id', 'null' => true],
        'tm_batchrecord_field_value_code' => ['name' => 'Field Value Code', 'domain' => 'code', 'null' => true],
        'tm_batchrecord_field_value_name' => ['name' => 'Field Value Name', 'domain' => 'name', 'null' => true],
        // module id for modules with module id
        'tm_batchrecord_module_id' => ['name' => 'Module #', 'domain' => 'module_id', 'null' => true],
        'tm_batchrecord_is_context' => ['name' => 'Is Context', 'type' => 'boolean'],
        // other
        'tm_batchrecord_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'tm_batch_records_pk' => ['type' => 'pk', 'columns' => ['tm_batchrecord_tenant_id', 'tm_batchrecord_id']],
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
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
