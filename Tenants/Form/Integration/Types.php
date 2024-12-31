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

class Types extends Base
{
    public $form_link = 'tm_integration_types';
    public $module_code = 'TM';
    public $title = 'T/M Integration Types Form';
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
            'tm_integtype_code' => [
                'tm_integtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => true, 'percent' => 95, 'navigation' => true],
                'tm_integtype_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'tm_integtype_name' => [
                'tm_integtype_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
            ],
            'tm_integtype_password_code' => [
                'tm_integtype_password_code' => ['order' => 1, 'row_order' => 250, 'label_name' => 'Credentials', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Credential\Passwords::optionsActive'],
                'tm_integtype_group' => ['order' => 2, 'label_name' => 'Group', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 25],
                'tm_integtype_start_datetime' => ['order' => 3, 'label_name' => 'Start Datetime', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
            ],
            'tm_integtype_params' => [
                'tm_integtype_params' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Parameters', 'type' => 'json', 'null' => true, 'percent' => 100, 'method' => 'textarea', 'rows' => 5],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Integration Types',
        'model' => '\Numbers\Tenants\Tenants\Model\Integration\Types',
    ];

    public function validate(& $form)
    {
        if ($form->values['tm_integtype_params'] === '""') {
            $form->values['tm_integtype_params'] = null;
        }
    }
}
