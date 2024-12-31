<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Data\Activation;

use Numbers\Backend\System\Modules\Abstract2\Reset;
use Numbers\Tenants\Tenants\Model\Policy\Folders;
use Numbers\Tenants\Tenants\Model\Policy\Roots;

class PoliciesReset extends Reset
{
    public function execute()
    {
        $this->clearTable(new Folders());
        $this->clearTable(new Roots());
    }
}
