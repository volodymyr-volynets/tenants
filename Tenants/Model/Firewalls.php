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

class Firewalls extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'TM';
    public $title = 'T/M Firewalls';
    public $name = 'tm_firewalls';
    public $pk = ['tm_firewall_tenant_id', 'tm_firewall_ip'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'tm_firewall_';
    public $columns = [
        'tm_firewall_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_firewall_ip' => ['name' => 'IP Address', 'domain' => 'ip'],
        'tm_firewall_info' => ['name' => 'Decoded IP Address Info', 'type' => 'json', 'null' => true],
        'tm_firewall_inserted_timestamp' => ['name' => 'Timestamp Inserted', 'domain' => 'timestamp_now'],
        'tm_firewall_last_timestamp' => ['name' => 'Last Timestamp', 'type' => 'timestamp', 'null' => true],
        'tm_firewall_last_10_messages' => ['name' => 'Last 10 Messages', 'type' => 'json', 'null' => true],
        'tm_firewall_requests' => ['name' => 'Requests', 'domain' => 'bigcounter', 'default' => 0],
        'tm_firewall_blocked' => ['name' => 'Blocked', 'type' => 'boolean'],
        'tm_firewall_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'tm_firewalls_pk' => ['type' => 'pk', 'columns' => ['tm_firewall_tenant_id', 'tm_firewall_ip']],
    ];
    public $indexes = [
        'tm_firewall_blocked_idx' => ['type' => 'btree', 'columns' => ['tm_firewall_tenant_id', 'tm_firewall_blocked']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'proprietary',
        'protection' => 1,
        'scope' => 'global'
    ];

    public $triggers = [];

    /**
     * Update or create entry.
     *
     * @param string $ip
     * @param array|null $messages
     * @return array
     */
    public static function updateOrCreateEntry(string $ip, ?array $messages = []): array
    {
        $model = new Firewalls();
        $existing = $model->get([
            'where' => [
                'tm_firewall_ip' => trim($ip)
            ],
            'pk' => null,
            'single_row' => true,
            'limit' => 1
        ]);
        $timestamp = \Format::now('timestamp');
        // messages.
        $last_10_messages = [];
        if (isset($existing['tm_firewall_last_10_messages'])) {
            if (!is_array($existing['tm_firewall_last_10_messages'])) {
                $last_10_messages = json_decode($existing['tm_firewall_last_10_messages'], true);
            } else {
                $last_10_messages = $existing['tm_firewall_last_10_messages'];
            }
        }
        if (count($last_10_messages) >= 10) {
            $last_10_messages = array_reverse($last_10_messages);
            $last_10_messages = array_slice($last_10_messages, 0, 9);
            $last_10_messages = array_reverse($last_10_messages);
        }
        $message = 'Host: ' . rtrim(\Request::host(), '/') . $_SERVER['REQUEST_URI'];
        $message .= ', Folder: ' . getcwd();
        $message .= ', MVC: ' . \Application::get('mvc.full');
        $message .= ', User #: ' . \User::id();
        $message .= ', Environment: ' . \Application::get('environment');
        $message .= ', Messages: ' . implode(', ', $messages);
        $last_10_messages[] = $message;
        // requests.
        if (isset($existing['tm_firewall_requests'])) {
            $requests = $existing['tm_firewall_requests'] + 1;
        } else {
            $requests = 1;
        }
        $new = [
            'tm_firewall_ip' => $ip,
            'tm_firewall_last_timestamp' => $timestamp,
            'tm_firewall_last_10_messages' => json_encode($last_10_messages),
            'tm_firewall_requests' => $requests,
        ];
        // info.
        if (empty($existing['tm_firewall_info'])) {
            $url = \Application::get('geodecodding.url');
            $url = str_replace('{IP}', $ip, $url);
            $new['tm_firewall_info'] = file_get_contents($url);
        }
        // merge.
        return $model->collection()->merge($new);
    }

    /**
     * Get list of blocked IPs.
     *
     * @return array
     */
    public static function getListOfIPs(): array
    {
        $model = new Firewalls();
        return array_keys($model->get([
            'where' => [
                'tm_firewall_blocked' => 1
            ],
            'columns' => ['tm_firewall_ip'],
            'pk' => ['tm_firewall_ip'],
            'cache' => true
        ]));
    }
}
