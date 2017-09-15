<?
/* @var $this yii\web\View */
\app\assets\BowerAsset::register($this);

?>
<div class="prodavec-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <div class="grid">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li><a href="<?= \yii\helpers\Url::to(['personal-info/index'])?>">Личные данные</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['my-products/index'])?>">Мои товары</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <img class="img-responsive"
                     src="http://fakeimg.pl/350x200"
                     alt="">
                <p>
                    <? $userProfile =
                        \app\modules\prodavec\models\ProdavecPersonalInfo::
                        findOne(['user_id' => Yii::$app->getUser()->id]) ; ?>
                    <?= $userProfile->first_name . ' ' . $userProfile->second_name;?>
                    <br>
                    ID: <?= $userProfile->id; ?>
                </p>

            </div>


            <div id="pjax-container" class="col-md-6">
                    <?= $this->render('/personal-info/index',['model' => $userProfile]); ?>
            </div>
        </div>
    </div>
</div>

<? $this->registerJsFile('@web/js/ajaxRender.js',['depends' => 'app\assets\BowerAsset'],'mAjaxRender');?>



