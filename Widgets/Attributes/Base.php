<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Attributes;

class Base
{
    /**
     * Addresses
     */
    public const ATTRIBUTES = '__widget_attributes';
    public const ATTRIBUTES_DATA = ['order' => PHP_INT_MAX - 1900, 'label_name' => 'Attributes', 'widget' => 'attributes'];
}
