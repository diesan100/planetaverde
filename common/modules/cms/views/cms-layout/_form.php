<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsLayout */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-layout-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LAYOUT')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'TITLE')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
