<?php

namespace Numbers\Tenants\Tenants\Controller\Activation;
class Linked extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\Activation\List2\Linked([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Tenants\Tenants\Form\Activation\Linked([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}