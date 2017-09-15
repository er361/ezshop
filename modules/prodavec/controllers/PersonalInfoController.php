<?php

namespace app\modules\prodavec\controllers;

use app\modules\prodavec\models\ProdavecPersonalInfo;
use yii\web\UploadedFile;

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

            $uploadedFile = UploadedFile::getInstance($model, 'photo_file');

            if($uploadedFile){
                $model->photo_file = $uploadedFile;

                if($model->upload())
                    $model->photo_path = $model->photo_path . '.' . $model->photo_file->extension;
            }

            if($model->save(false))
                \Yii::$app->session->setFlash('personal_info_success','Успешно сохранено');
        }

        return $this->render('index',['model' => $model]);
    }

    public function getModel()
    {
        $model = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->user->id]);
        return $model;
    }

}
