<?php

namespace Numbers\Tenants\Tenants\Model\Module;
class SequencesAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\Module\Sequences::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_mdlseq_tenant_id','tm_mdlseq_module_id','tm_mdlseq_group_code','tm_mdlseq_type_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_mdlseq_tenant_id = NULL {
                        get => $this->tm_mdlseq_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_tenant_id', $value);
                            $this->tm_mdlseq_tenant_id = $value;
                        }
                    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $tm_mdlseq_module_id = NULL {
                        get => $this->tm_mdlseq_module_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_module_id', $value);
                            $this->tm_mdlseq_module_id = $value;
                        }
                    }

    /**
     * Group
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_mdlseq_group_code = 'DEFAULT' {
                        get => $this->tm_mdlseq_group_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_group_code', $value);
                            $this->tm_mdlseq_group_code = $value;
                        }
                    }

    /**
     * Type
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $tm_mdlseq_type_code = null {
                        get => $this->tm_mdlseq_type_code;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_type_code', $value);
                            $this->tm_mdlseq_type_code = $value;
                        }
                    }

    /**
     * Prefix
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $tm_mdlseq_prefix = null {
                        get => $this->tm_mdlseq_prefix;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_prefix', $value);
                            $this->tm_mdlseq_prefix = $value;
                        }
                    }

    /**
     * Length
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $tm_mdlseq_length = 0 {
                        get => $this->tm_mdlseq_length;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_length', $value);
                            $this->tm_mdlseq_length = $value;
                        }
                    }

    /**
     * Suffix
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $tm_mdlseq_suffix = null {
                        get => $this->tm_mdlseq_suffix;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_suffix', $value);
                            $this->tm_mdlseq_suffix = $value;
                        }
                    }

    /**
     * Counter
     *
     *
     *
     * {domain{bigcounter}}
     *
     * @var int|null Domain: bigcounter Type: bigint
     */
    public int|null $tm_mdlseq_counter = 0 {
                        get => $this->tm_mdlseq_counter;
                        set {
                            $this->setFullPkAndFilledColumn('tm_mdlseq_counter', $value);
                            $this->tm_mdlseq_counter = $value;
                        }
                    }
}
