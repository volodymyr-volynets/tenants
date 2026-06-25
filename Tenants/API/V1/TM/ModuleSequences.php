<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\API\V1\TM;

use Helper\Constant\HTTPConstants;
use Object\Controller\API;
use Numbers\Tenants\Tenants\Helper\Sequence;

class ModuleSequences extends API
{
    public $group = ['TM', 'Operations', 'Tenant Management'];
    public $name = 'T/M Module Sequences (API V1)';
    public $version = 'V1';
    public $base_url = '/API/V1/TM/ModuleSequences';
    public $tenant = true;
    public $module = false;
    public $acl = [
        'public' => false,
        'authorized' => true,
        'permission' => false,
    ];

    public $loc = [];

    /**
     * Routes
     */
    public function routes()
    {
        \Route::api($this->name, $this->base_url, self::class, $this->route_options)
            ->acl('Authorized');
    }

    /**
     * Create Sequence API
     */
    public $postCreateSequence_name = 'Create Sequence';
    public $postCreateSequence_description = 'Use this API to create sequence.';
    public $postCreateSequence_columns = [
        'tm_mdlseq_tenant_id' => ['required' => true, 'name' => 'Tenant #', 'domain' => 'tenant_id'],
        'tm_mdlseq_module_id' => ['sometimes' => false, 'name' => 'Module #', 'domain' => 'module_id', 'null' => true],
        'tm_mdlseq_module_code' => ['sometimes' => false, 'name' => 'Module Code', 'domain' => 'module_code', 'null' => true],
        'tm_mdlseq_group_code' => ['required' => true, 'name' => 'Group', 'domain' => 'code', 'default' => 'DEFAULT'],
        'tm_mdlseq_type_code' => ['required' => true, 'name' => 'Type', 'domain' => 'code'],
        'extended' => ['name' => 'Extended', 'type' => 'boolean', 'default' => 1],
        'bearer_token' => ['required' => true, 'domain' => 'token', 'name' => 'Bearer Token', 'loc' => 'NF.Form.BearerToken', 'from_application' => 'flag.global.__bearer_token'],
    ];
    public $postCreateSequence_result_danger = \Validator::RESULT_DANGER;
    public $postCreateSequence_result_success = RESULT_SUCCESS;
    public function postCreateSequence()
    {
        $result = Sequence::nextval(
            $this->values['tm_mdlseq_group_code'],
            $this->values['tm_mdlseq_type_code'],
            $this->values['tm_mdlseq_module_id'] ?? $this->values['tm_mdlseq_module_code'],
            $this->values['tm_mdlseq_tenant_id'],
            !empty($this->values['extended'])
        );
        return $this->finish(HTTPConstants::Status200OK, [
            'success' => true,
            'error' => [],
            'counter' => $result,
        ]);
    }
}
