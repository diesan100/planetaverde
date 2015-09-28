<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\modules\cms\constants\CMSConstants;

/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\Lodge */
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

                <?= $form->field($model, 'description')->textarea(['maxlength' => 1200, 'rows'=>'8']) ?>

                <?= $form->field($model, 'notes')->textarea(['maxlength' => 2000, 'rows'=>'8']) ?>

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
                    $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
                    echo $form->field($model, 'state')->dropDownList($dataCat,['ID'=>'VALUE']);
                ?>
                
                <?php 
                    $dbData = \backend\modules\destinations\models\Area::find()->asArray()->all();
                    $dbData = ArrayHelper::merge([["-1"=>"NULL" , "name"=>"None"]], $dbData);
                    $data=ArrayHelper::map($dbData, 'id', 'name');
                    echo $form->field($model, 'area_id', ['labelOptions'=>['label' => 'Area']])->dropDownList($data,['id'=>'name']);
                ?>
                
                <?= $form->field($model, 'poll_rate')->textInput(['maxlength' => 2, 'readonly'=>true]) ?>
                
            </div>
        </div>
        

        <?= \common\modules\media\widgets\MediaSelectorModalWidget::widget(); ?>
        <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"img", "bootstrap_cols"=>"4"]); ?>
        
    </div>

<?php ActiveForm::end(); ?>


