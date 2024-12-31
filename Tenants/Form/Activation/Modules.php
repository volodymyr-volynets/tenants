<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form\Activation;

use Numbers\Tenants\Tenants\Model\Activation;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class Modules extends Base
{
    public $form_link = 'tm_module_activation_form';
    public $module_code = 'TM';
    public $title = 'T/M Activation Modules Form';
    public $options = [
        'segment' => [
            'type' => 'primary',
            'header' => [
                'icon' => ['type' => 'cubes'],
                'title' => 'Activate Module:'
            ]
        ],
        'actions' => [
            'refresh' => true,
            'back' => true,
            'activate_feature' => ['href' => '/Numbers/Tenants/Tenants/Controller/Activation/Features/_Edit?__submit_blank=1', 'value' => 'Activate Feature', 'icon' => 'far fa-file']
        ],
        'no_ajax_form_reload' => true
    ];
    public $containers = [
        'default' => ['default_row_type' => 'grid', 'order' => 1]
    ];
    public $rows = [];
    public $elements = [
        'default' => [
            'tm_module_module_code' => [
                'tm_module_module_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_code', 'percent' => 100, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Module\Modules'],
            ],
            'tm_module_name' => [
                'tm_module_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => 'c'],
            ],
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
            ]
        ]
    ];

    public function validate(& $form)
    {
        if (!empty($form->values['tm_module_module_code'])) {
            $modules = \Numbers\Backend\System\Modules\Model\Modules::getStatic();
            if (!empty($modules[$form->values['tm_module_module_code']]['sm_module_multiple']) && empty($form->values['tm_module_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'tm_module_name');
            }
        }
    }

    public function save(& $form)
    {
        $result = Activation::activateModule($form->values['tm_module_module_code'], $form->values['tm_module_name']);
        if ($result['success']) {
            $form->error('success', 'Module has been activated!');
            return true;
        } else {
            $form->error('danger', $result['error']);
            return false;
        }
    }
}
