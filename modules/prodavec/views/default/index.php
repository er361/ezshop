<?
/* @var $this yii\web\View
 */

use yii\helpers\Url;
use yii\widgets\Pjax;

\app\assets\BowerAsset::register($this);
?>
<div class="prodavec-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <div class="grid">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li><a href="<?= Url::to(['personal-info/index'])?>">Личные данные</a></li>
                    <li><a href="<?= Url::to(['my-products/index'])?>">Мои товары</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <?= $this->render('_account-block',['userProfile' => $userProfile])?>
            </div>


            <div id="pjax-container" class="col-md-6">
                    <?= $this->render('/personal-info/index',['model' => $userProfile]); ?>
            </div>

        </div>
    </div>
</div>

<? $this->registerJsFile('@web/js/ajaxRender.js',['depends' => 'app\assets\BowerAsset'],'mAjaxRender');?>



