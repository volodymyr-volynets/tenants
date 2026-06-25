<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Form;

use Object\Form\Wrapper\Base;
use Numbers\Tenants\Widgets\Batches\Helper\Sequences;
use Numbers\Backend\Db\Common\Model\Models;

class Entries extends Base
{
    public $form_link = 'tm_batch_entries';
    public $module_code = 'TM';
    public $title = 'T/M Batch Entries Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'records_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Tenants\Widgets\Batches\Model\Records',
            'details_pk' => ['tm_batchrecord_id'],
            'required' => false,
            'order' => 200,
        ],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'tm_batchentry_code' => [
                'tm_batchentry_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Batch Code', 'domain' => 'batch_code', 'null' => true, 'required' => 'c', 'percent' => 95, 'navigation' => true],
                'tm_batchentry_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'tm_batchentry_tm_batchtype_code' => [
                'tm_batchentry_tm_batchtype_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Batch Type', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Widgets\Batches\Model\Aliases\Types::optionsActive'],
                'tm_batchentry_record_counter' => ['order' => 2, 'label_name' => '# of Records', 'domain' => 'counter', 'default' => 0, 'percent' => 15, 'readonly' => true],
                'tm_batchentry_name' => ['order' => 3, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => false, 'percent' => 50],
            ]
        ],
        'records_container' => [
            'row1' => [
                'tm_batchrecord_sm_model_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Model #', 'domain' => 'model_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Models', 'options_params' => ['sm_model_widget_batches' => 1], 'onchange' => 'this.form.submit();'],
                'tm_batchrecord_no_data_model_role_code' => ['order' => 2, 'label_name' => 'Role', 'domain' => 'lgroup_code', 'default' => 'primary', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Roles', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
            ],
            'row2' => [
                'tm_batchrecord_field_value_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Field Value #', 'domain' => 'big_id', 'null' => true, 'required' => 'c', 'percent' => 100, 'method' => 'input', 'method_renderer' => 'self::renderFieldValueMethodRenderer'],
            ],
            'row3' => [
                'tm_batchrecord_field_value_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Field Value Code', 'domain' => 'code', 'null' => true, 'required' => 'c', 'percent' => 100, 'method_renderer' => 'self::renderFieldValueMethodRenderer'],
            ],
            'row4' => [
                'tm_batchrecord_field_value_name'  => ['order' => 1, 'row_order' => 400, 'label_name' => 'Field Value Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
            ],
            self::HIDDEN => [
                'tm_batchrecord_id' => ['label_name' => 'Record #', 'domain' => 'big_id_sequence', 'null' => true, 'method' => 'hidden'],
                'tm_batchrecord_tm_batchtype_code' => ['label_name' => 'Batch Type', 'domain' => 'code', 'null' => true, 'method' => 'hidden'],
                'tm_batchrecord_sm_model_code' => ['label_name' => 'Model Code', 'domain' => 'code', 'null' => true, 'method' => 'hidden'],
                'tm_batchrecord_module_id' => ['label_name' => 'Module #', 'domain' => 'module_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'TM Batch Entries',
        'model' => '\Numbers\Tenants\Widgets\Batches\Model\Entries',
        'details' => [
            '\Numbers\Tenants\Widgets\Batches\Model\Records' => [
                'name' => 'TM Batch Records',
                'pk' => ['tm_batchrecord_tenant_id', 'tm_batchrecord_tm_batchentry_code', 'tm_batchrecord_id'],
                'type' => '1M',
                'map' => ['tm_batchentry_tenant_id' => 'tm_batchrecord_tenant_id', 'tm_batchentry_code' => 'tm_batchrecord_tm_batchentry_code']
            ],
        ],
    ];

    protected $temp_models = null;

    public function refresh(& $form)
    {
        // preload models
        if (!isset($this->temp_models)) {
            $this->temp_models = Models::getStatic([
                'where' => [
                    'sm_model_widget_batches' => 1,
                ],
                'pk' => ['sm_model_id'],
            ]);
        }
        foreach ($form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'] as $k => $v) {
            if (empty($v['tm_batchrecord_sm_model_id'])) {
                continue;
            }
            $model = \Factory::model($this->temp_models[$v['tm_batchrecord_sm_model_id']]['sm_model_code'], true);
            $form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'][$k]['tm_batchrecord_field_code'] = $model->batches['edit']['edit_key'];
            $form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'][$k]['tm_batchrecord_field_name'] = $model->batches['edit']['batch_name'];
        }
    }

    public function validate(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        // if new sequence is required
        if (empty($form->values['tm_batchentry_code'])) {
            $form->values['tm_batchentry_code'] = Sequences::nextval($form->values['tm_batchentry_tm_batchtype_code']);
        }
        // fetch data to details
        foreach ($form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'] as $k => $v) {
            if (empty($v['tm_batchrecord_sm_model_id'])) {
                continue;
            }
            $form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'][$k]['tm_batchrecord_tm_batchtype_code'] = $form->values['tm_batchentry_tm_batchtype_code'];
            $form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'][$k]['tm_batchrecord_sm_model_code'] = $this->temp_models[$v['tm_batchrecord_sm_model_id']]['sm_model_code'] ?? null;
            // validate details
            $model = \Factory::model($this->temp_models[$v['tm_batchrecord_sm_model_id']]['sm_model_code'], true);
            $form->validateQuickRequired(['\Numbers\Tenants\Widgets\Batches\Model\Records', $k, $model->batches['edit']['batch_value']]);
        }
        $form->values['tm_batchentry_record_counter'] = count($form->values['\Numbers\Tenants\Widgets\Batches\Model\Records'] ?? []);
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if (in_array($options['options']['field_name'], ['tm_batchrecord_field_value_code', 'tm_batchrecord_field_value_id'])) {
            if (empty($neighbouring_values['tm_batchrecord_sm_model_id'])) {
                $options['options']['hidden'] = true;
            } else {
                $model = \Factory::model($this->temp_models[$neighbouring_values['tm_batchrecord_sm_model_id']]['sm_model_code'], true);
                if ($model->batches['edit']['batch_value'] != $options['options']['field_name']) {
                    $options['options']['hidden'] = true;
                }
            }
        }
    }

    public function renderFieldValueMethodRenderer(& $form, & $options, & $value, & $neighbouring_values)
    {
        $result = [
            'left' => '',
            'value' => $value,
            'right' => [],
        ];
        if (!empty($neighbouring_values['tm_batchrecord_sm_model_id'])) {
            $model = \Factory::model($this->temp_models[$neighbouring_values['tm_batchrecord_sm_model_id']]['sm_model_code'], true);
            // hide either ID or code
            if ($model->batches['edit']['batch_value'] != $options['options']['field_name']) {
                return '';
            }
            // field name
            if (!empty($model->batches['edit']['batch_name'])) {
                $result['left'] = \I18n::textToLoc('NF.Form', $model->batches['edit']['batch_name'], [
                    'translate' => true,
                ]);
            }
            // module #
            if (isset($neighbouring_values['tm_batchrecord_module_id'])) {
                $result['right'][] = loc('NF.Model.ModuleID', 'Module #') . ': ' .  $neighbouring_values['tm_batchrecord_module_id'] . '</span>';
            }
            // list
            if (!empty($model->batches['edit']['list_endpoint'])) {
                $link = \I18n::textToLoc('NF.Form', 'List', [
                    'translate' => true,
                ]);
                $result['right'][] = $model->batchesGetListEndpoint($neighbouring_values[$model->batches['edit']['batch_value']] ?? '', '<i class="far fa-list-alt"></i> ' . $link);
            }
            // edit
            if (!empty($model->batches['edit']['edit_endpoint']) && !empty($neighbouring_values[$model->batches['edit']['batch_value']])) {
                $link = \I18n::textToLoc('NF.Form', 'Edit', [
                    'translate' => true,
                ]);
                $result['right'][] = $model->batchesGetEditEndpoint($neighbouring_values[$model->batches['edit']['batch_value']], '<i class="fas fa-pen-square"></i> ' . $link);
            }
        } else {
            return '';
        }
        return \HTML::inputGroup($result);
    }
}
