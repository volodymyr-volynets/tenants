<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form\Integration;

use Object\Form\Wrapper\Base;

class Models extends Base
{
    public $form_link = 'tm_integration_models';
    public $module_code = 'TM';
    public $title = 'T/M Integration Models Form';
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
            'tm_integmodel_code' => [
                'tm_integmodel_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
                'tm_integmodel_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'tm_integmodel_name' => [
                'tm_integmodel_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
            ],
            'tm_integmodel_integtype_code' => [
                'tm_integmodel_integtype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Integration Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Integration Models',
        'model' => '\Numbers\Tenants\Tenants\Model\Integration\Models',
    ];
}
