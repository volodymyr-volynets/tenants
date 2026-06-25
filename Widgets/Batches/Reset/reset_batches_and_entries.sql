BEGIN;

DELETE FROM public.tm_batch_records WHERE tm_batchrecord_tm_batchtype_code = 'DN_EMBEDDINGS';
DELETE FROM public.tm_batch_entries WHERE tm_batchentry_tm_batchtype_code = 'DN_EMBEDDINGS';

COMMIT;
