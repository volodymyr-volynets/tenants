<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Filters\Model;

use Object\ActiveRecord;

class FormsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Forms::class;

    /**
     * Constructing object
     *
     * @param array $options
     *		skip_db_object
     *		skip_table_object
     */
    public function __construct($options = [])
    {
        if (empty($options['skip_table_object'])) {
            $this->object_table_object = new $this->object_table_class($options);
        }
    }
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int Domain: tenant_id Type: integer
     */
    public ?int $tm_filterform_tenant_id = null;

    /**
     * Filter #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int Domain: big_id_sequence Type: bigserial
     */
    public ?int $tm_filterform_id = null;

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string Domain: timestamp_now Type: timestamp
     */
    public ?string $tm_filterform_timestamp = 'now()';

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string Domain: name Type: varchar
     */
    public ?string $tm_filterform_name = null;

    /**
     * Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string Domain: code Type: varchar
     */
    public ?string $tm_filterform_resource_code = null;

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int Domain: user_id Type: bigint
     */
    public ?int $tm_filterform_user_id = null;

    /**
     * Parameters
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public ?mixed $tm_filterform_params = null;

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int Type: boolean
     */
    public ?int $tm_filterform_inactive = 0;

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string Domain: optimistic_lock Type: timestamp
     */
    public ?string $tm_filterform_optimistic_lock = 'now()';
}
