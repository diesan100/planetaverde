<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AppMessages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identifier')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'message')->textarea(['maxlength' => 1000]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
