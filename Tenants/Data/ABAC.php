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

use Object\Import;

class ABAC extends Import
{
    public $data = [
        'abac_assignments' => [
            'options' => [
                'pk' => ['sm_abacassign_code'],
                'model' => '\Numbers\Backend\ABAC\Model\Assignments',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_abacassign_code' => 'CUSTOM-ASSIGNMENTS',
                    'sm_abacassign_name' => 'Custom Assignments',
                    'sm_abacassign_module_code' => 'TM',
                    'sm_abacassign_model_id' => '::id::\Numbers\Tenants\Tenants\Model\Assignments',
                    'sm_abacassign_model_code' => '\Numbers\Tenants\Tenants\Model\Assignments',
                    'sm_abacassign_inactive' => 0
                ],
            ],
        ],
    ];
}
