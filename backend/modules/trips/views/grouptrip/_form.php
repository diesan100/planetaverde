<?php

use backend\modules\trips\models\GroupTrip;
use backend\modules\trips\models\GroupTripItem;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\modules\cms\constants\CMSConstants;

/* @var $this yii\web\View */
/* @var $model backend\modules\trips\models\GroupTrip */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

	<div class="col-lg-8 col-md-7">
        <div class="panel panel-white">
            <div class="panel-heading border-dark">
		<h4 class="panel-title">Main parameters</h4>
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'title')->textInput(['maxlength' => 50]) ?>

			    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => 150]) ?>
	
    			<?= $form->field($model, 'trip_type')->dropDownList(GroupTrip::$TRIP_TYPES) ?>
			
			    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			
			    <?= $form->field($model, 'itinerary')->textarea(['rows' => 4]) ?>
			
			    <?= $form->field($model, 'dateprice')->textarea(['rows' => 5]) ?>
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
                    echo $form->field($model, 'area_id', ['labelOptions'=>['label' => 'Area']])->dropDownList($data,['id'=>'name']);
                ?>
                
                <?= $form->field($model, 'flight_arrival')->textInput(['maxlength' => 200]) ?>

    			<?= $form->field($model, 'flight_return')->textInput(['maxlength' => 200]) ?>
    			
                <?php 
                    $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
                    echo $form->field($model, 'state')->dropDownList($dataCat,['ID'=>'VALUE']);
                ?>
                
                <?= $form->field($model, 'poll_rate')->textInput(['maxlength' => 2, 'readonly'=>true]) ?>
                
            </div>
        </div>
        
        <?= \common\modules\media\widgets\MediaSelectorModalWidget::widget(); ?>
        <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"image", "bootstrap_cols"=>"4"]); ?>
        
    </div>
<?php ActiveForm::end(); ?>

