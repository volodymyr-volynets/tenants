<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Policy;

use Object\Data;

class Types extends Data
{
    public $column_key = 'tm_poltype_code';
    public $column_prefix = 'tm_poltype_';
    public $orderby;
    public $columns = [
        'tm_poltype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'tm_poltype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'GLOBAL_ASSIGNMENT_ENFORCEMENT' => ['tm_poltype_name' => 'Global Assignment Enforcement'],
    ];
}
