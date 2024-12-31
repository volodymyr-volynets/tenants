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
use Object\Form\Wrapper\Base;

class Features extends Base
{
    public $form_link = 'tm_feature_activation';
    public $module_code = 'TM';
    public $title = 'T/M Activation Features Form';
    public $options = [
        'segment' => [
            'type' => 'primary',
            'header' => [
                'icon' => ['type' => 'cog'],
                'title' => 'Feature Activation:'
            ]
        ],
        'actions' => [
            'refresh' => true,
            'back' => true,
            'activate_module' => ['href' => '/Numbers/Tenants/Tenants/Controller/Activation/Modules/_Edit?__submit_blank=1', 'value' => 'Activate Module', 'icon' => 'far fa-file']
        ],
        'no_ajax_form_reload' => true
    ];
    public $containers = [
        'default' => ['default_row_type' => 'grid', 'order' => 1]
    ];
    public $rows = [];
    public $elements = [
        'default' => [
            'tm_feature_module_id' => [
                'tm_feature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Module', 'domain' => 'module_id', 'percent' => 100, 'required' => true, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Feature\Modules', 'onchange' => 'this.form.submit();'],
            ],
            'tm_feature_feature_code' => [
                'tm_feature_feature_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Feature', 'domain' => 'feature_code', 'percent' => 100, 'required' => true, 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Activation\Feature\Features', 'options_depends' => ['tm_feature_module_id' => 'tm_feature_module_id']],
            ],
            self::BUTTONS => [
                self::BUTTON_SUBMIT => self::BUTTON_SUBMIT_DATA
            ]
        ]
    ];

    public function save(& $form)
    {
        // need to disable debug
        \Application::set('debug.debug', 0);
        // execution limit is 1 hour
        set_time_limit(3600);
        $result = Activation::activateFeature($form->values['tm_feature_module_id'], '', $form->values['tm_feature_feature_code']);
        if ($result['success']) {
            $form->error(SUCCESS, 'Feature has been activated!');
            return true;
        } else {
            $form->error(DANGER, $result['error']);
            return false;
        }
    }
}
