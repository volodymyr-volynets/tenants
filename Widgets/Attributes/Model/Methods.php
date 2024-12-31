<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Attributes\Model;

use Object\Data;

class Methods extends Data
{
    public $module_code = 'TM';
    public $title = 'T/M Attribute Methods';
    public $column_key = 'sm_attrmethod_code';
    public $column_prefix = 'sm_attrmethod_';
    public $columns = [
        'sm_attrmethod_code' => ['name' => 'Code', 'domain' => 'code'],
        'sm_attrmethod_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $options_map = [
        'sm_attrmethod_name' => 'name'
    ];
    public $orderby = [
        'sm_attrmethod_name' => SORT_ASC
    ];
    public $data = [
        'input' => ['sm_attrmethod_name' => 'Input'],
        'boolean' => ['sm_attrmethod_name' => 'Boolean'],
        'select' => ['sm_attrmethod_name' => 'Select'],
        'multiselect' => ['sm_attrmethod_name' => 'Select (Multiple)'],
        //'autocomplete' => ['sm_attrmethod_name' => 'Autocomplete'],
        //'multiautocomplete' => ['sm_attrmethod_name' => 'Autocomplete (Multiple)'],
    ];
}
