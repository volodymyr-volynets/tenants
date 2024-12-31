<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Controller;

use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class Policies extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Tenants\Tenants\Form\List2\Policies([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Tenants\Tenants\Form\Policies([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Tenants\Tenants\Form\Policies',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
