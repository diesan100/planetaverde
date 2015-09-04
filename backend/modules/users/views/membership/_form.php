<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\Membership */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membership-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'current_plan')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'next_payment')->textInput() ?>

    <?= $form->field($model, 'free')->textInput() ?>

    <?= $form->field($model, 'used_storage')->textInput() ?>

    <?= $form->field($model, 'limit_storage')->textInput() ?>

    <?= $form->field($model, 'used_projects')->textInput() ?>

    <?= $form->field($model, 'limit_projects')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?= $form->field($model, 'paypal_profile_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'gateway_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'alert_80')->textInput() ?>

    <?= $form->field($model, 'alert_90')->textInput() ?>

    <?= $form->field($model, 'alert_100')->textInput() ?>
    
    <?= $form->field($model, 'promo_code')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'promo_used_months')->textInput() ?>

    <?= $form->field($model, 'non_payment')->textInput() ?>
    
    <?= $form->field($model, 'non_payment_reminders')->textInput() ?>

    <?= $form->field($model, 'frozen')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
