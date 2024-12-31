<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form\List2;

use Object\Form\Wrapper\List2;

class Firewalls extends List2
{
    public $form_link = 'tm_firewalls_list';
    public $module_code = 'TM';
    public $title = 'T/M Firewalls List';
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
            'tm_policy_id' => [
                'tm_firewall_ip1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'IP', 'domain' => 'ip', 'percent' => 25, 'null' => true, 'query_builder' => 'a.tm_firewall_ip;>='],
                'tm_firewall_ip2' => ['order' => 2, 'label_name' => 'IP', 'domain' => 'ip', 'percent' => 25, 'null' => true, 'query_builder' => 'a.tm_firewall_ip;<='],
                'tm_firewall_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.tm_firewall_inactive;='],
                'tm_firewall_blocked1' => ['order' => 4, 'label_name' => 'Blocked', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.tm_firewall_blocked;=']
            ],
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
                'tm_firewall_ip' => ['order' => 1, 'row_order' => 100, 'label_name' => 'IP', 'domain' => 'ip', 'percent' => 15, 'url_edit' => true],
                'tm_firewall_inserted_timestamp' => ['order' => 2, 'label_name' => 'Inserted', 'domain' => 'timestamp_now', 'percent' => 20, 'format' => 'datetime'],
                'tm_firewall_info' => ['order' => 3, 'label_name' => 'Info', 'type' => 'json', 'percent' => 50, 'custom_renderer' => 'self::renderInfo'],
                'tm_firewall_requests' => ['order' => 3, 'label_name' => 'Requests', 'type' => 'json', 'percent' => 10],
                'tm_firewall_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                '__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 15],
                'tm_firewall_last_timestamp' => ['order' => 2, 'label_name' => 'Last Updated', 'domain' => 'timestamp_now', 'percent' => 20, 'format' => 'datetime'],
                'tm_firewall_last_10_messages' => ['order' => 3, 'label_name' => 'Last 10 Messages', 'type' => 'json', 'null' => true, 'percent' => 60, 'custom_renderer' => 'self::renderLast10'],
                'tm_firewall_blocked' => ['order' => 4, 'label_name' => 'Blocked', 'type' => 'boolean', 'percent' => 5],
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Tenants\Tenants\Model\Firewalls';
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'tm_firewall_inserted_timestamp' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'tm_firewall_inserted_timestamp' => ['name' => 'Inserted Timestamp'],
        'tm_firewall_ip' => ['name' => 'IP'],
        'tm_firewall_requests' => ['name' => '# of Requests']
    ];

    public function renderInfo(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($value)) {
            $result = [];
            $data = json_decode($value, true);
            foreach ([
                'city',
                'region',
                'country_name',
                'postal'
            ] as $v) {
                $result[] = ucfirst($v) . ': ' . $data[$v];
            }
            return implode('<hr/>', $result);
        } else {
            return '';
        }
    }

    public function renderLast10(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($value)) {
            $result = json_decode($value, true);
            foreach ($result as $k => $v) {
                $result[$k] = wordwrap($v, 80, "<br>\n", true);
            }
            return implode('<hr/>', $result);
        } else {
            return '';
        }
    }
}
