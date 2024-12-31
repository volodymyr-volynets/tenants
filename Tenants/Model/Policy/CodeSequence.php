<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Policy;

use Object\Sequence;

class CodeSequence extends Sequence
{
    public $db_link;
    public $db_link_flag;
    public $schema;
    public $module_code = 'TM';
    public $title = 'T/M Policy Code Sequence';
    public $name = 'tm_policies_tm_policy_code_seq';
    public $type = 'tenant_advanced';
    public $prefix = 'POL';
    public $length = 7;
    public $suffix;
}
