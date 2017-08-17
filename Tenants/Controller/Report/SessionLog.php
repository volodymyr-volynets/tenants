<?php

namespace Numbers\Tenants\Tenants\Controller\Report;
class SessionLog extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\Report\SessionLog([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}