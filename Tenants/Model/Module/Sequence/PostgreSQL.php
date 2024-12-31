<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Model\Module\Sequence;

use Object\Function2;

class PostgreSQL extends Function2
{
    public $db_link;
    public $db_link_flag;
    public $schema;
    public $module_code = 'TM';
    public $title = 'Get next sequence counter by code';
    public $name = 'tm_next_sequence_value';
    public $backend = 'PostgreSQL';
    public $header = 'tm_next_sequence_value(group_code character varying, type_code character varying, tenant_id integer, module_id integer)';
    public $sql_version = '1.0.2';
    public $definition = 'CREATE OR REPLACE FUNCTION public.tm_next_sequence_value(group_code character varying, type_code character varying, tenant_id integer, module_id integer)
 RETURNS bigint
 LANGUAGE plpgsql
 STRICT
AS $function$
DECLARE
	result bigint;
BEGIN
	SELECT tm_mdlseq_counter INTO result FROM public.tm_module_sequences WHERE tm_mdlseq_group_code = group_code AND tm_mdlseq_type_code = type_code AND tm_mdlseq_tenant_id = tenant_id AND tm_mdlseq_module_id = module_id FOR UPDATE;
	IF FOUND THEN
		result:= result + 1;
		UPDATE public.tm_module_sequences SET tm_mdlseq_counter = result WHERE tm_mdlseq_group_code = group_code AND tm_mdlseq_type_code = type_code AND tm_mdlseq_tenant_id = tenant_id AND tm_mdlseq_module_id = module_id;
	END IF;
	RETURN result;
END;
$function$';
}
