<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $signup_model \frontend\models\SignupForm */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

if (!isset($signup_model)) {
    $signup_model = new common\models\SignupForm();
}

if (!isset($login_model)) {
    $login_model = new \common\models\LoginForm();
}
?>
<section class="eRegistration">
    <div class="boxo">
        <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>
        <p class="bigtitle"><?= Yii::t('frontend', 'Login') ?></p>
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
        <p class="bigtitle">New User? Sign up</p>
        <input type="text" id="signupform-name"  name="SignupForm[name]" placeholder="_name" onfocus="this.placeholder = ''" onblur="this.placeholder = '_name'" reuired>
        <div class="clear"></div>
        <input type="email" id="signupform-email"  name="SignupForm[email]" placeholder="_mail" onfocus="this.placeholder = ''" onblur="this.placeholder = '_mail'" required>
        <div class="clear"></div>
        <input type="password" id="signupform-password"  name="SignupForm[password]" placeholder="_password" onfocus="this.placeholder = ''" onblur="this.placeholder = '_password'" required>
        <div class="clear"></div>
        <input type="password" id="signupform-password_repeat"  name="SignupForm[password_repeat]" placeholder="_repeat password" onfocus="this.placeholder = ''" onblur="this.placeholder = '_repeat password'" required>
        <button type="submit" class="smlsbtn" name="signup-button">Signup</button>        <div class="clear"></div>
        <div class="clear"></div>
        <div id="error_signup"></div>
        <?php ActiveForm::end(); ?>
    </div>
</section>
<style>
    .error_signup{
        color:red;
    }
</style>