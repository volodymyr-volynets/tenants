<?php

namespace Numbers\Tenants\Tenants\Controller;
class ShortUrlRun extends \Object\Controller {
	public function actionIndex() {
		$mvc = \Application::get('mvc');
		$token = $mvc['post_action'][0];
		$id = \Numbers\Tenants\Tenants\Helper\ShortUrls::tokenValidate($mvc['post_action'][0]);
		if ($id === false) {
			Throw new \Exception(\Object\Content\Messages::TOKEN_EXPIRED);
		}
		$url = \Numbers\Tenants\Tenants\Helper\ShortUrls::fetchURL($id, true);
		if (empty($url)) {
			Throw new \Exception(\Object\Content\Messages::TOKEN_EXPIRED);
		}
	}
}