<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 18.09.2017
 * Time: 10:13
 */

use app\assets\AppAsset;
use app\modules\prodavec\models\ProdavecPersonalInfo;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div style="width: 100%;height: 100px;margin-bottom: 20px; background-color:salmon;"></div>
    <div class="container-fluid">
        <div class="grid">
            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li><a href="<?= Url::to(['personal-info/index'])?>">Личные данные</a></li>
                        <li><a href="<?= Url::to(['my-products/index'])?>">Мои товары</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <? $userProfile = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->getUser()->id]) ;?>
                    <?= $this->render('_account-block',['userProfile' => $userProfile])?>
                </div>


                <div id="pjax-container" class="col-md-6">
                    <?= $content?>
                </div>

            </div>
        </div>
    </div>
    <? $this->registerJsFile('@web/js/ajaxRender.js',['depends' => 'app\assets\BowerAsset'],'mAjaxRender');?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>