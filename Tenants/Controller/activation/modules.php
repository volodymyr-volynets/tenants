<?php

namespace Numbers\Tenants\Tenants\Controller\Activation;
class Modules extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\Activation\List2\Modules([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new numbers_tenants_tenants_form_activation_modules([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}