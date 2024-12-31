<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Helper;

use Helper\Date;

class ShortUrls
{
    /**
     * Create short URL
     *
     * @param string $name
     * @param string $url
     * @return array
     */
    public static function createShortUrl(string $name, string $url): array
    {
        $model = new \Numbers\Tenants\Tenants\Model\ShortUrls();
        $tm_shorturl_id = $model->sequence('tm_shorturl_id', 'nextval', \Tenant::id());
        $tm_shorturl_short_key = \Crypt::nanoCreateStatic($tm_shorturl_id);
        $result = $model->collection()->merge([
            'tm_shorturl_tenant_id' => \Tenant::id(),
            'tm_shorturl_id' => $tm_shorturl_id,
            'tm_shorturl_name' => $name,
            'tm_shorturl_full_url' => $url,
            'tm_shorturl_short_url' => '/u/' . $tm_shorturl_short_key,
            'tm_shorturl_short_key' => $tm_shorturl_short_key,
            'tm_shorturl_expires' => null,
        ]);
        if ($result['success']) {
            $result['short_url'] = '/u/' . $tm_shorturl_short_key;
            $result['short_url_with_host'] = \Request::host() . 'u/' . $tm_shorturl_short_key;
        }
        return $result;
    }

    /**
     * Fetch URL
     *
     * @param int $id
     * @param bool $redirect
     * @return string|false
     */
    public static function fetchURL(int $id, bool $redirect = true)
    {
        $data = \Numbers\Tenants\Tenants\Model\ShortUrls::getStatic([
            'where' => [
                'tm_shorturl_tenant_id' => \Tenant::id(),
                'tm_shorturl_id' => $id,
            ],
            'pk' => null,
            'single_row' => true
        ]);
        if (empty($data)) {
            return false;
        }
        // those URL that expires
        if (isset($data['tm_shorturl_expires']) && Date::is($data['tm_shorturl_expires'], \Format::now('datetime')) == 1) {
            return false;
        }
        if ($redirect) {
            \Request::redirect($data['tm_shorturl_full_url']);
        }
        return $data['tm_shorturl_full_url'];
    }
}
