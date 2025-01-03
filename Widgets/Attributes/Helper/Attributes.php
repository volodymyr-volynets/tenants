<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Attributes\Helper;

use Numbers\Backend\Db\Common\Model\Models;
use Numbers\Tenants\Widgets\Attributes\Model\Attribute\Details;

class Attributes
{
    /**
     * Cached models
     *
     * @var array
     */
    private static $cached_models;

    /**
     * Cached model attributes
     *
     * @var array
     */
    private static $cached_model_attributes;

    /**
     * In model
     *
     * @param int $attribute_id
     * @param string $model_code
     * @return bool
     */
    public static function inModel(int $attribute_id, string $model_code, int $module_id): bool
    {
        if (empty(self::$cached_models)) {
            self::$cached_models = Models::getStatic([
                'where' => [
                    'sm_model_widget_attributes' => 1
                ],
                'pk' => ['sm_model_code'],
                'columns' => ['sm_model_id', 'sm_model_code']
            ]);
        }
        if (empty(self::$cached_model_attributes)) {
            self::$cached_model_attributes = Details::getStatic([
                'where' => [
                    'tm_attrdetail_inactive' => 0
                ],
                'pk' => ['tm_attrdetail_attribute_id', 'tm_attrdetail_module_id', 'tm_attrdetail_model_id'],
                'columns' => ['tm_attrdetail_attribute_id', 'tm_attrdetail_module_id', 'tm_attrdetail_model_id']
            ]);
        }
        $model_id = self::$cached_models[$model_code]['sm_model_id'];
        return !empty(self::$cached_model_attributes[$attribute_id][$module_id][$model_id]);
    }

    /**
     * Handle all attributes
     *
     * @param array $existing_attribues
     * @param int $module_id
     * @param string $model_code
     * @return array
     */
    public static function handleAllAttributes(array $existing_attribues, int $module_id, string $model_code): array
    {
        $attributes = [];
        $counter = 1;
        foreach ($existing_attribues as $k => $v) {
            if (!self::inModel($v['wg_attribute_attribute_id'], $model_code, $module_id)) {
                continue;
            }
            // we need to update module #
            $attributes[$counter] = $v;
            $attributes[$counter]['wg_attribute_module_id'] = $module_id;
            $counter++;
        }
        return $attributes;
    }
}
