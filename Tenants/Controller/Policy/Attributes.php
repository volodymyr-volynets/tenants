<?php

namespace Numbers\Tenants\Tenants\Controller\Policy;
class Attributes extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\List2\Policy\Attributes([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Tenants\Tenants\Form\Policy\Attributes([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}