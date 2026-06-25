<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Form;

use Object\Form\Wrapper\Base;

class Types extends Base
{
    public $form_link = 'tm_batch_types';
    public $module_code = 'TM';
    public $title = 'T/M Batch Types Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'tm_batchtype_code' => [
                'tm_batchtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Batch Code', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 95, 'navigation' => true],
                'tm_batchtype_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'tm_batchtype_name' => [
                'tm_batchtype_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'tm_batchtype_prefix' => [
                'tm_batchtype_prefix' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Prefix', 'domain' => 'name', 'null' => true, 'percent' => 25],
                'tm_batchtype_length' => ['order' => 2, 'label_name' => 'Length', 'domain' => 'counter', 'percent' => 25, 'required' => true],
                'tm_batchtype_suffix' => ['order' => 3, 'label_name' => 'Suffix', 'domain' => 'name', 'null' => true, 'percent' => 25],
                'tm_batchtype_counter' => ['order' => 4, 'label_name' => 'Counter', 'domain' => 'counter', 'default' => 1, 'null' => true, 'percent' => 25],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'TM Batch Types',
        'model' => '\Numbers\Tenants\Widgets\Batches\Model\Types',
    ];
}
