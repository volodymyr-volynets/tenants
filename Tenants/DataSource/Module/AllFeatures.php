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

use Numbers\Backend\System\Modules\Model\Module\Features;
use Numbers\Tenants\Tenants\Model\Modules;
use Object\DataSource;

class AllFeatures extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['feature_code'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'module_name' => 'name',
        'feature_name' => 'name'
    ];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Tenants\Tenants\Model\Module\Features';
    public $parameters = [
        'sm_feature_type' => ['name' => 'Type', 'domain' => 'type_id']
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'feature_code' => 'a.tm_feature_feature_code',
            'feature_name' => 'c.sm_feature_name',
            'feature_icon' => 'c.sm_feature_icon',
            'prohibitive' => 'c.sm_feature_prohibitive',
            'inactive' => 'a.tm_feature_inactive'
        ]);
        // join
        $this->query->join('INNER', new Modules(), 'b', 'ON', [
            ['AND', ['b.tm_module_id', '=', 'a.tm_feature_module_id', true], false]
        ]);
        $this->query->join('INNER', new Features(), 'c', 'ON', [
            ['AND', ['a.tm_feature_feature_code', '=', 'c.sm_feature_code', true], false]
        ]);
        $this->query->join('INNER', new \Numbers\Backend\System\Modules\Model\Modules(), 'd', 'ON', [
            ['AND', ['b.tm_module_module_code', '=', 'd.sm_module_code', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.tm_feature_inactive', '=', 0]);
        $this->query->where('AND', ['b.tm_module_inactive', '=', 0]);
        $this->query->where('AND', ['c.sm_feature_inactive', '=', 0]);
        $this->query->where('AND', ['d.sm_module_inactive', '=', 0]);
        if (array_key_exists('sm_feature_type', $parameters)) {
            $this->query->where('AND', ['c.sm_feature_type', '=', $parameters['sm_feature_type']]);
        }
    }
}
