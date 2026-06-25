<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Filters\Helper;

use Numbers\Tenants\Widgets\Filters\Model\Forms;
use Object\Content\Messages;
use Object\Form\Wrapper\Collection;
use Numbers\Tenants\Widgets\Filters\DataSource\Filters;
use Numbers\Tenants\Widgets\Batches\Helper\Save as BatchesHelperSave;
use Numbers\Backend\Db\Common\Model\Models as DbCommonModels;
use Numbers\Tenants\Widgets\Batches\Helper\URL;
use Numbers\Tenants\Widgets\Batches\Model\Entries;

class BatchesAndLists
{
    /**
     * Maximum number of records per list
     */
    public const LIST_MAX_LENGTH = 250;

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
    public function addBatchesAndListsToForm(& $form, & $options)
    {
        if (empty($form->data['tabs']) || self::$filter_loaded) {
            return;
        }
        // we do not add it to widgets
        if (($options['tabs_row_id'] ?? '') === Collection::WIDGETS_ROW) {
            return;
        }
        if (empty($form->form_parent->query_primary_model)) {
            return;
        }
        $query_primary_model = new $form->form_parent->query_primary_model();
        if (empty($query_primary_model->batches)) {
            return;
        }
        // tabs
        $form->container('__batches_and_lists_new', ['default_row_type' => 'grid', 'order' => 33000]);
        $form->container('__batches_and_lists_existing', ['default_row_type' => 'grid', 'order' => 33000, 'custom_renderer' => '\Numbers\Tenants\Widgets\Filters\Helper\BatchesAndLists::renderFilterList']);
        $form->row('tabs', '__batches_and_lists', ['order' => 1200, 'label_name' => 'Saved Batches & Lists']);
        $form->element('tabs', '__batches_and_lists', '__batches_and_lists_new', ['container' => '__batches_and_lists_new', 'order' => 100]);
        $form->element('tabs', '__batches_and_lists', '__batches_and_lists_existing', ['container' => '__batches_and_lists_existing', 'order' => 200]);
        // new filter form
        $form->element('__batches_and_lists_new', '__batches_and_lists_new', '__batches_and_lists_name', ['order' => 1, 'label_name' => 'New Batch/List Name', 'domain' => 'name', 'null' => true, 'required' => 'c', 'percent' => 50]);
        $form->element('__batches_and_lists_new', '__batches_and_lists_new', $form::BUTTON_SUBMIT_BATCHES_AND_LISTS_OTHER, ['order' => 2, 'label_name' => ' ', 'value' => 'Save', 'method' => 'button2', 'icon' => 'fa-solid fa-mouse-pointer', 'process_submit' => true]);
        // methods
        $form->wrapper_methods['refresh']['batches_and_lists'] = [& $this, 'refresh'];
    }

