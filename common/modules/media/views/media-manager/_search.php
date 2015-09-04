<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CmsImagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-images-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'MIME') ?>

    <?= $form->field($model, 'URL') ?>

    <?= $form->field($model, 'WIDTH') ?>

    <?php // echo $form->field($model, 'HEIGHT') ?>

    <?php // echo $form->field($model, 'OWNER') ?>

    <?php // echo $form->field($model, 'META') ?>

    <?php // echo $form->field($model, 'DESCRIPTION') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
