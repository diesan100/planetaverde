<?php 
$form = \yii\widgets\ActiveForm::begin(['id' => 'login-form']); 

var_dump(get_class($model));

//var_dump($model);
if (sizeof($model->getErrors())>0) { ?>

<div class="errorHandler alert alert-danger">
    <i class="fa fa-remove-sign"></i> <?=Yii::t('backend','Incorrect input data.')?>
</div>

<?php } ?>
    <fieldset>
        <?= $form->field($model, 'username') ?>
        <!--<div class="form-group">
            <input type="text" class="form-control" name="LoginForm[username]" id="loginform-username" placeholder="Correo electrónico"> 
        </div>
        -->
        <?= $form->field($model, 'password')->passwordInput() ?>
        <!--
        <div class="form-group form-actions">            
            <input type="password" id="loginform-password" class="form-control password" name="LoginForm[password]" placeholder="Contraseña">
        </div>
        -->
        <div class="form-actions">
            <!--
                <label for="remember" class="checkbox-inline">
                        <input type="checkbox" class="grey remember" id="remember" name="remember">
                        Keep me signed in
                </label>
            -->
            <button type="submit" class="btn btn-verde">
                <?=Yii::t('app','Login')?></i>
            </button>            
        </div>
    </fieldset>
<?php \yii\widgets\ActiveForm::end(); ?>