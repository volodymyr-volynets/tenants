<?php

namespace Numbers\Tenants\Tenants\Form;
class Firewalls extends \Object\Form\Wrapper\Base {
	public $form_link = 'tm_firewalls';
	public $module_code = 'TM';
	public $title = 'T/M Firewalls Form';
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
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'tm_firewall_ip' => [
				'tm_firewall_ip' => ['order' => 1, 'row_order' => 100, 'label_name' => 'IP', 'domain' => 'ip', 'percent' => 85, 'navigation' => true],
				'tm_firewall_blocked' => ['order' => 2, 'label_name' => 'Blocked', 'type' => 'boolean', 'percent' => 10],
				'tm_firewall_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'tm_firewall_inserted_timestamp' => [
				'tm_firewall_inserted_timestamp' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Timestamp Inserted', 'domain' => 'timestamp_now', 'percent' => 25, 'format' => 'datetime', 'static' => true],
				'tm_firewall_last_timestamp' => ['order' => 2, 'label_name' => 'Last Timestamp', 'type' => 'timestamp', 'null' => true, 'percent' => 25, 'format' => 'datetime', 'static' => true],
				'tm_firewall_requests' => ['order' => 3, 'label_name' => 'Requests', 'domain' => 'bigcounter', 'percent' => 50, 'static' => true],
			],
			'tm_firewall_info' => [
				'tm_firewall_info' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Info', 'type' => 'json', 'percent' => 100, 'custom_renderer' => 'self::renderInfo'],
			],
			'tm_firewall_last_10_messages' => [
				'tm_firewall_last_10_messages' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Last 10 Messages', 'type' => 'json', 'percent' => 100, 'custom_renderer' => 'self::renderLast10'],
			]
		],

		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Forewalls',
		'model' => '\Numbers\Tenants\Tenants\Model\Firewalls',
	];

	public function validate(& $form) {
		// prepopulate sequence number
		if (empty($form->values['tm_policy_code'])) {
			$sequence = new \Numbers\Tenants\Tenants\Model\Policy\CodeSequence();
			$form->values['tm_policy_code'] = $sequence->nextval('advanced');
		}
		// global assignments
		if ($form->values['tm_policy_type_code'] == 'GLOBAL_ASSIGNMENT_ENFORCEMENT') {
			if (empty($form->values['tm_policy_global_abacattr_id'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, 'tm_policy_global_abacattr_id');
			}
		}
	}

	public function renderInfo(& $form, & $options, & $value, & $neighbouring_values) {
		// check if we have permissions
		if (!empty($value)) {
			$result = [];
			$data = json_decode($value, true);
			foreach ([
			    'city',
			    'region',
			    'country_name',
			    'postal'
			] as $v) {
				$result[] = ucfirst($v) . ': ' . $data[$v];
			}
			return implode('<hr/>', $result);
		} else {
			return '';
		}
	}

	public function renderLast10(& $form, & $options, & $value, & $neighbouring_values) {
		// check if we have permissions
		if (!empty($value)) {
			$result = json_decode($value, true);
			return implode('<hr/>', $result);
		} else {
			return '';
		}
	}
}