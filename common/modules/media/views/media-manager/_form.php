<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CmsImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="col-lg-8 col-md-7">
            <div class="cms-post-content-form">
                <div class="cms-images-form">
                    <?php
                        if($model->isNewRecord) {
                            echo $form->field($model, 'URL')->widget(kartik\widgets\FileInput::classname(), [
                                'options' => ['accept' => 'image/*'],
                            ]);
                        } else { 
                            echo "<img style='max-width:50%' height='auto' src='".Yii::getAlias('@web')."/" . $model->URL . "'>";
                        } 
                    ?>
                    <?= $form->field($model, 'META')->textArea(['maxlength' => 255]) ?>
                    <?= $form->field($model, 'DESCRIPTION')->textArea(['maxlength' => 255]) ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <?= $form->field($model, 'NAME')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'ID')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'WIDTH')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'HEIGHT')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'OWNER')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'MIME')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'URL')->textInput(['readonly' => true]) ?>
        </div>
    <?php ActiveForm::end(); ?>
 </div>