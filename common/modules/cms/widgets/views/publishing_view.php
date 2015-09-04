<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\modules\cms\constants\CMSConstants;
?>
<div class="panel panel-orange">
    <div class="panel-heading border-light">
        <h4 class="panel-title">Publishing</h4>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="panel-body panel-white">
        <?php 
            $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
            echo $form->field($model, 'STATE')->dropDownList($dataCat,['ID'=>'VALUE']);
        ?>   
        
        
        <?php
        
        if(property_exists(get_class($model), 'ORDER')) {
        
            echo $form->field($model, 'order')->widget(kartik\widgets\TouchSpin::classname(), [
                'options'=>['placeholder'=>'Select an order', 'width' => '200px'],
                'pluginOptions' => [
                    'initval' => 0,
                    'verticalbuttons' => true,
                    'verticalupclass' => 'glyphicon glyphicon-plus',
                    'verticaldownclass' => 'glyphicon glyphicon-minus',
                ]
            ]);
        }
        ?>
        <?php //echo $form->field($model, 'CREATED_AT')->textInput(['readonly' => true]) ?>
        <?php //echo $form->field($model, 'UPDATED_AT')->textInput(['readonly' => true]) ?>

        <!--
        <div class="form-group field-eccourse-created_by">
            <label class="control-label" for="eccourse-created_by">Created By</label>
            <input type="text" class="form-control" value="<?php //echo $created_by; ?>" readonly="">
        </div>
        
        <div class="form-group field-eccourse-updated_by">
            <label class="control-label" for="eccourse-updated_by">Updated By</label>
            <input type="text" class="form-control" value="<?php //echo $updated_by; ?>" readonly="">
        </div>
        -->
    </div>
</div>

