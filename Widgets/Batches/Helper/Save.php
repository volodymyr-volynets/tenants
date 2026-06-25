<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Helper;

use Numbers\Tenants\Widgets\Batches\Helper\Sequences;
use Numbers\Tenants\Widgets\Batches\Model\Entries as BatchEntriesModel;
use Numbers\Tenants\Widgets\Batches\Model\Records as BatchRecordsModel;

class Save
{
    /**
     * Create new batch
     *
     * @param string|null $batch_code
     * @param string $type
     * @param array $records
     * @param array $options
     * @return array
     */
    public static function create(?string $batch_code, string $type, array $records, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'tm_batchentry_code' => $batch_code,
            'batch_context_counter' => 0,
        ];
        $model = new BatchEntriesModel();
        $model->begin();
        // step 1 create entry for batches
        if (empty($batch_code)) {
            $result['tm_batchentry_code'] = Sequences::nextval($type);
            $entry_result = $model->collection()->merge([
                'tm_batchentry_tenant_id' => \Tenant::id(),
                'tm_batchentry_code' => $result['tm_batchentry_code'],
                'tm_batchentry_tm_batchtype_code' => $type,
                'tm_batchentry_record_counter' => 0,
                'tm_batchentry_inactive' => 0,
                'tm_batchentry_name' => $options['tm_batchentry_name'] ?? null,
                'tm_batchentry_resource_code' => $options['tm_batchentry_resource_code'] ?? null,
            ]);
            if (!$entry_result['success']) {
                $model->rollback();
                return $entry_result;
            }
        }
        // step 2 insert records
        $records_model = BatchRecordsModel::collectionStatic();
        foreach ($records as $k => $v) {
            $records[$k]['tm_batchrecord_tenant_id'] = \Tenant::id();
            $records[$k]['tm_batchrecord_tm_batchtype_code'] = $type;
            $records[$k]['tm_batchrecord_tm_batchentry_code'] = $result['tm_batchentry_code'];
        }
        $records_result = BatchRecordsModel::collectionStatic()->mergeMultiple($records);
        if (!$records_result['success']) {
            $model->rollback();
            return $records_result;
        }
        $entry_result = $model->touch([
            'tm_batchentry_tenant_id' => \Tenant::id(),
            'tm_batchentry_code' => $result['tm_batchentry_code'],
            'tm_batchentry_record_counter' => count($records),
        ]);
        if (!$entry_result['success']) {
            $model->rollback();
            return $entry_result;
        }
        // commit
        $result['success'] = true;
        $result['batch_context_counter'] = count($records);
        $model->commit();
        return $result;
    }
}
