<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\prodavec\models\ProdavecPersonalInfo */
/* @var $form ActiveForm */
?>
<div class="personal-info-index">

    <? \yii\widgets\Pjax::begin()?>
        <? if(Yii::$app->session->hasFlash('personal_info_success')):?>
            <div class="alert alert-success" role="alert"><?= Yii::$app->session->getFlash('personal_info_success')?></div>
        <? endif;?>

        <?php $form = ActiveForm::begin([
                'action' => ['/prodavec/personal-info/index'],
                'options' => [
                        'data' => ['pjax' => true]
                ]
        ]); ?>

            <?= $form->field($model, 'first_name') ?>
            <?= $form->field($model, 'second_name') ?>
            <?= $form->field($model, 'company_name') ?>
            <?= $form->field($model, 'brands') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'address') ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить и отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <? \yii\widgets\Pjax::end() ?>
</div><!-- personal-info-index -->

