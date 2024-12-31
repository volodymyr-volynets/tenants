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

class Integration
{
    /**
     * Find mapping
     *
     * @param string $class
     * @param string $integtype_code
     * @param string $external_id
     * @param string $internal_column
     * @return type
     */
    public static function findMapping(string $class, string $integtype_code, string $external_id, string $internal_column)
    {
        $model = \Factory::model($class);
        $data = $model->get([
            'where' => [
                $model->column_prefix . 'integtype_code' => $integtype_code,
                $model->column_prefix . 'code' => $external_id,
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        return $data[$model->column_prefix . $internal_column] ?? null;
    }

    /**
     * Update mapping
     *
     * @param string $class
     * @param string $integtype_code
     * @param string $external_id
     * @param string $external_name
     * @param string $internal_column
     * @param int $internal_id
     * @return array
     */
    public static function updateMapping(string $class, string $integtype_code, string $external_id, string $external_name, string $internal_column, int $internal_id): array
    {
        $model = \Factory::model($class);
        // see if integration already exists
        $existing = $model->get([
            'where' => [
                $model->column_prefix . 'integtype_code' => $integtype_code,
                $model->column_prefix . $internal_column => $internal_id,
                $model->column_prefix . 'code' => $external_id,
            ],
            'pk' => null,
            'single_row' => true
        ]);
        if (!empty($existing)) {
            return ['success' => true, 'error' => []];
        }
        // save and return
        return $model->collection()->merge([
            $model->column_prefix . 'integtype_code' => $integtype_code,
            $model->column_prefix . 'code' => $external_id,
            $model->column_prefix . 'name' => $external_name,
            $model->column_prefix . $internal_column => $internal_id,
        ]);
    }
}
