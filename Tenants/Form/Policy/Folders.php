<?php

namespace Numbers\Tenants\Tenants\Form\Policy;
class Folders extends \Object\Form\Wrapper\Base {
	public $form_link = 'tm_policy_folders';
	public $module_code = 'TM';
	public $title = 'T/M Policy Folders Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true
		],
		'include_js' => '/numbers/media_submodules/Numbers_Tenants_Tenants_Media_JS_Policy_Folders.js'
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tree_container' => [
			'type' => 'trees',
			'details_rendering_type' => 'name_only',
			'details_new_rows' => 0,
			'details_key' => '\Numbers\Tenants\Tenants\Model\Policy\Folders',
			'details_pk' => ['tm_polfolder_polroot_code', 'tm_polfolder_id'],
			'details_tree_key' => 'tm_polfolder_id',
			'details_tree_parent_key' => 'tm_polfolder_parent_polfolder_id',
			'details_tree_name_only_custom_renderer' => '\Numbers\Tenants\Tenants\Form\Policy\Folders::renderTreeDocumentField',
			'order' => 200
		],
		'tree_container_modal' => [
			'type' => 'modal',
			'default_row_type' => 'grid',
			'label_name' => 'Add New Folder:',
			'order' => 32200,
		],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'tm_polroot_code' => [
				'tm_polroot_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Root', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots::optionsActive', 'refetch_values_on_change' => true, 'placeholder' => \Object\Content\Messages::PLEASE_CHOOSE, 'onchange' => 'this.form.submit();'],
			],
		],
		'tree_container' => [
			self::HIDDEN => [
				'tm_polfolder_id' => ['order' => 1, 'label_name' => 'Folder #', 'domain' => 'folder_id_sequence', 'null' => true, 'method' => 'hidden'],
				'tm_polfolder_polroot_code' => ['order' => 2, 'label_name' => 'Root Code', 'domain' => 'type_code', 'null' => true, 'method' => 'hidden'],
				'tm_polfolder_parent_polfolder_id' => ['order' => 3, 'label_name' => 'Parent Folder', 'domain' => 'folder_id', 'null' => true, 'method' => 'hidden'],
				'tm_polfolder_icon' => ['order' => 4, 'row_order' => 100, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'method' => 'hidden'],
				'tm_polfolder_name' => ['order' => 5, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'method' => 'hidden'],
				'tm_polfolder_inactive' => ['order' => 6, 'label_name' => 'Inactive', 'type' => 'boolean', 'method' => 'hidden'],
				'tm_polfolder_counter' => ['order' => 7, 'label_name' => 'Counter', 'domain' => 'counter', 'default' => 0, 'method' => 'hidden'],
				'tm_polfolder_optimistic_lock' => ['order' => 8, 'label_name' => 'Optimistic Lock', 'type' => 'text', 'default' => null, 'method' => 'hidden'],
			]
		],
		'tree_container_modal' => [
			self::HIDDEN => [
				'tree_container_modal_tm_polfolder_id' => ['order' => 1, 'label_name' => 'Folder #', 'domain' => 'folder_id_sequence', 'null' => true, 'method' => 'hidden'],
				'tree_container_modal_tm_polfolder_polroot_code' => ['order' => 2, 'label_name' => 'Root Code', 'domain' => 'type_code', 'null' => true, 'required' => true, 'method' => 'hidden'],
				'tree_container_modal_tm_polfolder_parent_polfolder_id' => ['order' => 3, 'row_order' => 100, 'label_name' => 'Parent Folder', 'domain' => 'folder_id', 'null' => true, 'method' => 'hidden'],
				'tree_container_modal_tm_polfolder_optimistic_lock' => ['order' => 4, 'label_name' => 'Optimistic Lock', 'type' => 'text', 'default' => null, 'method' => 'hidden'],
			],
			'tree_container_modal_tm_polfolder_name' => [
				'tree_container_modal_tm_polfolder_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'required' => true, 'percent' => 85],
				'tree_container_modal_tm_polfolder_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
			'tree_container_modal_tm_polfolder_icon' => [
				'tree_container_modal_tm_polfolder_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			self::BUTTONS => [
				self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_OTHER_DATA + ['row_order' => 32000],
				self::BUTTON_SUBMIT_OTHER_DELETE => self::BUTTON_SUBMIT_OTHER_DELETE_DATA,
			]
		],
	];
	public $collection = [
		'name' => 'Roots',
		'model' => '\Numbers\Tenants\Tenants\Model\Policy\Roots',
		'pk' => ['tm_polroot_tenant_id', 'tm_polroot_code'],
		'readonly' => true,
		'details' => [
			'\Numbers\Tenants\Tenants\Model\Policy\Folders' => [
				'name' => 'Folders',
				'pk' => ['tm_polfolder_tenant_id', 'tm_polfolder_polroot_code', 'tm_polfolder_id'],
				'type' => '1M',
				'map' => ['tm_polroot_tenant_id' => 'tm_polfolder_tenant_id', 'tm_polroot_code' => 'tm_polfolder_polroot_code'],
				'readonly' => true,
			],
		],
	];

	public function refresh(& $form) {
		if (!empty($form->values['tm_polroot_code']) && \Application::$controller->canCached('Record_New')) {
			$form->options['actions']['new'] = [
				'href' => 'javascript:void(0);',
				'onclick' => 'Numbers.NumbersTenantsTenantsFormPolicyFolders.newFolderUnderRoot(this); return false;',
			];
		} else {
			$form->options['actions']['new'] = false;
		}
	}

	public function validate(& $form) {
		$model = new \Numbers\Tenants\Tenants\Model\Policy\Folders();
		if (!$model->checkUniqueConstraint('tm_polfolder_name', $model->pk, [
			'tm_polfolder_id' => $form->values['tree_container_modal_tm_polfolder_id'] ?? null,
			'tm_polfolder_polroot_code' => $form->values['tree_container_modal_tm_polfolder_polroot_code'],
			'tm_polfolder_parent_polfolder_id' => $form->values['tree_container_modal_tm_polfolder_parent_polfolder_id'] ?? null,
			'tm_polfolder_name' => $form->values['tree_container_modal_tm_polfolder_name'],
		])) {
			$form->error(DANGER, \Object\Content\Messages::DUPLICATE_VALUE, 'tree_container_modal_tm_polfolder_name');
		}
	}

	public function save(& $form) {
		$model = new \Numbers\Tenants\Tenants\Model\Policy\Folders();
		if (!empty($form->process_submit[$form::BUTTON_SUBMIT_OTHER_DELETE])) {
			$result = $model->collection()->merge([
				'tm_polfolder_id' => $form->values['tree_container_modal_tm_polfolder_id'] ?? null,
				'tm_polfolder_optimistic_lock' => $form->values['tree_container_modal_tm_polfolder_optimistic_lock'],
			], [
				'flag_delete_row' => true,
			]);
		} else {
			$result = $model->collection()->merge([
				'tm_polfolder_id' => $form->values['tree_container_modal_tm_polfolder_id'] ?? null,
				'tm_polfolder_polroot_code' => $form->values['tree_container_modal_tm_polfolder_polroot_code'],
				'tm_polfolder_parent_polfolder_id' => $form->values['tree_container_modal_tm_polfolder_parent_polfolder_id'] ?? null,
				'tm_polfolder_name' => $form->values['tree_container_modal_tm_polfolder_name'],
				'tm_polfolder_icon' => $form->values['tree_container_modal_tm_polfolder_icon'],
				'tm_polfolder_inactive' => $form->values['tree_container_modal_tm_polfolder_inactive'],
				'tm_polfolder_optimistic_lock' => $form->values['tree_container_modal_tm_polfolder_optimistic_lock'],
			]);
		}
		if (!$result['success']) {
			$form->error(DANGER, $result['error']);
		}
		return $result['success'];
	}

	public function success(& $form) {
		if (!$form->hasErrors()) {
			$form->refresh();
		}
	}

	public function renderTreeDocumentField(& $form, & $rows, & $data) {
		$result = $data['tm_polfolder_name'] . ' ';
		if (!empty($data['tm_polfolder_inactive'])) {
			$result.= '(' . i18n(null, 'Inactive') . ')' . ' ';
		}
		$result.= '(' . $data['tm_polfolder_counter'] . ')';
		// permissions
		$toolbar = [];
		if (\Application::$controller->canCached('Record_New')) {
			$new_link = "Numbers.NumbersTenantsTenantsFormPolicyFolders.newOrEditSubFolder(this, null, {$data['tm_polfolder_id']}, '', '', 0);";
			$toolbar[] = \HTML::a(['href' => 'javascript:void(0);', 'onclick' => $new_link, 'value' => i18n(null, 'New')]);
		}
		if (\Application::$controller->canCached('Record_Edit')) {
			$temp_parent_id = $data['tm_polfolder_parent_polfolder_id'] ?? 'null';
			$edit_link = "Numbers.NumbersTenantsTenantsFormPolicyFolders.newOrEditSubFolder(this, {$data['tm_polfolder_id']}, {$temp_parent_id}, '{$data['tm_polfolder_name']}', '{$data['tm_polfolder_icon']}', {$data['tm_polfolder_inactive']}, '{$data['tm_polfolder_optimistic_lock']}');";
			$toolbar[] = \HTML::a(['href' => 'javascript:void(0);', 'onclick' => $edit_link, 'value' => i18n(null, 'Edit')]);
		}
		/*
		if (empty($data['tm_polfolder_counter']) && \Application::$controller->canCached('Record_Delete')) {
			$temp_parent_id = $data['tm_polfolder_parent_polfolder_id'] ?? 'null';
			$edit_link = "Numbers.NumbersTenantsTenantsFormPolicyFolders.newOrEditSubFolder(this, {$data['tm_polfolder_id']}, {$temp_parent_id}, '{$data['tm_polfolder_name']}', '{$data['tm_polfolder_icon']}', {$data['tm_polfolder_inactive']}, '{$data['tm_polfolder_optimistic_lock']}');";
			$edit_link.= '';
			$toolbar[] = \HTML::a(['href' => 'javascript:void(0);', 'onclick' => $edit_link, 'value' => i18n(null, 'Delete')]);
		}
		*/
		return [
			'name' => $result,
			'icon_class' => $data['tm_polfolder_icon'] ?? 'far fa-folder',
			'toolbar' => $toolbar
		];
	}
}