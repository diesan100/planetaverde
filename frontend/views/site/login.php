<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo">
            <img src="<?= Yii::getAlias('@web')?>/images/logo.png">
        </div>

        <!-- start: LOGIN BOX -->
        <div class="box-login">

                <h3><?=Yii::t('app','Accede a Myprojectt')?></h3>
                <p>
                    <?=Yii::t('app','Por favor introduce tu dirección de correo y contraseña para acceder.')?>
                </p>

               <?php //include Yii::getAlias("@app") . "/views/login/loginForm.php"; 
               echo $this->render("components/loginForm", ["model"=>$model]);
               ?>

                <!-- start: COPYRIGHT -->
                <div class="copyright">
                    <img src="<?= Yii::getAlias('@web')?>/images/imago.png" width="50px">
                </div>
                <div class="copyright">                               
                        2015 &copy; Myprojectt.
                </div>
                <!-- end: COPYRIGHT -->
        </div>
        <!-- end: LOGIN BOX -->
        <!-- start: FORGOT BOX -->
        <div class="box-forgot">
                <h3><?=Yii::t('app','¿Olvidaste tu contraseña?')?></h3>
                <p>
                        <?=Yii::t('app','Introduce tu email para recuperar la contaseña')?>
                </p>

                <form class="form-forgot">
                    <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-remove-sign"></i> <?=Yii::t('app','Tieles algunos errores.')?>
                    </div>
                    <fieldset>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <i class="fa fa-envelope"></i> 
                               </span>
                            </div>
                            <div class="form-actions">

                                    <button type="submit" class="btn btn-green">
                                            <?=Yii::t('app','Recuperar contraseña')?>
                                    </button>
                                    <a class="btn btn-light-grey go-back pull-right">
                                            <?=Yii::t('app','Login')?>
                                    </a>
                            </div>
                    </fieldset>
            </form>                           
                <!-- start: COPYRIGHT -->
                <div class="copyright">
                    <img src="<?= Yii::getAlias('@web')?>/images/imago.png" width="50px" style="margin-top:30px">
                </div>
                <div class="copyright">
                        2015 &copy; Myprojectt.
                </div>
                <!-- end: COPYRIGHT -->
        </div>
        <!-- end: FORGOT BOX -->
    </div>
</div>


<!--
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
-->