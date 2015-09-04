<?php

use yii\helpers\Html;
use yii\helpers\Url;

$bundle = \app\modules\users\UsersModuleAsset::register($this);

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */

//$this->registerJsFile(Yii::getAlias("@web")."/rapido/assets/plugins/jquery.pulsate/jquery.pulsate.min.js", ['position' => \yii\web\View::POS_END, 'depends'=> 'yii\web\JqueryAsset']);
//$this->registerJsFile(Yii::getAlias("@web")."/rapido/assets/js/pages-user-profile.js", ['position' => \yii\web\View::POS_END, 'depends'=> 'yii\web\JqueryAsset']);
//$this->registerJsFile(Yii::getAlias("@web").'/js/imagesUploader/profileImageUpload.js', ['position' => \yii\web\View::POS_END, 'depends'=> 'yii\web\JqueryAsset']);

$this->title = Yii::t('app', 'My profile');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Mi perfil');


$url = Url::to(['//users/profile/profileimageupload']);
$csrfToken = Yii::$app->getRequest()->csrfToken;
        
$this->registerJs("var csrfValue = '".$csrfToken."'", 1);
$this->registerJs("var profileImageUploaderUrl = '".$url."'", 1);

if ( isset($editting) && $editting==true) {
$this->registerJs("$('.nav-tabs a[href=#panel_edit_account]').tab('show');", 3);
}
?>
<div class="tabbable">
        <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                <li class="active">
                        <a data-toggle="tab" href="#panel_overview">
                            Resumen
                        </a>
                </li>
                <li>
                        <a data-toggle="tab" href="#panel_edit_account">
                            Editar cuenta
                        </a>
                </li>
        </ul>
        <div class="tab-content">
                <div id="panel_overview" class="tab-pane fade in active">
                    <?= $this->render("components/profile_tab_overview", ["model"=>$model, "assetUrl" =>$bundle->baseUrl]);?>
                </div>
                <div id="panel_edit_account" class="tab-pane fade">
                    <?= $this->render("components/profile_tab_edit_form", ["model"=>$model]);?>
                </div>
        </div>
</div>