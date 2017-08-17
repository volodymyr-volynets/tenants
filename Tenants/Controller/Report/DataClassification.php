<?php

namespace Numbers\Tenants\Tenants\Controller\Report;
class DataClassification extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Tenants\Tenants\Form\Report\DataClassification([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}