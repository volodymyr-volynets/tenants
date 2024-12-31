<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Filters\Override;

class Filters
{
    public $data = [
        'widgets' => [
            'filters' => [
                'fetch_filters' => '\Numbers\Tenants\Widgets\Filters\DataSource\Filters',
                'form_builder' => '\Numbers\Tenants\Widgets\Filters\Helper\Filters'
            ]
        ]
    ];
}
