<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Helper;

class URL
{
    /**
     * Generate URL
     *
     * @param string $id
     * @param string $name
     * @param bool $a
     * @return string
     */
    public static function generateURL(string $id, string $name, bool $a = true): string
    {
        $result = '/Numbers/Tenants/Widgets/Batches/Controller/Entries/_Edit?tm_batchentry_code=' . $id;
        if ($a) {
            $result = \HTML::a(['href' => $result, 'value' => $name]);
        }
        return $result;
    }
}
