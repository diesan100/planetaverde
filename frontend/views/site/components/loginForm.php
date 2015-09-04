<?php $form = \yii\widgets\ActiveForm::begin(['id' => 'login-form', 'action'=>  yii\helpers\Url::to("site/login")]); ?>
<?php if (sizeof($model->getErrors())>0) { ?>

<div class="errorHandler alert alert-danger">
    <i class="fa fa-remove-sign"></i> <?=Yii::t('app','Los datos introducidos no son correctos.')?>
</div>
<?php } ?>
    <fieldset>
        <div class="form-group">
            <span class="input-icon">
                    <input type="text" class="form-control" name="LoginForm[username]" id="loginform-username" placeholder="Username">
                    <i class="fa fa-user"></i> </span>
        </div>
        <div class="form-group form-actions">
            <span class="input-icon">
            <input type="password" id="loginform-password" class="form-control password" name="LoginForm[password]" placeholder="Password">
            <i class="fa fa-lock"></i>
            <a class="forgot" href="#">
                <?=Yii::t('app','He olvidado mi contraseña.')?>
            </a> </span>
        </div>
        <div class="form-actions">
            <!--
                <label for="remember" class="checkbox-inline">
                        <input type="checkbox" class="grey remember" id="remember" name="remember">
                        Keep me signed in
                </label>
            -->
                <button type="submit" class="btn btn-green">
                        <?=Yii::t('app','Login')?></i>
                </button>
        </div>
        <div class="new-account">
                <?=Yii::t('app','¿Aún no tienes una cuenta?')?>
                <a href="<?= Yii::getAlias('@frontend_web')?>/signup" class="___register">
                    <?=Yii::t('app','Prueba uno de nuestros planes.')?>
                </a>
        </div>
    </fieldset>
<?php \yii\widgets\ActiveForm::end(); ?>

