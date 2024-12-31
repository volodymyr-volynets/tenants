<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model;

use Object\Table;

class ShortUrls extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Short Urls';
    public $name = 'tm_short_urls';
    public $pk = ['tm_shorturl_tenant_id', 'tm_shorturl_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_shorturl_';
    public $columns = [
        'tm_shorturl_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_shorturl_id' => ['name' => 'Url #', 'domain' => 'big_id_sequence'],
        'tm_shorturl_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'tm_shorturl_full_url' => ['name' => 'Full Url', 'type' => 'text'],
        'tm_shorturl_short_url' => ['name' => 'Short Url', 'type' => 'text'],
        'tm_shorturl_short_key' => ['name' => 'Short Key', 'type' => 'text'],
        'tm_shorturl_expires' => ['name' => 'Expires', 'type' => 'datetime', 'null' => true],
    ];
    public $constraints = [
        'tm_short_urls_pk' => ['type' => 'pk', 'columns' => ['tm_shorturl_tenant_id', 'tm_shorturl_id']]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = true;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];
}
