<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\CmsMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-menu-form">

    <?php 
    if($model->isNewRecord) {
        $action = Url::to(['//cms/cms-menu/create', "origin"=>"show"]);
    } else {
        $action = Url::to(['//cms/cms-menu/update', "id"=>$model->ID, "origin"=>"show"]);
    }
    $form = ActiveForm::begin(["action" => $action]); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'POSITION')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'TEMPLATE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create Menu') : Yii::t('app', 'Update Menu'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
