<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Controller;

use Numbers\Tenants\Tenants\Helper\ShortUrls;
use Object\Content\Messages;
use Object\Controller;

class ShortUrlRun extends Controller
{
    public function actionIndex()
    {
        $mvc = \Application::get('mvc');
        $result = \Crypt::nanoValidateStatic($mvc['post_action'][0] ?? '');
        if ($result === false) {
            throw new \Exception(Messages::TOKEN_EXPIRED);
        }
        $url = ShortUrls::fetchURL($result['id'], true);
        if (empty($url)) {
            throw new \Exception(Messages::TOKEN_EXPIRED);
        }
    }
}
