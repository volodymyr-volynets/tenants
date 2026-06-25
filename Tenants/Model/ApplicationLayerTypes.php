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

class ApplicationLayerTypes extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Application Layer Types';
    public $name = 'tm_application_layer_types';
    public $pk = ['tm_applaytype_tenant_id', 'tm_applaytype_code'];
    public $tenant = true;
    public $orderby = [
        'tm_applaytype_order' => SORT_ASC,
        'tm_applaytype_name' => SORT_ASC,
    ];
    public $limit;
    public $column_prefix = 'tm_applaytype_';
    public $columns = [
        'tm_applaytype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_applaytype_code' => ['name' => 'Code', 'domain' => 'code'],
        'tm_applaytype_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_applaytype_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'tm_applaytype_order' => ['name' => 'Order', 'domain' => 'order'],
        'tm_applaytype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_application_layer_types_pk' => ['type' => 'pk', 'columns' => ['tm_applaytype_tenant_id', 'tm_applaytype_code']],
        'tm_applaytype_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['tm_applaytype_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = true;
    public $options_map = [
        'tm_applaytype_name' => 'name',
        'tm_applaytype_code' => 'code',
        'tm_applaytype_inactive' => 'inactive',
    ];
    public $options_active = [
        'tm_applaytype_inactive' => 0,
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
