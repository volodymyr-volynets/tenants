<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Widgets\Batches\Controller;

use Object\Controller\Permission;

class Entries extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Tenants\Widgets\Batches\Form\List2\Entries([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Tenants\Widgets\Batches\Form\Entries([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
