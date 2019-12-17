<?php

namespace Numbers\Tenants\Tenants\Helper;
class ShortUrls {

	/**
	 * Create token
	 *
	 * @param int $id
	 * @return string
	 */
	public static function tokenCreate(int $id) : string {
		$result = base_convert($id . '', 10, 30);
		$md5 = md5($id . $result);
		return $result . $md5[0] . $md5[1];
	}

	/**
	 * Validate token
	 *
	 * @param string $token
	 * @return int|false
	 */
	public static function tokenValidate(string $token) {
		$hash = substr($token, -2, 2);
		$base = substr($token, 0, strlen($token) - 2);
		$id = base_convert($base, 30, 10);
		$md5 = md5($id . $base);
		if (!empty($id) && $hash == substr($md5, 0, 2)) {
			return (int) $id;
		} else {
			return false;
		}
	}

	/**
	 * Fetch URL
	 *
	 * @param int $id
	 * @param bool $redirect
	 * @return string|false
	 */
	public static function fetchURL(int $id, bool $redirect = true) {
		$data = \Numbers\Tenants\Tenants\Model\ShortUrls::getStatic([
			'where' => [
				'tm_shorturl_id' => $id,
				'tm_shorturl_expires;>=;' => \Format::now('datetime')
			],
			'pk' => null,
			'single_row' => true
		]);
		if (empty($data)) {
			return false;
		}
		if ($redirect) {
			\Request::redirect($data['tm_shorturl_full_url']);
		}
		return $data['tm_shorturl_full_url'];
	}
}