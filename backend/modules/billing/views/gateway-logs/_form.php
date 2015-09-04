<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\billing\models\GatewayLogs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gateway-logs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gateway')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => 2000]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
