<?php

namespace Numbers\Tenants\Tenants\Model;
class ShortUrlsAR extends \Object\ActiveRecord {



    /**
     * @var string
     */
    public string $object_table_class = \Numbers\Tenants\Tenants\Model\ShortUrls::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['tm_shorturl_tenant_id','tm_shorturl_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $tm_shorturl_tenant_id = NULL {
                        get => $this->tm_shorturl_tenant_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_tenant_id', $value);
                            $this->tm_shorturl_tenant_id = $value;
                        }
                    }

    /**
     * Url #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $tm_shorturl_id = null {
                        get => $this->tm_shorturl_id;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_id', $value);
                            $this->tm_shorturl_id = $value;
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
    public string|null $tm_shorturl_name = null {
                        get => $this->tm_shorturl_name;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_name', $value);
                            $this->tm_shorturl_name = $value;
                        }
                    }

    /**
     * Full Url
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $tm_shorturl_full_url = null {
                        get => $this->tm_shorturl_full_url;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_full_url', $value);
                            $this->tm_shorturl_full_url = $value;
                        }
                    }

    /**
     * Short Url
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $tm_shorturl_short_url = null {
                        get => $this->tm_shorturl_short_url;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_short_url', $value);
                            $this->tm_shorturl_short_url = $value;
                        }
                    }

    /**
     * Short Key
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $tm_shorturl_short_key = null {
                        get => $this->tm_shorturl_short_key;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_short_key', $value);
                            $this->tm_shorturl_short_key = $value;
                        }
                    }

    /**
     * Expires
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $tm_shorturl_expires = null {
                        get => $this->tm_shorturl_expires;
                        set {
                            $this->setFullPkAndFilledColumn('tm_shorturl_expires', $value);
                            $this->tm_shorturl_expires = $value;
                        }
                    }
}
