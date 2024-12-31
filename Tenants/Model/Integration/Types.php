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

use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Integration Types';
    public $name = 'tm_integration_types';
    public $pk = ['tm_integtype_tenant_id', 'tm_integtype_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_integtype_';
    public $columns = [
        'tm_integtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_integtype_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'tm_integtype_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_integtype_params' => ['name' => 'Params', 'type' => 'json', 'null' => true],
        'tm_integtype_password_code' => ['name' => 'Password Code', 'domain' => 'group_code', 'null' => true],
        'tm_integtype_group' => ['name' => 'Group', 'domain' => 'group_code', 'null' => true],
        'tm_integtype_start_datetime' => ['name' => 'Start Datetime', 'type' => 'datetime', 'null' => true],
        'tm_integtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_integration_types_pk' => ['type' => 'pk', 'columns' => ['tm_integtype_tenant_id', 'tm_integtype_code']],
    ];
    public $indexes = [
        'tm_integration_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['tm_integtype_code', 'tm_integtype_name']],
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'tm_integtype_name' => 'name',
        'tm_integtype_inactive' => 'inactive'
    ];
    public $options_active = [
        'tm_integtype_inactive' => 0
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
