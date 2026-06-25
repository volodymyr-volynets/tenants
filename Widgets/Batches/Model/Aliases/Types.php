<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Model\Aliases;

class Types extends \Numbers\Tenants\Widgets\Batches\Model\Types
{
    public $options_map = [
        'tm_batchtype_name' => 'name',
        'tm_batchtype_inactive' => 'inactive'
    ];
    public $alias_model = true;
    public $alias_for = '\Numbers\Tenants\Widgets\Batches\Model\Types';
}
