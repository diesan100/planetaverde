<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\billing\models\PaypalTx */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paypal-tx-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tx_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'txn_type')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'payer_id')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'recurring_payment_id')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
