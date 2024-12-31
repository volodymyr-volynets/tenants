<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\DataSource\Module;

use Numbers\Tenants\Tenants\Model\Modules;
use Object\DataSource;

class Linked extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['tm_modlinked_parent_module_id', 'tm_modlinked_child_module_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Tenants\Tenants\Model\Module\Linked';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'a.tm_modlinked_parent_module_id',
            'a.tm_modlinked_parent_module_code',
            'a.tm_modlinked_child_module_id',
            'a.tm_modlinked_child_module_code',
            'a.tm_modlinked_inactive'
        ]);
        $this->query->union('UNION', function (& $query) {
            // first query
            $query1 = Modules::queryBuilderStatic(['alias' => 'union_a'])->select();
            $query1->columns([
                'tm_modlinked_parent_module_id' => 'union_a.tm_module_id',
                'tm_modlinked_parent_module_code' => 'union_a.tm_module_module_code',
                'tm_modlinked_inactive_1' => 'union_a.tm_module_inactive + union_b.sm_module_inactive'
            ]);
            $query1->join('INNER', new \Numbers\Backend\System\Modules\Model\Modules(), 'union_b', 'ON', [
                ['AND', ['union_b.sm_module_code', '=', 'union_a.tm_module_module_code', true], false],
            ]);
            $query1->where('AND', ['union_b.sm_module_multiple', '=', 0]);
            // second query
            $query2 = Modules::queryBuilderStatic(['alias' => 'union_a'])->select();
            $query2->columns([
                'tm_modlinked_child_module_id' => 'union_a.tm_module_id',
                'tm_modlinked_child_module_code' => 'union_a.tm_module_module_code',
                'tm_modlinked_inactive_2' => 'union_a.tm_module_inactive + union_b.sm_module_inactive'
            ]);
            $query2->join('INNER', new \Numbers\Backend\System\Modules\Model\Modules(), 'union_b', 'ON', [
                ['AND', ['union_b.sm_module_code', '=', 'union_a.tm_module_module_code', true], false],
            ]);
            $query2->where('AND', ['union_b.sm_module_multiple', '=', 0]);
            // build main query
            $query->columns([
                'cross_join_a.tm_modlinked_parent_module_id',
                'cross_join_a.tm_modlinked_parent_module_code',
                'cross_join_b.tm_modlinked_child_module_id',
                'cross_join_b.tm_modlinked_child_module_code',
                'tm_modlinked_inactive' => 'cross_join_a.tm_modlinked_inactive_1 + cross_join_b.tm_modlinked_inactive_2'
            ]);
            $query->from($query1, 'cross_join_a');
            $query->join('CROSS', $query2, 'cross_join_b');
        });
    }
}
