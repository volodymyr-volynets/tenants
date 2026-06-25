<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Filters\Data;

class Import extends \Object\Import
{
    public $data = [
        'batch_types' => [
            'options' => [
                'pk' => ['tm_batchtype_tenant_id', 'tm_batchtype_code'],
                'model' => '\Numbers\Tenants\Widgets\Batches\Model\Types',
                'method' => 'save_insert_new'
            ],
            'data' => [
                [
                    'tm_batchtype_tenant_id' => null,
                    'tm_batchtype_code' => 'SM_BATCHES_AND_LISTS',
                    'tm_batchtype_name' => 'S/M Batches & Lists',
                    'tm_batchtype_prefix' => 'SMBAL',
                    'tm_batchtype_length' => 22,
                    'tm_batchtype_suffix' => '',
                    'tm_batchtype_counter' => 0,
                    'tm_batchtype_inactive' => 0
                ],
            ]
        ],
    ];
}
