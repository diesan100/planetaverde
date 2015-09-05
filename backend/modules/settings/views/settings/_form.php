<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\settings\SettingsModule;

/* @var $this yii\web\View */
/* @var $model common\models\Settings */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'param_name')->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'description')->textArea(['maxlength' => 255, 'rows'=>3]) ?>

    <?php //echo $form->field($model, 'param_type')->textInput() ?>

    <?php 
        $dataCat=ArrayHelper::toArray(SettingsModule::$SETTINGS_PARAM_TYPES , 'ID', 'VALUE');
        echo $form->field($model, 'param_type')->dropDownList($dataCat,['ID'=>'VALUE']);
    ?>
    
    <?= $form->field($model, 'param_int_value')->textInput() ?>
    
    <?= $form->field($model, 'param_varchar_value')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'param_long_value')->textArea(['maxlength' => 1020, 'rows'=>10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>




</script>