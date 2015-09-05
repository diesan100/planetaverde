<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $signup_model \frontend\models\SignupForm */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

if(!isset($signup_model)) {
    $signup_model = new common\models\SignupForm();
}

if(!isset($login_model)) {
    $login_model = new \common\models\LoginForm();
}
?>
<section class="eRegistration">
	<div class="boxo">
            <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>
    	<p class="bigtitle"><?=Yii::t('frontend','Login')?></p>
    	<input type="text" value="" placeholder="_mail" onfocus="this.placeholder = ''" onblur="this.placeholder = '_mail'"  />
        <div class="clear"></div>
        <input type="text" value="" placeholder="_contrasena" onfocus="this.placeholder = ''" onblur="this.placeholder = '_password'" />
        <button class="smlsbtn">Login</button>
        <div class="clear"></div>
         <?php ActiveForm::end(); ?>
        <a href="#" class="linkz">I forgot my password</a>
    </div>
    <div class="boxo">
         <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    	<p class="bigtitle"><?=Yii::t('frontend','New User? Sign up')?></p>
    	 <?= $form->field($signup_model, 'name') ?>
        <div class="clear"></div>
        <?= $form->field($signup_model, 'email') ?>
		<div class="clear"></div>
        <?= $form->field($signup_model, 'password')->passwordInput() ?>
	<div class="clear"></div>
        <?= $form->field($signup_model, 'password_repeat')->passwordInput() ?>
        <?= Html::submitButton(Yii::t('app','Signup'), ['class' => 'smlsbtn', 'name' => 'signup-button']) ?>
        <div class="clear"></div>
         <?php ActiveForm::end(); ?>
                
    </div>
</section>