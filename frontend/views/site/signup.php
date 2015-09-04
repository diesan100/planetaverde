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

<div class="content container" id="main-content">
    <div class="row">
        <div id="main-content-container">
            <div class="h1_top_border"></div>
            <h1><?=$title?></h1>
            <div class="h1_bottom_border"></div>

            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-bottom: 0px;"><?=Yii::t('frontend','Intro...')?></h3>
                    
                </div>
            </div>
            
            <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="col-sm-6">                    
                        <?php if ($signup_model->errors != null && sizeof($signup_model->errors)>0) {
                            echo '<p class="help-block-error">' . Yii::t('app','Input error.') . "</p>";
                        } ?>
                        
                        <?= $form->field($signup_model, 'name') ?>
                        <?= $form->field($signup_model, 'email') ?>
                        <?= $form->field($signup_model, 'password')->passwordInput() ?>
                        <?= $form->field($signup_model, 'password_repeat')->passwordInput() ?>
                        
                    </div>
                    <div class="col-sm-6"> 
                        
                        <p><?=Yii::t('app','Los campos marcados con <strong>*</strong> son obligatorios.')?></p>

                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app','Signup'), ['class' => 'btn boton registrame', 'name' => 'signup-button']) ?>
                        </div>
                    </div>
                
                <?php ActiveForm::end(); ?>
                


            </div>
        </div>
    </div>
</div>