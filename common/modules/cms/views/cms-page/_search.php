<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsPageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CONTENT_ID') ?>

    <?= $form->field($model, 'TYPE') ?>

    <?= $form->field($model, 'ORDER') ?>

    <?= $form->field($model, 'URL') ?>

    <?php // echo $form->field($model, 'CONTROLLER') ?>

    <?php // echo $form->field($model, 'METHOD') ?>

    <?php // echo $form->field($model, 'TITLE') ?>

    <?php // echo $form->field($model, 'LAYOUT') ?>

    <?php // echo $form->field($model, 'IS_HOME') ?>

    <?php // echo $form->field($model, 'STATE') ?>

    <?php // echo $form->field($model, 'POST_CATEGORY') ?>

    <?php // echo $form->field($model, 'POST_ID') ?>

    <?php // echo $form->field($model, 'HEADER_IMAGE') ?>

    <?php // echo $form->field($model, 'HEADER_TEXT') ?>

    <?php // echo $form->field($model, 'SHOW_BREAD_CRUMBS') ?>

    <?php // echo $form->field($model, 'INTRO_TEXT') ?>

    <?php // echo $form->field($model, 'INTRO_IMAGE') ?>

    <?php // echo $form->field($model, 'HEADER_MASK') ?>

    <?php // echo $form->field($model, 'PARENT_PAGE') ?>

    <?php // echo $form->field($model, 'WRAP_CONTENT') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
