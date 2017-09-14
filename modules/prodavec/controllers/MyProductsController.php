<?php

namespace app\modules\prodavec\controllers;

class MyProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->renderAjax('index');
    }
}
