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

use Numbers\Tenants\Tenants\Model\Policy\CodeSequence;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class Policies extends Base
{
    public $form_link = 'tm_policies';
    public $module_code = 'TM';
    public $title = 'T/M Policies Form';
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
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'global_primary_attribute_container' => ['default_row_type' => 'grid', 'order' => 32001],
    ];
    public $rows = [
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'global_primary_attribute' => ['order' => 200, 'label_name' => 'Attribute'],
        ],
    ];
    public $elements = [
        'top' => [
            'tm_policy_id' => [
                'tm_policy_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Policy #', 'domain' => 'policy_id_sequence', 'percent' => 45, 'navigation' => true],
                'tm_policy_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'required' => 'c', 'percent' => 50, 'navigation' => true],
                'tm_policy_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'tm_policy_name' => [
                'tm_policy_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'percent' => 100],
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'global_primary_attribute' => [
                'global_primary_attribute' => ['container' => 'global_primary_attribute_container', 'order' => 100],
            ]
        ],
        'general_container' => [
            'tm_policy_type_code' => [
                'tm_policy_type_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Types', 'onchange' => 'this.form.submit();'],
                'tm_policy_icon' => ['order' => 2, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
            ],
            'tm_policy_polroot_code' => [
                'tm_policy_polroot_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Root', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots::optionsActive', 'onchange' => 'this.form.submit();'],
                'tm_policy_polfolder_id' => ['order' => 2, 'label_name' => 'Folder', 'domain' => 'folder_id', 'null' => true, 'required' => true, 'percent' => 75, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Policy\Folders::optionsJson', 'options_depends' => ['polroot_code' => 'tm_policy_polroot_code']],
            ],
        ],
        'global_primary_attribute_container' => [
            'tm_policy_global_abacattr_id' => [
                'tm_policy_global_abacattr_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Attribute', 'domain' => 'attribute_id', 'null' => true, 'required' => 'c', 'percent' => 100, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Backend\ABAC\Model\Attributes', 'options_params' => ['sm_abacattr_flag_abac' => 1, 'sm_abacattr_flag_link' => 0]],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Policies',
        'model' => '\Numbers\Tenants\Tenants\Model\Policies',
    ];

    public function validate(& $form)
    {
        // prepopulate sequence number
        if (empty($form->values['tm_policy_code'])) {
            $sequence = new CodeSequence();
            $form->values['tm_policy_code'] = $sequence->nextval('advanced');
        }
        // global assignments
        if ($form->values['tm_policy_type_code'] == 'GLOBAL_ASSIGNMENT_ENFORCEMENT') {
            if (empty($form->values['tm_policy_global_abacattr_id'])) {
                $form->error(DANGER, Messages::REQUIRED_FIELD, 'tm_policy_global_abacattr_id');
            }
        }
    }

    public function overrideTabs(& $form, & $tab_options, & $tab_name, & $neighbouring_values = [])
    {
        // we hide all tabs if global
        if ($form->values['tm_policy_type_code'] != 'GLOBAL_ASSIGNMENT_ENFORCEMENT') {
            if (in_array($tab_name, ['global_primary_attribute'])) {
                return ['hidden' => true];
            }
        }
    }
}
