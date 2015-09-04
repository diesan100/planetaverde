<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\cms\models\CmsLayout;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsLayoutSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-layout-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => 255]) ?>

    <?php 
        $dataCat=ArrayHelper::map(CmsLayout::find()->asArray()->all(), 'ID', 'TITLE');
    	echo $form->field($model, 'LAYOUT')->dropDownList($dataCat,['ID'=>'TITLE']);
    ?>
    
    <!-- ?= $form->field($model, 'LAYOUT')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
