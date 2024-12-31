<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\DataSource\Policy;

use Helper\Tree;
use Object\DataSource;

class Folders extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'name' => 'name',
        'icon_class' => 'icon_class',
        'inactive' => 'inactive'
    ];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Tenants\Tenants\Model\Policy\Folders';
    public $parameters = [
        'polroot_code' => ['name' => 'Root Code', 'domain' => 'type_code', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.tm_polfolder_id',
            'name' => 'a.tm_polfolder_name',
            'parent' => 'a.tm_polfolder_parent_polfolder_id',
            'icon_class' => "COALESCE(a.tm_polfolder_icon, 'far fa-folder')",
            'inactive' => 'a.tm_polfolder_inactive'
        ]);
        // where
        $this->query->where('AND', ['a.tm_polfolder_polroot_code', '=', $parameters['polroot_code']]);
    }

    /**
     * @see $this->options()
     */
    public function optionsJson($options = [])
    {
        $data = $this->get($options);
        $result = [];
        if (!empty($data)) {
            $converted = Tree::convertByParent($data, 'parent');
            Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
        }
        return $result;
    }
}
