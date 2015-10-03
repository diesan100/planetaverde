<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\GroupTripSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-trip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'area_id') ?>

    <?= $form->field($model, 'trip_type') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'subtitle') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'itinerary') ?>

    <?php // echo $form->field($model, 'dateprice') ?>

    <?php // echo $form->field($model, 'poll_rate') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'flight_arrival') ?>

    <?php // echo $form->field($model, 'flight_return') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'state') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
