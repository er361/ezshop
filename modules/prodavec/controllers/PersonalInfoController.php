<?php

namespace app\modules\prodavec\controllers;

use app\modules\prodavec\models\ProdavecPersonalInfo;

class PersonalInfoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if($this->getModel())
            $model = $this->getModel();
        else
            $model = new ProdavecPersonalInfo();

        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            $model->user_id = \Yii::$app->user->getId();
            if($model->save())
                \Yii::$app->session->setFlash('personal_info_success','Успешно сохранено');
        }

        return $this->renderAjax('index',['model' => $model]);
    }

    public function getModel()
    {
        $model = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->user->id]);
        return $model;
    }

}
