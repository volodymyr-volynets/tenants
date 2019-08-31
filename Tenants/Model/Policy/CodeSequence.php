<?php

namespace Numbers\Tenants\Tenants\Model\Policy;
class CodeSequence extends \Object\Sequence {
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