<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use usersbackend\modules\users\models\AccountSettings;
/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */

$this->title = Yii::t('app', 'Mi configuración');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Mi configuración');

$periocididad_array = [
                        AccountSettings::PERIODICITY_INSTANTLY => Yii::t('app', 'Instantáneo'), 
                        AccountSettings::PERIODICITY_DAILY => Yii::t('app', 'Diario')
                      ];


?>


    
<?php $form = ActiveForm::begin(); ?>
<div class="row">
   <div class="col-sm-12">
       <div class="panel paco">
           <h4 class="no-margin"><?=Yii::t('app', 'Proyectos en los que soy')?></h4>
           <h3 class="verde"><?=Yii::t('app', 'Administrador')?></h3>
           <p class="form-bottom-border"><?=Yii::t('app', 'Quiero recibir un correo cuando:')?></p>
            <?= $form->field($model, 'admin_upload')->checkBox(['class'=>'cbr']) ?>
           
            <?= $form->field($model, 'admin_delete')->checkBox(['class'=>'cbr']) ?>
            <?= $form->field($model, 'admin_folders')->checkBox(['class'=>'cbr']) ?>
            <p class="form-bottom-border"><?=Yii::t('app', 'Periodicidad:')?></p>
            <?= 
            $form->field($model, 'admin_period')->radioList(
                    $periocididad_array,  
                    [
                        'separator' => '<br>',
                        'item' => 
                            function($index, $label, $name, $checked, $value) {
                                $is_checked = ($checked==1)?'checked':'';
                                $return = '<label>';
                                $return .= '<input type="radio" '.$is_checked.' value="' . $value . '" name="' . $name . '" class="cbr cbr-gray">';
                                $return .= ucwords($label);
                                $return .= '</label>';
                                return $return;
                            }
                    ]
            ) ?>
        </div>
   </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel paco">
            <h4 class="no-margin"><?=Yii::t('app', 'Proyectos en los que soy')?></h4>
            <h3 class="naranja" ><?=Yii::t('app', 'Miembro del equipo')?></h3>
            <p class="form-bottom-border"><?=Yii::t('app', 'Quiero recibir un correo cuando:')?></p>
            <?= $form->field($model, 'member_upload')->checkBox(['class'=>'cbr']) ?>
            <p class="form-bottom-border"><?=Yii::t('app', 'Periodicidad:')?></p>
            <?= 
            $form->field($model, 'member_period')->radioList(
                    $periocididad_array,  
                    [
                        'separator' => '<br>',
                        'item' => 
                            function($index, $label, $name, $checked, $value) {
                                $is_checked = ($checked==1)?'checked':'';
                                $return = '<label>';
                                $return .= '<input type="radio" '.$is_checked.' value="' . $value . '" name="' . $name . '" class="cbr cbr-gray">';
                                $return .= ucwords($label);
                                $return .= '</label>';
                                return $return;
                            }
                    ]
            ) ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel paco">
            <h4 class="no-margin"><?=Yii::t('app', 'Proyectos en los que soy')?></h4>
            <h3 class="rojo"><?=Yii::t('app', 'Invitado')?></h3>
            <p class="form-bottom-border"><?=Yii::t('app', 'Quiero recibir un correo cuando:')?></p>
            <?= $form->field($model, 'guest_upload')->checkBox(['class'=>'cbr']) ?>
            <p class="form-bottom-border"><?=Yii::t('app', 'Periodicidad:')?></p>
            <?= 
            $form->field($model, 'guest_period')->radioList(
                    $periocididad_array,  
                    [
                        'separator' => '<br>',
                        'item' => 
                            function($index, $label, $name, $checked, $value) {
                                $is_checked = ($checked==1)?'checked':'';
                                $return = '<label>';
                                $return .= '<input type="radio" '.$is_checked.' value="' . $value . '" name="' . $name . '" class="cbr cbr-gray">';
                                $return .= ucwords($label);
                                $return .= '</label>';
                                return $return;
                            }
                    ]
            ) ?>
        </div>
    </div>
</div>

<?php

?>

<?= Html::submitButton(Yii::t('app', 'Guardar cambios'), ['class' => 'btn btn-complete-action btn-verde btn-22']) ?><br><br>

<?php ActiveForm::end(); ?>