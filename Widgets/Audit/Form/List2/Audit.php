<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Audit\Form\List2;

use Object\Form\Wrapper\List2;

class Audit extends List2
{
    public $form_link = 'wg_audit';
    public $module_code = 'TM';
    public $title = 'T/M Audit List';
    public $options = [
        'segment' => null,
        'actions' => [
            'refresh' => true,
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
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
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
                'wg_audit_id' => ['order' => 1, 'row_order' => 100, 'label_name' => '#', 'domain' => 'big_id', 'percent' => 15],
                'wg_audit_inserted_timestamp' => ['order' => 3, 'label_name' => 'Datetime', 'type' => 'timestamp', 'percent' => 15, 'format' => '\Format::niceTimestamp'],
                'wg_audit_inserted_user_id' => ['order' => 4, 'label_name' => 'User', 'domain' => 'user_id', 'percent' => 25, 'options_model' => '\Numbers\Users\Users\Model\Users'],
                'wg_audit_description' => ['order' => 5, 'label_name' => 'Description', 'percent' => 45],
            ],
            'row2' => [
                'blank2' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 15],
                'wg_audit_value' => ['order' => 2, 'label_name' => 'Changes', 'domain' => 'name', 'percent' => 85, 'custom_renderer' => '\Numbers\Tenants\Widgets\Audit\Form\List2\Audit::renderValueField'],
            ]
        ]
    ];
    public $query_primary_model;
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 10,
        'default_sort' => [
            'wg_audit_id' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'wg_audit_id' => ['name' => 'Audit #'],
    ];

    public function overrides(& $form)
    {
        if (!empty($form->__options['model_table'])) {
            $model = new $form->__options['model_table']();
            $form->collection = [
                'name' => 'Audit',
                'model' => $model->audit_model
            ];
        }
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        // hide module #
        if (in_array($options['options']['field_name'], ['__module_id', '__separator__module_id', '__format'])) {
            $options['options']['row_class'] = 'grid_row_hidden';
        }
    }

    public function listQuery(& $form)
    {
        $result = [
            'success' => false,
            'error' => [],
            'total' => 0,
            'rows' => []
        ];
        $form->query = \Factory::model($form->options['model_table'] . '\0Virtual0\Widgets\Audit')->queryBuilder()->select();
        $form->processReportQueryFilter($form->query);
        // additional filter
        $parent_model = \Factory::model($form->options['model_table']);
        if (!empty($parent_model->audit['map'])) {
            foreach ($parent_model->audit['map'] as $k => $v) {
                if (isset($form->options['input'][$k])) {
                    $form->query->where('AND', ['a.' . $v, '=', (int) $form->options['input'][$k]]);
                }
            }
        }
        // query #1 get counter
        $counter_query = clone $form->query;
        $counter_query->columns(['counter' => 'COUNT(*)'], ['empty_existing' => true]);
        $temp = $counter_query->query();
        if (!$temp['success']) {
            array_merge3($result['error'], $temp['error']);
            return $result;
        }
        $result['total'] = $temp['rows'][0]['counter'];
        // query #2 get rows
        $form->processListQueryOrderBy();
        $form->query->offset($form->values['__offset'] ?? 0);
        $form->query->limit($form->values['__limit']);
        $temp = $form->query->query();
        if (!$temp['success']) {
            array_merge3($result['error'], $temp['error']);
            return $result;
        }
        $result['rows'] = & $temp['rows'];
        $result['success'] = true;
        return $result;
    }

    public function renderValueField(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (is_json($value)) {
            $value = json_decode($value, true);
        }
        return '<pre>' . print_r2($value, '', true) . '</pre>';
    }
}
