<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\GroupTrip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'trip_type')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'itinerary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dateprice')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'poll_rate')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'image')->textInput() ?>

    <?= $form->field($model, 'flight_arrival')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'flight_return')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
