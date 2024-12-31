<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Assignment\Detail;

use Object\Data;

class Types extends Data
{
    public $column_key = 'tm_assigndtltype_id';
    public $column_prefix = 'tm_assigndtltype_';
    public $orderby;
    public $columns = [
        'tm_assigndtltype_id' => ['name' => 'Type #', 'domain' => 'type_id'],
        'tm_assigndtltype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        10 => ['tm_assigndtltype_name' => 'Primary'],
        20 => ['tm_assigndtltype_name' => 'Secondary']
    ];
}
