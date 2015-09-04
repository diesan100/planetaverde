<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsWidgetPositionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-widget-position-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'WIDGET_ID') ?>

    <?= $form->field($model, 'ORDER') ?>

    <?= $form->field($model, 'TYPE') ?>

    <?= $form->field($model, 'LAYOUT_SECTION') ?>

    <?= $form->field($model, 'ID') ?>

    <?php // echo $form->field($model, 'PAGE') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
