<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Assignment;

use Object\Table;

class Details extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Assignment Details';
    public $name = 'tm_assignment_details';
    public $pk = ['tm_assigndet_tenant_id', 'tm_assigndet_assignment_id', 'tm_assigndet_id'];
    public $tenant = true;
    public $orderby = [
        'tm_assigndet_id' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'tm_assigndet_';
    public $columns = [
        'tm_assigndet_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_assigndet_assignment_id' => ['name' => 'Assignment #', 'domain' => 'assignment_id'],
        'tm_assigndet_id' => ['name' => 'Detail #', 'domain' => 'big_id_sequence'],
        'tm_assigndet_abacattr_id' => ['name' => 'Attribute #', 'domain' => 'attribute_id'],
        'tm_assigndet_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_assigndet_primary' => ['name' => 'Primary', 'type' => 'boolean'],
        'tm_assigndet_multiple' => ['name' => 'Multiple', 'type' => 'boolean'],
        'tm_assigndet_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'tm_assignment_details_pk' => ['type' => 'pk', 'columns' => ['tm_assigndet_tenant_id', 'tm_assigndet_assignment_id', 'tm_assigndet_id']],
        'tm_assigndet_assignment_id_fk' => [
            'type' => 'fk',
            'columns' => ['tm_assigndet_tenant_id', 'tm_assigndet_assignment_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Assignments',
            'foreign_columns' => ['tm_assignment_tenant_id' , 'tm_assignment_id']
        ],
        'tm_assigndet_abacattr_id_fk' => [
            'type' => 'fk',
            'columns' => ['tm_assigndet_abacattr_id'],
            'foreign_model' => '\Numbers\Backend\ABAC\Model\Attributes',
            'foreign_columns' => ['sm_abacattr_id']
        ],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
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
