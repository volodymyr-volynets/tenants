<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Override\ACL;

class Resources
{
    public $data = [
        'application_structure' => [
            'tenant' => [
                'tenant_datasource' => '\Numbers\Tenants\Tenants\DataSource\Tenants',
                'column_prefix' => 'tm_tenant_'
            ]
        ],
        'modules' => [
            'primary' => [
                'datasource' => '\Numbers\Tenants\Tenants\DataSource\Module\AllModules',
            ]
        ],
        'features' => [
            'primary' => [
                'datasource' => '\Numbers\Tenants\Tenants\DataSource\Module\AllFeatures',
            ]
        ],
        'registries' => [
            'primary' => [
                'datasource' => '\Numbers\Tenants\Tenants\DataSource\Registries'
            ]
        ],
        'abac' => [
            'model' => [
                'get' => '\Numbers\Tenants\Tenants\Helper\ABAC\Get'
            ]
        ],
        'notifications' => [
            'primary' => [
                'datasource' => '\Numbers\Tenants\Tenants\DataSource\Module\AllNotifications',
            ]
        ],
        'routes' => [
            'short_urls' => [
                'regex' => '/u/',
                'new' => '/Numbers/Tenants/Tenants/Controller/ShortUrlRun/_Index/'
            ]
        ],
        'firewalls' => [
            'primary' => [
                'model' => '\Numbers\Tenants\Tenants\Model\Firewalls',
                'prefix' => 'tm_firewall_',
                'method' => ['\Numbers\Tenants\Tenants\Model\Firewalls', 'updateOrCreateEntry'],
                'list' => ['\Numbers\Tenants\Tenants\Model\Firewalls', 'getListOfIPs']
            ]
        ]
    ];
}
