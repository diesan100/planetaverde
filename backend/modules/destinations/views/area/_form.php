<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\cms\constants\CMSConstants;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-8 col-md-7">
        <div class="panel panel-white">
            <div class="panel-heading border-dark">
		<h4 class="panel-title">Main parameters</h4>
            </div>
            <div class="panel-body">
                
                <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'description')->textarea(['maxlength' => 1200, 'rows' => 8]) ?>
                
                <?= $form->field($model, 'featured')->checkbox(['class'=>'cbr']) ?>

                <?= $form->field($model, 'coords_in_parent')->textarea(['maxlength' => 2000, 'rows' => 8]) ?>

                <h4>Coordenates Example</h4>
                <p style="">
                    <i>                                            
                        111,171,
                        115,191,
                        118,211,
                        119,246,
                        125,234,
                        135,217,
                        144,202,
                        150,188,
                        154,179,
                        142,174,
                        136,164,
                        124,158,
                        112,160
                    </i>             
                </p>

            </div>
        </div>
        
        
    </div>
    <div class="col-lg-4 col-md-5">
        
        <!-- \common\modules\cms\widgets\PublishingPaneWidget::widget(["model"=>$model, "form"=>$form]);?>-->
        
        <div class="panel panel-white">
            <div class="panel-heading border-dark">
		<h4 class="panel-title">Publishing parameters</h4> <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary pull-right']) ?>
            </div>
            <div class="panel-body">
                <?php 
                    $dbData = \backend\modules\destinations\models\Area::find()->asArray()->all();
                    $dbData = ArrayHelper::merge([["-1"=>"NULL" , "name"=>"None"]], $dbData);
                    $data=ArrayHelper::map($dbData, 'id', 'name');
                    echo $form->field($model, 'parent', ['labelOptions'=>['label' => 'Parent Area']])->dropDownList($data,['id'=>'name']);
                ?>
                
                <?php 
                    $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
                    echo $form->field($model, 'state')->dropDownList($dataCat,['ID'=>'VALUE']);
                ?>
                
                 <?php 
                    $dataCat=ArrayHelper::toArray(common\constants\PVConstants::$AREA_TYPES , 'id', 'value');
                    echo $form->field($model, 'type')->dropDownList($dataCat,['id'=>'value']);
                ?>
            </div>
        </div>
        

        <?= \common\modules\media\widgets\MediaSelectorModalWidget::widget(); ?>
        <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"map_image", "bootstrap_cols"=>"4"]); ?>
        
    </div>
<?php ActiveForm::end(); ?>


