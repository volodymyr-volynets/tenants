<?php

namespace Numbers\Tenants\Tenants\Controller\Miscellaneous\Structure;
class Types extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\Miscellaneous\Structure\List2\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Tenants\Tenants\Form\Miscellaneous\Structure\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}