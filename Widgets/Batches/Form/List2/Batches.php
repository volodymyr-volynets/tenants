<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Form\List2;

use Numbers\Users\Users\Model\Users;
use Object\Form\Wrapper\List2;
use Numbers\Tenants\Widgets\Batches\Model\Records;

class Batches extends List2
{
    public $form_link = 'wg_batches';
    public $module_code = 'TM';
    public $title = 'T/M Batches List';
    public $options = [
        'segment' => null,
        'actions' => [
            'refresh' => true,
            'new' => ['href' => '/Numbers/Tenants/Widgets/Batches/Controller/Entries/_Edit?__submit_blank=1']
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
                'tm_batchrecord_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Record #', 'domain' => 'big_id', 'percent' => 15],
                'tm_batchrecord_tm_batchentry_code' => ['order' => 2, 'label_name' => 'Batch #', 'domain' => 'batch_code', 'percent' => 35, 'custom_renderer' => 'self::renderBatchNumber'],
                'tm_batchrecord_no_data_model_role_code' => ['order' => 3, 'label_name' => 'Role', 'domain' => 'code', 'percent' => 10, 'options_model' => '\Object\Data\Model\Roles'],
                'tm_batchrecord_tm_batchtype_code' => ['order' => 4, 'label_name' => 'Batch Type', 'domain' => 'code', 'percent' => 20, 'options_model' => '\Numbers\Tenants\Widgets\Batches\Model\Aliases\Types'],
                'tm_batchrecord_inserted_timestamp' => ['order' => 5, 'label_name' => 'Inserted', 'type' => 'timestamp', 'percent' => 20],
            ]
        ]
    ];
    public $query_primary_model;
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'tm_batchrecord_id' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'tm_batchrecord_id' => ['name' => 'Record #'],
        'tm_batchrecord_inserted_timestamp' => ['name' => 'Inserted'],
    ];

    public function overrides(& $form)
    {
        if (!empty($form->__options['model_table'])) {
            //$model = new $form->__options['model_table']();
            $form->collection = [
                'name' => 'Batch Records',
                'model' => '\Numbers\Tenants\Widgets\Batches\Model\Records'
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
        $form->query = Records::queryBuilderStatic(['alias' => 'a'])->select();
        $form->query->join('LEFT', new Records(), 'chat_record', 'ON', [
            ['AND', ['a.tm_batchrecord_tm_batchentry_code', '=', 'chat_record.tm_batchrecord_tm_batchentry_code', true]],
            ['AND', ['chat_record.tm_batchrecord_field_code', '=', 'c5_chat_id']],
        ]);
        // join to get actual tag
        $form->query->columns([
            'a.tm_batchrecord_id',
            'a.tm_batchrecord_tm_batchentry_code',
            'a.tm_batchrecord_tm_batchtype_code',
            'a.tm_batchrecord_no_data_model_role_code',
            'a.tm_batchrecord_inserted_timestamp',
            'c5_chat_id' => 'chat_record.tm_batchrecord_field_value_id',
        ]);
        $form->processReportQueryFilter($form->query);
        // additional filter
        $form->query->where('AND', ['a.tm_batchrecord_sm_model_code', '=', $form->options['model_table']]);
        $parent_model = \Factory::model($form->options['model_table']);
        if (!empty($parent_model->batches['map'])) {
            foreach ($parent_model->batches['map'] as $k => $v) {
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

    public function renderBatchNumber(& $form, & $options, & $value, & $neighbouring_values)
    {
        $result = $neighbouring_values['tm_batchrecord_tm_batchentry_code'];
        $result .= ' ' . \HTML::a([
            'href' => '/Numbers/Tenants/Widgets/Batches/Controller/Entries/_Edit?' . http_build_query2([
                'tm_batchentry_code' => $neighbouring_values['tm_batchrecord_tm_batchentry_code'],
            ]),
            'value' => \HTML::icon(['type' => 'fa-solid fa-link']),
        ]);
        // if its a chat record, then link to chat
        if (!empty($neighbouring_values['c5_chat_id'])) {
            $result .= ' ' . \HTML::a([
                'href' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?' . http_build_query2([
                    'c5_chat_id' => $neighbouring_values['c5_chat_id'],
                ]),
                'value' => \HTML::icon(['type' => 'fa-solid fa-message']) . ' ' . loc('NF.Form.Chat', 'Chat'),
            ]);
        }
        return $result;
    }
}
