<?php

namespace Numbers\Tenants\Widgets\Filters\Helper;
class Filters {

	/**
	 * Filter loaded
	 *
	 * @var boolean
	 */
	public static $filter_loaded = false;

	/**
	 * Construct form
	 *
	 * @param object $form
	 */
	public function addFilterToForm(& $form, & $options) {
		if (empty($form->data['tabs']) || self::$filter_loaded) {
			return;
		}
		// we do not add it to widgets
		if (($options['tabs_row_id'] ?? '') === \Object\Form\Wrapper\Collection::WIDGETS_ROW) {
			return;
		}
		// tabs
		$form->container('__filter_new', ['default_row_type' => 'grid', 'order' => 32000]);
		$form->container('__filter_existing', ['default_row_type' => 'grid', 'order' => 32000, 'custom_renderer' => '\Numbers\Tenants\Widgets\Filters\Helper\Filters::renderFilterList']);
		$form->row('tabs', '__filters', ['order' => 1100, 'label_name' => 'Saved Filters']);
		$form->element('tabs', '__filters', '__filter_new', ['container' => '__filter_new', 'order' => 100]);
		$form->element('tabs', '__filters', '__filter_existing', ['container' => '__filter_existing', 'order' => 200]);
		// new filter form
		$form->element('__filter_new', '__filter_new', '__filter_name', ['order' => 1, 'label_name' => 'New Filter Name', 'domain' => 'name', 'null' => true, 'required' => 'c', 'percent' => 50, 'empty_value' => true]);
		$form->element('__filter_new', '__filter_new', $form::BUTTON_SUBMIT_OTHER, ['order' => 2, 'label_name' => ' ', 'value' => 'Save', 'method' => 'button2', 'icon' => 'fas fa-mouse-pointer', 'accesskey' => 's', 'process_submit' => 'other']);
		// methods
		$form->wrapper_methods['refresh']['filters'] = [& $this, 'refresh'];
		$form->wrapper_methods['filterChanged']['filters'] = [& $this, 'filterChanged'];
		// delete filter
		$__form_filter_id_delete = (int) \Application::get('flag.global.__form_filter_id_delete');
		if (!empty($__form_filter_id_delete)) {
			$result = \Numbers\Tenants\Widgets\Filters\Model\Forms::collectionStatic()->merge([
				'tm_filterform_id' => $__form_filter_id_delete,
				'tm_filterform_resource_code' => \Application::get('mvc.controller'),
				'tm_filterform_user_id' => \User::id(),
			], [
				'flag_delete_row' => true,
				'skip_optimistic_lock' => true
			]);
			$form->error(SUCCESS, \Object\Content\Messages::FILTER_DELETED);
		}
		// preload filter
		$__form_filter_id = (int) \Application::get('flag.global.__form_filter_id');
		if (!empty($__form_filter_id)) {
			self::$filter_loaded = true;
			$filter_params = \Numbers\Tenants\Widgets\Filters\Model\Forms::getStatic([
				'where' => [
					'tm_filterform_id' => $__form_filter_id,
					'tm_filterform_resource_code' => \Application::get('mvc.controller'),
					'tm_filterform_user_id' => \User::id(),
				],
				'pk' => null,
				'columns' => ['tm_filterform_params'],
				'single_row' => true,
			]);
			if (!empty($filter_params)) {
				$form->options['input'] = json_decode($filter_params['tm_filterform_params'], true);
			}
		}
	}

	/**
	 * Filter changed
	 *
	 * @param object $form
	 */
	public function filterChanged(& $form) {
		$result = \Numbers\Tenants\Widgets\Filters\Model\Forms::collectionStatic()->merge([
			'tm_filterform_name' => null,
			'tm_filterform_resource_code' => \Application::get('mvc.controller'),
			'tm_filterform_user_id' => \User::id(),
			'tm_filterform_params' => $form->getValuesForDataSourceFilter(null, ['no_unset' => true]),
			'tm_filterform_inactive' => 0
		]);
		return $result['new_serials']['tm_filterform_id'];
	}

	/**
	 * Refresh
	 *
	 * @param object $form
	 */
	public function refresh(& $form) {
		if (!empty($form->values[$form::BUTTON_SUBMIT_OTHER])) {
			if (empty($form->values['__filter_name'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, '__filter_name');
			} else {
				\Numbers\Tenants\Widgets\Filters\Model\Forms::collectionStatic()->merge([
					'tm_filterform_name' => $form->values['__filter_name'],
					'tm_filterform_resource_code' => \Application::get('mvc.controller'),
					'tm_filterform_user_id' => \User::id(),
					'tm_filterform_params' => $form->getValuesForDataSourceFilter(null, ['no_unset' => true]),
					'tm_filterform_inactive' => 0
				]);
			}
		}
	}

	/**
	 * Render filter list
	 *
	 * @param object $form
	 * @return string
	 */
	public function renderFilterList(& $form) {
		$filters = \Numbers\Tenants\Widgets\Filters\DataSource\Filters::getStatic([
			'where' => [
				'resource_code' => \Application::get('mvc.controller'),
				'user_id' => \User::id(),
				'only_visible' => 1
			],
			'pk' => ['id'],
		]);
		if (empty($filters)) return;
		$result = '<table class="table table-striped">';
			$result.= '<tr>';
				$result.= '<th width="1%">&nbsp;</th>';
				$result.= '<th nowrap width="94%">' . i18n(null, 'Name') . '</th>';
				$result.= '<th nowrap width="5%">' . i18n(null, 'Datetime') . '</th>';
				$result.= '<th nowrap width="5%">' . i18n(null, 'Action') . '</th>';
			$result.= '</tr>';
			$counter = 1;
			foreach ($filters as $k => $v) {
				$result.= '<tr>';
					$result.= '<td nowrap>' . \Format::id($counter) . '.</td>';
					$result.= '<td nowrap>' . \HTML::a(['href' => \Request::buildURL(\Application::get('mvc.full'), ['__form_filter_id' => $k]), 'value' => $v['name']]) . '</td>';
					$result.= '<td nowrap>' . \Format::datetime($v['timestamp']) . '</td>';
					$result.= '<td nowrap>' . \HTML::a(['href' => \Request::buildURL(\Application::get('mvc.full'), ['__form_filter_id_delete' => $k]), 'value' => i18n(null, 'Delete')]) . '</td>';
				$result.= '</tr>';
				$counter++;
			}
		$result.= '</table>';
		return $result;
	}
}
