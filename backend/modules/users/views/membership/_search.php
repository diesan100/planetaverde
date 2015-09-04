<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\MembershipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membership-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'current_plan') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'next_payment') ?>

    <?php // echo $form->field($model, 'free') ?>

    <?php // echo $form->field($model, 'used_storage') ?>

    <?php // echo $form->field($model, 'limit_storage') ?>

    <?php // echo $form->field($model, 'used_projects') ?>

    <?php // echo $form->field($model, 'limit_projects') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'paypal_profile_id') ?>

    <?php // echo $form->field($model, 'gateway_type') ?>

    <?php // echo $form->field($model, 'alert_80') ?>

    <?php // echo $form->field($model, 'alert_90') ?>

    <?php // echo $form->field($model, 'alert_100') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
