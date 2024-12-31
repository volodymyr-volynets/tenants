<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Helper\ABAC;

use Object\Query\Builder;

class Get extends Common
{
    /**
     * Process
     *
     * @param string $model_code
     * @param Builder $query
     * @param array $options
     * @return boolean
     */
    public function process(string $model_code, Builder & $query, string $alias, array $options = []): bool
    {
        $this->options = $options;
        if ($this->hasPolicies($model_code, $query, $alias)) {
            return $this->mergeQueries($query, $alias);
        }
        return false;
    }
}
