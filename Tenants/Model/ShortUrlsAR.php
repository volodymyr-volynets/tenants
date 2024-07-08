<?php

namespace Numbers\Tenants\Tenants\Model;
class ShortUrlsAR extends \Object\ActiveRecord {
	/**
	 * @var string
	 */
	public string $object_table_class = \Numbers\Tenants\Tenants\Model\ShortUrls::class;

	/**
	 * Constructing object
	 *
	 * @param array $options
	 *		skip_db_object
	 *		skip_table_object
	 */
	public function __construct($options = []) {
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
	public ?int $tm_shorturl_tenant_id = NULL;

	/**
	 * Url #
	 *
	 *
	 *
	 * {domain{big_id_sequence}}
	 *
	 * @var int Domain: big_id_sequence Type: bigserial
	 */
	public ?int $tm_shorturl_id = null;

	/**
	 * Name
	 *
	 *
	 *
	 * {domain{name}}
	 *
	 * @var string Domain: name Type: varchar
	 */
	public ?string $tm_shorturl_name = null;

	/**
	 * Full Url
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $tm_shorturl_full_url = null;

	/**
	 * Short Url
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $tm_shorturl_short_url = null;

	/**
	 * Short Key
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: text
	 */
	public ?string $tm_shorturl_short_key = null;

	/**
	 * Expires
	 *
	 *
	 *
	 *
	 *
	 * @var string Type: datetime
	 */
	public ?string $tm_shorturl_expires = null;
}