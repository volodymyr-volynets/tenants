<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form\Policy;

use Object\Form\Wrapper\Base;

class Attributes extends Base
{
    public $form_link = 'tm_policy_attributes';
    public $module_code = 'TM';
    public $title = 'T/M Policy Attributes Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'sm_abacattr_id' => [
                'sm_abacattr_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Attribute #', 'domain' => 'attribute_id_sequence', 'required' => true, 'percent' => 50, 'navigation' => true],
                'sm_abacattr_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'field_code', 'required' => true, 'percent' => 45, 'navigation' => true],
                'sm_abacattr_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'sm_abacattr_name' => [
                'sm_abacattr_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'maxlength' => 255],
            ],
            'sm_abacattr_module_code' => [
                'sm_abacattr_module_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules'],
                'sm_abacattr_model_id' => ['order' => 2, 'label_name' => 'Model', 'domain' => 'model_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models'],
            ],
            'sm_abacattr_parent_abacattr_id' => [
                'sm_abacattr_parent_abacattr_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Parent Attribute', 'domain' => 'attribute_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\ABAC\Model\Attributes'],
                'sm_abacattr_tenant' => ['order' => 2, 'label_name' => 'Tenant', 'type' => 'boolean', 'percent' => 25],
                'sm_abacattr_module' => ['order' => 3, 'label_name' => 'Module', 'type' => 'boolean', 'percent' => 25],
            ],
            'sm_abacattr_flag_abac' => [
                'sm_abacattr_flag_abac' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Flag ABAC', 'type' => 'boolean', 'percent' => 25],
                'sm_abacattr_flag_assingment' => ['order' => 2, 'label_name' => 'Flag Assignment', 'type' => 'boolean', 'percent' => 25],
                'sm_abacattr_flag_attribute' => ['order' => 3, 'label_name' => 'Flag Assignment', 'type' => 'boolean', 'percent' => 25],
                'sm_abacattr_flag_link' => ['order' => 4, 'label_name' => 'Flag Link', 'type' => 'boolean', 'percent' => 25],
            ],
            'sm_abacattr_domain' => [
                'sm_abacattr_domain' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Domain', 'domain' => 'code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Object\Data\Domains'],
                'sm_abacattr_type' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'code', 'percent' => 35, 'method' => 'select', 'options_model' => '\Object\Data\Types'],
                'sm_abacattr_is_numeric_key' => ['order' => 3, 'label_name' => 'Is Numeric Key', 'type' => 'boolean', 'percent' => 15]
            ]
        ],
    ];
    public $collection = [
        'name' => 'Attributes',
        'readonly' => true,
        'model' => '\Numbers\Backend\ABAC\Model\Attributes',
    ];

    public function refresh(& $form)
    {
        $form->readonly();
    }
}
