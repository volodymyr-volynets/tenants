Numbers.NumbersTenantsTenantsFormPolicyFolders = Numbers.extend(Numbers.Form, {

	/**
	 * New folder under root
	 */
	newFolderUnderRoot: function (element) {
		this.newOrEditSubFolder(element, '', '', '', '', 0, '', false);
	},

	/**
	 * New or edit subfolder
	 */
	newOrEditSubFolder: function (element, id, parent_id, name, icon, inactive, optimistic_lock, can_delete) {
		$('input[name="tree_container_modal_tm_polfolder_polroot_code"]').val($('select[name="tm_polroot_code"]').val());
		$('input[name="tree_container_modal_tm_polfolder_parent_polfolder_id"]').val(parent_id);
		$('input[name="tree_container_modal_tm_polfolder_id"]').val(id);
		$('input[name="tree_container_modal_tm_polfolder_name"]').val(name);
		$('select[name="tree_container_modal_tm_polfolder_icon"]').val(icon);
		if (icon) {
			$('select[name="tree_container_modal_tm_polfolder_icon"]').change();
		}
		$('input[name="tree_container_modal_tm_polfolder_inactive"]').val(inactive);
		$('input[name="tree_container_modal_tm_polfolder_optimistic_lock"]').val(optimistic_lock);
		if (!can_delete) {
			$('#form_tm_policy_folders_element___submit_other_delete').hide();
		} else {
			$('#form_tm_policy_folders_element___submit_other_delete').show();
		}
		Numbers.Modal.show('form_tm_policy_folders_modal_tree_container_modal_dialog');
	}
});