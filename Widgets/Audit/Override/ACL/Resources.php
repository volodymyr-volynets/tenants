<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Audit\Override\ACL;

class Resources
{
    public $data = [
        'widgets' => [
            'audit' => [
                'model' => '\Numbers\Tenants\Widgets\Audit\Model\Virtual\Audit'
            ]
        ]
    ];
}
