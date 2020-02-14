<?php

namespace Numbers\Tenants\Tenants\Controller\Integration;
class Types extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\List2\Integration\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Tenants\Tenants\Form\Integration\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Tenants\Tenants\Form\Integration\Types',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}