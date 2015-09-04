<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;
use backend\modules\planes\models\Plan;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\payments\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
Modal::begin([
    'header'=>'<h4>'.Yii::t("app", "GetRecurringPaymentsProfileDetails").'</h4>',
    'id'=>'modal',
    'size'=>'modal-lg',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-7">
    <div class="panel">
        <div class="panel-heading border-light">
            <h4 class="panel-title">Datos de facturación</h4>
        </div>
        <div class="panel-body">  
            <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>

            <?php 
                ///////////////// USUARIO
                $dbData = User::find()->asArray()->all();
                //$dbData = ArrayHelper::merge([["-1"=>"NULL" , "email"=>"Ninguno"]], $dbData);
                $data=ArrayHelper::map($dbData, 'id', 'email');
                echo $form->field($model, 'user_id', ['labelOptions'=>['label' => 'Usuario']])->dropDownList($data,['id'=>'email']);
            ?>
            
            <?php 
                ///////////////// PLAN
                $dbData = Plan::find()->asArray()->all();
                //$dbData = ArrayHelper::merge([["-1"=>"NULL" , "comercial_name"=>"Ninguno"]], $dbData);
                $data=ArrayHelper::map($dbData, 'id', 'comercial_name');
                echo $form->field($model, 'plan_id', ['labelOptions'=>['label' => 'Plan']])->dropDownList($data,['id'=>'comercial_name']);
            ?>

            
            
            <?= $form->field($model, 'net_amount')->textInput(['maxlength' => 10]) ?>
            <?= $form->field($model, 'discount')->textInput(['maxlength' => 10]) ?>
            <?= $form->field($model, 'taxes')->textInput(['maxlength' => 10]) ?>
            
            
            <?= $form->field($model, 'date_to')->textInput() ?>
            <?= $form->field($model, 'date_from')->textInput() ?>
            
            <?= $form->field($model, 'promo_code')->textInput() ?>
            
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="panel">
        <div class="panel-heading border-light">
            <h4 class="panel-title">Parámetros</h4>
        </div>
        <div class="panel-body">
            
            <?php 
                ///////////////// ESTADO
                echo $form->field($model, 'state', ['labelOptions'=>['label' => 'Estado']])->dropDownList(backend\modules\billing\models\Invoice::$INVOICE_STATES_ARRAY);
            ?>
            
            <?= $form->field($model, 'created_at')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'updated_at')->textInput(['readonly' => true]) ?>
        </div>
    </div>
    
    <div class="panel">
        <div class="panel-heading border-light">
            <h4 class="panel-title">Parámetros de pasarela de pago de Paypal</h4>
        </div>
        <div class="panel-body">
            <p>
                <?= Html::button(Yii::t('app', 'GetRecurringPaymentsProfileDetails'), ["value"=> yii\helpers\Url::to(['//billing/invoice/paypal-profile-state',"id"=>$model->pyp_profile_id]), "class"=>'btn btn-success', "id"=>"modalButton"]); ?>
            </p>
            <?= $form->field($model, 'pyp_profile_id')->textInput(['maxlength' => 255, 'readonly' => true]) ?>
            <?= $form->field($model, 'pyp_payer_id')->textInput(['maxlength' => 255, 'readonly' => true]) ?>
            <?= $form->field($model, 'pyp_token')->textInput(['maxlength' => 255, 'readonly' => true]) ?>
            <?= $form->field($model, 'error')->textArea(['maxlength' => 500, 'readonly' => true]) ?>
            
            
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?php
$js = "   

$( document ).ready(function() {
    $('#modalButton').click(function(){
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    });
});
";

$this->registerJs($js);
?>