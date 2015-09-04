<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<h6><?=Yii::t('app','Los campos marcados en verde serán visibles por los usuarios de tu equipo.')?></h6>

<?php $form = ActiveForm::begin(); ?>

<?php // $form->field($model, 'id')->textInput(['readonly' => true]) ?>

<?php // $form->field($model, 'username')->textInput(['readonly' => true, 'maxlength' => 255]) ?>

<?php // $form->field($model, 'picture_url')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'name' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255, 'class'=>'form-control bottom-border']) ?>

<?= $form->field($model, 'surname' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'email' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 150]) ?>

<?php //$form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'telephone' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 20]) ?>

<?= $form->field($model, 'skype' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'address' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'province' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'zip_code' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 30]) ?>

<?= $form->field($model, 'company' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'employment' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'job_position' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>

<?php // echo $form->field($model, 'birthday')->textInput() ?>

<?= $form->field($model, 'studies' , ['options'=>['class'=>'form-group form-bottom-border']])->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'professional_experience' , ['options'=>['class'=>'form-group form-bottom-border']])->textArea(['maxlength' => 1000]) ?>
<?= $form->field($model, 'about_me' , ['options'=>['class'=>'form-group form-bottom-border']])->textArea(['maxlength' => 1000]) ?>


<div class="form-group">
    <?= Html::submitButton("<img src='".Yii::getAlias("@web") . "/images/icons/compartir.png'> " . Yii::t('app', 'Actualizar'), ['class' => 'btn btn-complete-action btn-orange btn-22']) ?>
</div>

<?php ActiveForm::end(); ?>

