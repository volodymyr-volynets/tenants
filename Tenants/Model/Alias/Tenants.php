<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Alias;

class Tenants extends \Numbers\Tenants\Tenants\Model\Tenants
{
    public $db_link = 'tenant';
    public $db_link_flag;
}
