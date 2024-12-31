<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Data;

class Import extends \Object\Import
{
    public $data = [
        'modules' => [
            'options' => [
                'pk' => ['sm_module_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_module_code' => 'TM',
                    'sm_module_type' => 20,
                    'sm_module_name' => 'T/M Tenants',
                    'sm_module_abbreviation' => 'T/M',
                    'sm_module_icon' => 'fas fa-user-secret',
                    'sm_module_transactions' => 0,
                    'sm_module_multiple' => 0,
                    'sm_module_activation_model' => null,
                    'sm_module_custom_activation' => false,
                    'sm_module_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
                ]
            ]
        ],
        'features' => [
            'options' => [
                'pk' => ['sm_feature_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_feature_module_code' => 'TM',
                    'sm_feature_code' => 'TM::TENANTS',
                    'sm_feature_type' => 10,
                    'sm_feature_name' => 'T/M Tenants',
                    'sm_feature_icon' => 'fas fa-user-secret',
                    'sm_feature_activation_model' => null,
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
                ],
                [
                    'sm_feature_module_code' => 'TM',
                    'sm_feature_code' => 'TM::POLICIES',
                    'sm_feature_type' => 10,
                    'sm_feature_name' => 'T/M Policies',
                    'sm_feature_icon' => 'far fa-sun',
                    'sm_feature_activation_model' => '\Numbers\Tenants\Tenants\Data\Activation\PoliciesActivate',
                    'sm_feature_reset_model' => '\Numbers\Tenants\Tenants\Data\Activation\PoliciesReset',
                    'sm_feature_activated_by_default' => 0,
                    'sm_feature_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
                        [
                            'sm_mdldep_child_module_code' => 'TM',
                            'sm_mdldep_child_feature_code' => 'TM::TENANTS'
                        ]
                    ]
                ]
            ]
        ],
        'databases' => [
            'options' => [
                'pk' => ['tm_database_code'],
                'model' => '\Numbers\Tenants\Tenants\Model\Databases',
                'method' => 'save'
            ],
            'data' => [
                [
                    'tm_database_code' => 'vvcluster_db000',
                    'tm_database_name' => 'DB 000 (Main)',
                    'tm_database_schema_set' => 1,
                    'tm_database_data_set' => 1,
                    'tm_database_current' => 0,
                    'tm_database_inactive' => 0
                ],
                [
                    'tm_database_code' => 'vvcluster_db001',
                    'tm_database_name' => 'Farm 001',
                    'tm_database_schema_set' => 0,
                    'tm_database_data_set' => 0,
                    'tm_database_current' => 1,
                    'tm_database_next_tm_tenant_id' => 250,
                    'tm_database_inactive' => 0
                ]
            ]
        ],
        'tenants' => [
            'options' => [
                'pk' => ['tm_tenant_code'],
                'model' => '\Numbers\Tenants\Tenants\Model\Tenants',
                'method' => 'save'
            ],
            'data' => [
                [
                    'tm_tenant_code' => 'SYSTEM',
                    'tm_tenant_name' => 'System',
                    'tm_tenant_inactive' => 0
                ]
            ]
        ],
    ];
}
