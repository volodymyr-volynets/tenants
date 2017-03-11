<?php

class numbers_tenants_tenants_controller_activation_features extends object_controller_permission {
	public function action_index() {
		$form = new numbers_tenants_tenants_form_activation_list_features([
			'input' => request::input()
		]);
		echo $form->render();
	}
	public function action_edit() {
		$form = new numbers_tenants_tenants_form_activation_features([
			'input' => request::input()
		]);
		echo $form->render();
	}
}