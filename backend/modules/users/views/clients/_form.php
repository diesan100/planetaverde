<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['readonly' => true, 'maxlength' => 255]) ?>
    
    <?= $form->field($model, 'picture_url')->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 255]) ?>

    <?php //$form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'state')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'creation_date')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'last_acces')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput(['readonly' => true]) ?>

    <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>

    <?php // $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>

    <?php // $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'employment')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_position')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'studies')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'professional_experience')->textArea(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'about_me')->textArea(['maxlength' => 1000]) ?>

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
