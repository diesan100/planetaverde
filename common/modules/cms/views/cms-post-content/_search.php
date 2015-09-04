<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsPostContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-post-content-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CONTENT') ?>

    <?= $form->field($model, 'STATE') ?>

    <?= $form->field($model, 'CREATION_DATE') ?>

    <?= $form->field($model, 'LAST_MODIFIED') ?>

    <?php // echo $form->field($model, 'OWNER') ?>

    <?php // echo $form->field($model, 'PERMALINK') ?>

    <?php // echo $form->field($model, 'CATEGORY') ?>

    <?php // echo $form->field($model, 'VERSION_ID') ?>

    <?php // echo $form->field($model, 'TITLE') ?>

    <?php // echo $form->field($model, 'FEATURED_IMG') ?>

    <?php // echo $form->field($model, 'META_DATA') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
