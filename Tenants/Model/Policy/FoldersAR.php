<?php

namespace Numbers\Tenants\Tenants\Model\Policy;
class FoldersAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Policy\Folders::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_polfolder_tenant_id','tm_polfolder_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_polfolder_tenant_id = NULL {
                        get => $this->tm_polfolder_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_tenant_id', $value);
                            $this->tm_polfolder_tenant_id = $value;
                        }
                    }

    /**
     * Folder #
     *
     *
     *
     * {domain{folder_id_sequence}}
     *
     * @var int|null Domain: folder_id_sequence Type: serial
     */
    public int|null $tm_polfolder_id = null {
                        get => $this->tm_polfolder_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_id', $value);
                            $this->tm_polfolder_id = $value;
                        }
                    }

    /**
     * Root Code
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $tm_polfolder_polroot_code = null {
                        get => $this->tm_polfolder_polroot_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_polroot_code', $value);
                            $this->tm_polfolder_polroot_code = $value;
                        }
                    }

    /**
     * Parent Folder #
     *
     *
     *
     * {domain{folder_id}}
     *
     * @var int|null Domain: folder_id Type: integer
     */
    public int|null $tm_polfolder_parent_polfolder_id = NULL {
                        get => $this->tm_polfolder_parent_polfolder_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_parent_polfolder_id', $value);
                            $this->tm_polfolder_parent_polfolder_id = $value;
                        }
                    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $tm_polfolder_name = null {
                        get => $this->tm_polfolder_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_name', $value);
                            $this->tm_polfolder_name = $value;
                        }
                    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $tm_polfolder_icon = null {
                        get => $this->tm_polfolder_icon;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_icon', $value);
                            $this->tm_polfolder_icon = $value;
                        }
                    }

    /**
     * Counter
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $tm_polfolder_counter = 0 {
                        get => $this->tm_polfolder_counter;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_counter', $value);
                            $this->tm_polfolder_counter = $value;
                        }
                    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $tm_polfolder_inactive = 0 {
                        get => $this->tm_polfolder_inactive;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_inactive', $value);
                            $this->tm_polfolder_inactive = $value;
                        }
                    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $tm_polfolder_optimistic_lock = 'now()' {
                        get => $this->tm_polfolder_optimistic_lock;
                        set {
                            $this->setFullPkAndFilledColumn('tm_polfolder_optimistic_lock', $value);
                            $this->tm_polfolder_optimistic_lock = $value;
                        }
                    }
}
