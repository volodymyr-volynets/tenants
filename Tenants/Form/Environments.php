<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form;

use Object\Form\Wrapper\Base;

class Environments extends Base
{
    public $form_link = 'tm_environments';
    public $module_code = 'TM';
    public $title = 'T/M Environments Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true,
        ],
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'tm_environment_id' => [
                'tm_environment_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'code', 'percent' => 95, 'navigation' => true],
                'tm_environment_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'tm_environment_name' => [
                'tm_environment_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'percent' => 100],
            ],
            'tm_environment_module_code' => [
                'tm_environment_module_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Module Code', 'domain' => 'module_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules'],
                'tm_environment_order' => ['order' => 2, 'label_name' => 'Order', 'domain' => 'order', 'required' => true, 'percent' => 50],
            ],
            'tm_environment_development' => [
                'tm_environment_development' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Development', 'type' => 'boolean', 'percent' => 25],
                'tm_environment_testing' => ['order' => 2, 'label_name' => 'Testing', 'type' => 'boolean', 'percent' => 25],
                'tm_environment_production' => ['order' => 3, 'label_name' => 'Production', 'type' => 'boolean', 'percent' => 25],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'TM Environments',
        'model' => '\Numbers\Tenants\Tenants\Model\Environments',
    ];
}
