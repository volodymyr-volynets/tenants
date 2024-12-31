<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Form;

use Object\Form\Wrapper\Base;

class ShortUrls extends Base
{
    public $form_link = 'tm_short_urls';
    public $module_code = 'TM';
    public $title = 'T/M Short URLs Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true,
        ],
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'tm_shorturl_id' => [
                'tm_shorturl_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'URL #', 'domain' => 'big_id_sequence', 'percent' => 100, 'navigation' => true],
            ],
            'tm_shorturl_name' => [
                'tm_shorturl_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100],
            ],
            'tm_shorturl_full_url' => [
                'tm_shorturl_full_url' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Full URL', 'type' => 'text', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'textarea'],
            ],
            'tm_shorturl_short_url' => [
                'tm_shorturl_short_url' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Short Url', 'type' => 'text', 'required' => 'c', 'percent' => 50, 'readonly' => true],
                'tm_shorturl_short_key' => ['order' => 2, 'label_name' => 'Short Key', 'type' => 'text', 'required' => 'c', 'percent' => 25, 'readonly' => true],
                'tm_shorturl_expires' => ['order' => 3, 'label_name' => 'Expires', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'Short URLs',
        'model' => '\Numbers\Tenants\Tenants\Model\ShortUrls',
    ];

    public function post(& $form)
    {
        if (empty($form->values['tm_shorturl_short_key'])) {
            $form->values['tm_shorturl_short_key'] = \Crypt::nanoCreate($form->values['tm_shorturl_id']);
            $form->values['tm_shorturl_short_url'] = '/u/' . $form->values['tm_shorturl_short_key'];
            \Numbers\Tenants\Tenants\Model\ShortUrls::collectionStatic()->merge($form->values);
        }
        return true;
    }
}
