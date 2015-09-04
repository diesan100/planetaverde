<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsMenuItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-menu-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MENU') ?>

    <?= $form->field($model, 'TITLE') ?>

    <?= $form->field($model, 'STATE') ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PAGE') ?>

    <?php // echo $form->field($model, 'ORDER') ?>

    <?php // echo $form->field($model, 'PARENT_MENU') ?>

    <?php // echo $form->field($model, 'TYPE') ?>

    <?php // echo $form->field($model, 'URL') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
