<?php

namespace Numbers\Tenants\Tenants\Controller;
class Firewalls extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\List2\Firewalls([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Tenants\Tenants\Form\Firewalls([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Tenants\Tenants\Form\Firewalls',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}