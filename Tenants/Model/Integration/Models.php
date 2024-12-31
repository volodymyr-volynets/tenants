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

class Models extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Integration Types';
    public $name = 'tm_integration_models';
    public $pk = ['tm_integmodel_tenant_id', 'tm_integmodel_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_integmodel_';
    public $columns = [
        'tm_integmodel_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_integmodel_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'tm_integmodel_integtype_code' => ['name' => 'Integration Type Code', 'domain' => 'group_code'],
        'tm_integmodel_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_integmodel_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_integration_models_pk' => ['type' => 'pk', 'columns' => ['tm_integmodel_tenant_id', 'tm_integmodel_code']],
        'tm_integmodel_integtype_code_un' => ['type' => 'unique', 'columns' => ['tm_integmodel_tenant_id', 'tm_integmodel_code', 'tm_integmodel_integtype_code']],
        'tm_integmodel_integtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['tm_integmodel_tenant_id', 'tm_integmodel_integtype_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types',
            'foreign_columns' => ['tm_integtype_tenant_id', 'tm_integtype_code']
        ]
    ];
    public $indexes = [
        'tm_integration_models_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['tm_integmodel_code', 'tm_integmodel_name']],
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'tm_integmodel_name' => 'name',
        'tm_integmodel_inactive' => 'inactive'
    ];
    public $options_active = [
        'tm_integmodel_inactive' => 0
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
