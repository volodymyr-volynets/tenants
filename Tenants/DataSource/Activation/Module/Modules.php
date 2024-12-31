<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\DataSource\Activation\Module;

use Object\DataSource;

class Modules extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['sm_module_code'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'sm_module_name' => 'name',
        'sm_module_icon' => 'icon_class'
    ];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Backend\System\Modules\Model\Modules';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'sm_module_code' => 'a.sm_module_code',
            'sm_module_name' => 'a.sm_module_name',
            'sm_module_icon' => 'a.sm_module_icon',
            'sm_module_activation_model' => 'a.sm_module_activation_model'
        ]);
        // join
        $this->query->join('LEFT', function (& $query) {
            // need to see if modules have not been activated
            $query = \Numbers\Tenants\Tenants\Model\Modules::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.tm_module_module_code',
                'modules_activated_counter' => 'COUNT(*)'
            ]);
            $query->groupby(['inner_a.tm_module_module_code']);
        }, 'b', 'ON', [
            ['AND', ['a.sm_module_code', '=', 'b.tm_module_module_code', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.sm_module_custom_activation', '=', 0]);
        $this->query->where('AND', ['a.sm_module_inactive', '=', 0]);
        $this->query->where('AND', ['a.sm_module_type', 'IN', [20, 30, 40]]);
        $this->query->where('AND', function (& $query) {
            $query->where('OR', ['b.modules_activated_counter', 'IS', null]);
            $query->where('OR', ['a.sm_module_multiple', '=', 1]);
        });
    }
}
