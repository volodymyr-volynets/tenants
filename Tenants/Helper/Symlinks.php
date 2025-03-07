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

class Symlinks
{
    /**
     * Create symlink
     *
     * @param string $module_code
     * @param int $module_id
     * @param string $type
     *		B - Batch
     *		E - Entry
     * @param mixed $transaction_id
     * @return string
     */
    public static function create(string $module_code, string $module_id, string $type, $transaction_id)
    {
        return $module_code . '::' . $module_id . '::' . $type . '::' . $transaction_id;
    }
}
