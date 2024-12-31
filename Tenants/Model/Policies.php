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

class Policies extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Policies';
    public $name = 'tm_policies';
    public $pk = ['tm_policy_tenant_id', 'tm_policy_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_policy_';
    public $columns = [
        'tm_policy_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_policy_id' => ['name' => 'Policy #', 'domain' => 'policy_id_sequence'],
        'tm_policy_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'tm_policy_polroot_code' => ['name' => 'Root Code', 'domain' => 'type_code'],
        'tm_policy_polfolder_id' => ['name' => 'Folder #', 'domain' => 'folder_id'],
        'tm_policy_name' => ['name' => 'Name', 'domain' => 'name'],
        'tm_policy_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'tm_policy_type_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'tm_policy_global_abacattr_id' => ['name' => 'Global Attribute #', 'domain' => 'attribute_id', 'null' => true],
        'tm_policy_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_policies_pk' => ['type' => 'pk', 'columns' => ['tm_policy_tenant_id', 'tm_policy_id']],
        'tm_policy_code_un' => ['type' => 'unique', 'columns' => ['tm_policy_tenant_id', 'tm_policy_code']],
        'tm_policy_polroot_code_fk' => [
            'type' => 'fk',
            'columns' => ['tm_policy_tenant_id', 'tm_policy_polroot_code'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots',
            'foreign_columns' => ['tm_polroot_tenant_id', 'tm_polroot_code']
        ],
        'tm_policy_polfolder_id_fk' => [
            'type' => 'fk',
            'columns' => ['tm_policy_tenant_id', 'tm_policy_polroot_code', 'tm_policy_polfolder_id'],
            'foreign_model' => '\Numbers\Tenants\Tenants\Model\Policy\Folders',
            'foreign_columns' => ['tm_polfolder_tenant_id', 'tm_polfolder_polroot_code', 'tm_polfolder_id']
        ],
        'tm_policy_global_abacattr_id_fk' => [
            'type' => 'fk',
            'columns' => ['tm_policy_global_abacattr_id'],
            'foreign_model' => '\Numbers\Backend\ABAC\Model\Attributes',
            'foreign_columns' => ['sm_abacattr_id']
        ]
    ];
    public $indexes = [
        'tm_policies_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['tm_policy_code', 'tm_policy_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'tm_policy_tenant_id' => 'wg_audit_tenant_id',
            'tm_policy_id' => 'wg_audit_policy_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [];
    public $options_active = [];
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

    public $triggers = [
        '\Numbers\Tenants\Tenants\Model\Policy\Folders::triggerUpdateFolderCounter'
    ];
}
