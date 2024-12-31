<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Controller\Policy;

use Object\Controller\Permission;

class Attributes extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Tenants\Tenants\Form\List2\Policy\Attributes([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Tenants\Tenants\Form\Policy\Attributes([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
