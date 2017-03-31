<?php

namespace Numbers\Tenants\Tenants\Controller\Activation;
class Features extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new numbers_tenants_tenants_form_activation_list_features([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new numbers_tenants_tenants_form_activation_features([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}