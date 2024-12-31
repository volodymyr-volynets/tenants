<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form\List2\Policy;

use Object\Form\Wrapper\List2;

class Attributes extends List2
{
    public $form_link = 'tm_policy_attributes_list';
    public $module_code = 'TM';
    public $title = 'T/M Policy Attributes List';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ]
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
        'filter' => ['default_row_type' => 'grid', 'order' => 1500],
        'sort' => self::LIST_SORT_CONTAINER,
        self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
    ];
    public $rows = [
        'tabs' => [
            'filter' => ['order' => 100, 'label_name' => 'Filter'],
            'sort' => ['order' => 200, 'label_name' => 'Sort'],
        ]
    ];
    public $elements = [
        'tabs' => [
            'filter' => [
                'filter' => ['container' => 'filter', 'order' => 100]
            ],
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
            ]
        ],
        'filter' => [
            'sm_abacattr_id' => [
                'sm_abacattr_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Attribute #', 'domain' => 'attribute_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.sm_abacattr_id;>='],
                'sm_abacattr_id2' => ['order' => 2, 'label_name' => 'Attribute #', 'domain' => 'attribute_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.sm_abacattr_id;<='],
                'sm_abacattr_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.sm_abacattr_inactive;=']
            ],
            'sm_abacattr_module_code' => [
                'sm_abacattr_module_code1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Module', 'domain' => 'module_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules', 'query_builder' => 'a.sm_abacattr_module_code;='],
                'sm_abacattr_model_id1' => ['order' => 2, 'label_name' => 'Model', 'domain' => 'model_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models', 'query_builder' => 'a.sm_abacattr_model_id;='],
            ],
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.sm_abacattr_code', 'a.sm_abacattr_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
            ]
        ],
        'sort' => [
            '__sort' => [
                '__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
                '__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
            ]
        ],
        self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
        self::LIST_CONTAINER => [
            'row1' => [
                'sm_abacattr_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Attribute #', 'domain' => 'attribute_id', 'percent' => 15, 'url_edit' => true],
                'sm_abacattr_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 50],
                'sm_abacattr_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'field_code', 'percent' => 30],
                'sm_abacattr_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                '__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 15],
                'sm_abacattr_module_code' => ['order' => 2, 'label_name' => 'Module', 'domain' => 'module_code', 'percent' => 35, 'options_model' => '\Numbers\Backend\System\Modules\Model\Modules'],
                'sm_abacattr_model_id' => ['order' => 3, 'label_name' => 'Model', 'domain' => 'model_id', 'percent' => 25, 'options_model' => '\Numbers\Backend\Db\Common\Model\Models'],
                'sm_abacattr_parent_abacattr_id' => ['order' => 4, 'label_name' => 'Parent Attribute', 'domain' => 'attribute_id', 'percent' => 25, 'options_model' => '\Numbers\Backend\ABAC\Model\Attributes'],
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Backend\ABAC\Model\Attributes';
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'sm_abacattr_id' => SORT_ASC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'sm_abacattr_id' => ['name' => 'Attribute #'],
        'sm_abacattr_code' => ['name' => 'Code'],
        'sm_abacattr_name' => ['name' => 'Name'],
    ];
}
