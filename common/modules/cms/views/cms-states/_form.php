<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsStates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-states-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'STATE')->textInput() ?>

    <?= $form->field($model, 'STATE_NAME')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
