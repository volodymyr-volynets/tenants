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

use Numbers\Tenants\Widgets\Batches\Model\Types;

class Sequences
{
    public static function nextval(string $tm_batchtype_code): string
    {
        $current = Types::getStatic([
            'where' => [
                'tm_batchtype_tenant_id' => \Tenant::id(),
                'tm_batchtype_code' => $tm_batchtype_code,
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        if (empty($current['tm_batchtype_counter'])) {
            $current['tm_batchtype_counter'] = 0;
        }
        $next = $current['tm_batchtype_counter'] + 1;
        Types::collectionStatic()->merge([
            'tm_batchtype_tenant_id' => \Tenant::id(),
            'tm_batchtype_code' => $tm_batchtype_code,
            'tm_batchtype_counter' => $next,
        ], [
            'skip_optimistic_lock' => true,
        ]);
        return $current['tm_batchtype_prefix'] . str_pad((string) $next, $current['tm_batchtype_length'], '0', STR_PAD_LEFT) . $current['tm_batchtype_suffix'];
    }
}
