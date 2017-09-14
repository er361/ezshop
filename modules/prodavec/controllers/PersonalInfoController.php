<?php

namespace app\modules\prodavec\controllers;

use app\modules\prodavec\models\ProdavecPersonalInfo;

class PersonalInfoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $hasProfile = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->user->id]);
        if($hasProfile)
            $model = $hasProfile;
        $model = new ProdavecPersonalInfo();

        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            $model->user_id = \Yii::$app->user->id;
            $model->save();
        }

        return $this->renderAjax('index',['model' => $model]);
    }

}