    /**
     * Refresh
     *
     * @param object $form
     */
    public function refresh(& $form)
    {
        if (!empty($form->process_submit[$form::BUTTON_SUBMIT_BATCHES_AND_LISTS_OTHER])) {
            $batches_and_lists_name = $form->values['__batches_and_lists_name'];
            if (empty($batches_and_lists_name)) {
                $batches_and_lists_name = $form->title . ' (' . date('Y-m-d H:i:s') . ')';
            }
            $form->errorResetAll();
            $query_primary_model = new $form->form_parent->query_primary_model();
            $query = $query_primary_model->queryBuilder([
                'initiator' => 'list',
                'skip_global_scope' => true,
            ])->select();
            $have_map = array_keys($query_primary_model->batches['map']);
            $have_module = null;
            if (isset($query_primary_model->batches['map'][$query_primary_model->column_prefix . 'module_id'])) {
                $have_module = $query_primary_model->column_prefix . 'module_id';
            }
            $have_id = null;
            $have_code = null;
            if ($query_primary_model->batches['edit']['batch_value'] == 'tm_batchrecord_field_value_id') {
                $have_id = $query_primary_model->batches['where']['tm_batchrecord_field_code'];
            } else {
                $have_code = $query_primary_model->batches['where']['tm_batchrecord_field_code'];
            }
            $query->columns($have_map);
            $have_name = null;
            if (isset($query_primary_model->batches['edit']['batch_record_name'])) {
                $have_name = $query_primary_model->batches['edit']['batch_record_name'];
                $query->columns($query_primary_model->batches['edit']['batch_record_name']);
            } elseif (isset($query_primary_model->columns[$query_primary_model->column_prefix . 'name'])) {
                $have_name = $query_primary_model->column_prefix . 'name';
                $query->columns($query_primary_model->column_prefix . 'name');
            }
            $filter_result = $form->processReportQueryFilter($query);
            if (!$filter_result['has_filter']) {
                $form->error(DANGER, loc('NF.Message.AFilterIsRequiredOnAnyField', 'A filter is required on any field!'), '__batches_and_lists_name');
                return;
            }
            $rows = $query->query(null)['rows'];
            if (count($rows) > self::LIST_MAX_LENGTH) {
                $form->error(DANGER, loc('NF.Error.MaximumNumberPerList', 'Maximum {number} per list!', ['number' => self::LIST_MAX_LENGTH]), '__batches_and_lists_name');
                return;
            }
            // create batches
            $raw_batch_records = [];
            foreach ($rows as $k => $v) {
                $raw_batch_records[] = [
                    'tm_batchrecord_sm_model_id' => DbCommonModels::loadIDByCodeStatic($query_primary_model->batches['where']['tm_batchrecord_sm_model_code'], null, null, ['first' => true]),
                    'tm_batchrecord_sm_model_code' => $query_primary_model->batches['where']['tm_batchrecord_sm_model_code'],
                    'tm_batchrecord_no_data_model_role_code' => 'primary',
                    'tm_batchrecord_field_code' => $query_primary_model->batches['where']['tm_batchrecord_field_code'],
                    'tm_batchrecord_field_name' => $query_primary_model->batches['edit']['batch_name'],
                    'tm_batchrecord_field_value_id' => $have_id ? $v[$have_id] : null,
                    'tm_batchrecord_field_value_code' => $have_code ? $v[$have_code] : null,
                    'tm_batchrecord_field_value_name' => $have_name ? ($v[$have_name] ?? '') : '',
                    'tm_batchrecord_module_id' => $have_module ? $v[$have_module] : null,
                    'tm_batchrecord_inactive' => 0,
                ];
            }
            $batch_helper_save = BatchesHelperSave::create(null, 'SM_BATCHES_AND_LISTS', $raw_batch_records, [
                'tm_batchentry_name' => $batches_and_lists_name,
                'tm_batchentry_resource_code' => \Application::get('mvc.controller'),
            ]);
            if (!$batch_helper_save['success']) {
                $form->error(DANGER, $batch_helper_save['error']);
                return;
            }
            $form->values['__batches_and_lists_name'] = null;
            $form->error(SUCCESS, loc('NF.Message.ListCreatedSuccessfullyCode', 'List created successfully: {code}!', [
                'code' => URL::generateURL($batch_helper_save['tm_batchentry_code'], $batch_helper_save['tm_batchentry_code'], true)
            ]));
        }
    }

    /**
     * Render filter list
     *
     * @param object $form
     * @return string
     */
    public function renderFilterList(& $form)
    {
        $batches = Entries::getStatic([
            'where' => [
                'tm_batchentry_resource_code' => \Application::get('mvc.controller'),
                'tm_batchentry_inserted_user_id' => \User::id(),
            ],
            'pk' => ['tm_batchentry_code'],
        ]);
        if (empty($batches)) {
            return;
        }
        $__form_batches_and_lists_code = \Application::get('flag.global.__form_batches_and_lists_code');
        $result = '<table class="table table-striped">';
        $result .= '<tr>';
        $result .= '<th width="1%">&nbsp;</th>';
        $result .= '<th nowrap width="84%">' . loc('NF.Form.Name', 'Name') . '</th>';
        $result .= '<th nowrap width="5%">' . loc('NF.Form.Records', 'Records') . '</th>';
        $result .= '<th nowrap width="5%">' . loc('NF.Form.Datetime', 'Datetime') . '</th>';
        $result .= '<th nowrap width="5%">' . loc('NF.Form.Action', 'Action') . '</th>';
        $result .= '</tr>';
        $counter = 1;
        foreach ($batches as $k => $v) {
            $result .= '<tr>';
            $result .= '<td nowrap>' . \Format::id($counter) . '.</td>';
            $result .= '<td nowrap>';
            $result .= URL::generateURL($v['tm_batchentry_code'], $v['tm_batchentry_name'], true);
            if ($__form_batches_and_lists_code == $v['tm_batchentry_code']) {
                $result .= ' (' . loc('NF.Form.Current', 'Current') . ')';
                $form->errorInTabs(['records' => 1]);
            }
            $result .= '</td>';
            $result .= '<td nowrap align="right">' . \Format::id($v['tm_batchentry_record_counter']) . '</td>';
            $result .= '<td nowrap>' . \Format::datetime($v['tm_batchentry_inserted_timestamp']) . '</td>';
            $result .= '<td nowrap>';
            $result .= URL::generateURL($v['tm_batchentry_code'], loc('NF.Form.View', 'View'), true);
            $result .= ' | ';
            $result .= \HTML::a(['href' => \Request::buildFromCurrentController() . '?__form_batches_and_lists_code=' . $v['tm_batchentry_code'], 'value' => loc('NF.Form.Filter', 'Filter')]);
            $result .= '</td>';
            $result .= '</tr>';
            $counter++;
        }
        $result .= '</table>';
        return $result;
    }
}
