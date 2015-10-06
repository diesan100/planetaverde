<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;

use common\modules\cms\models\CmsCategory;
use common\modules\cms\constants\CMSConstants;
use common\modules\media\models\CmsImages;

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use common\models\User;

use backend\modules\destinations\models\Area;

/* @var $this yii\web\View */
/* @var $model app\models\CmsPostContent */
/* @var $form yii\widgets\ActiveForm */

if(!$model->isNewRecord) {
    $this->title = Yii::t('app', $model->TITLE);
}

?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

 <div class="col-lg-8 col-md-7">
    <div class="panel panel-white">
        <div class="panel-heading border-dark">
            <h4 class="panel-title"><?= Yii::t("app", "Main Parameters")?></h4>            
        </div>
        <div class="panel-body">
            <?= $form->field($model, 'TITLE')->textInput(['maxlength' => 255]) ?>
            <?php
            	$dataAreas = ArrayHelper::map(Area::find()->asArray()->all(), 'id', 'name');
            	array_unshift($dataAreas, 'None');
            	echo $form->field($model, 'area_id')->dropDownList($dataAreas);
            ?>
            <?= $form->field($model, 'PERMALINK')->textInput(['readonly' => true], ['maxlength' => 255]) ?>
            <?= $form->field($model, 'CONTENT')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'imageManagerJson' => \yii\helpers\Url::toRoute('/redactor/upload/imagejson'),
                    'imageUpload' => \yii\helpers\Url::toRoute('/redactor/upload/image'),
                    //'fileUpload' => \yii\helpers\Url::toRoute('/redactor/upload/file'),
                    'uploadUrl' => '',
                    'lang' => 'en_en',
                    'plugins' => ['fontcolor', 'imagemanager', 'fullscreen', 'html'],
                    //'buttons' =>['html', 'formatting', 'bold'],
                    //'source' => true,
                    'paragraphize'=> false,
                    'replaceDivs' => false,
                ]
            ])?>

            <?= $form->field($model, 'META_DATA')->textArea(['maxlength' => 255]) ?>

        </div>
    </div>
</div>    
     
<div class="col-lg-4 col-md-5">
    <div class="panel panel-orange">
        <div class="panel-heading border-dark">
            <h4 class="panel-title"><?= Yii::t("app", "Publishing")?></h4>
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <div class="panel-body panel-white">
            <?php 
                $dataCat=ArrayHelper::map(CmsCategory::find()->asArray()->all(), 'ID', 'TITLE');
                echo $form->field($model, 'CATEGORY')->dropDownList($dataCat,['ID'=>'TITLE']);
            ?>

            <?php 
                $dataStates=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
                echo $form->field($model, 'STATE')->dropDownList($dataStates,['ID'=>'VALUE']);
            ?>
            
            <?= $form->field($model, 'LAST_MODIFIED')->textInput(['readonly' => true]) ?>
            
            <?php
                $user = User::findOne(["ID"=>$model->MODIFIED_BY]);
                if($user != null)
                    $modified_by =  $user->getFullName();
                else 
                    $modified_by =  "not set";
            ?>
            
            <div class="form-group field-eccourse-updated_by">
                <label class="control-label" for="eccourse-updated_by">Modified By</label>
                <input type="text" class="form-control" value="<?= $modified_by; ?>" readonly="">
            </div>
            
            <?= $form->field($model, 'CREATION_DATE')->textInput(['readonly' => true]) ?>
            
            <?php
                $user = User::findOne(["ID"=>$model->OWNER]);
                if($user != null)
                    $user_name =  $user->getFullName();
                else 
                    $user_name =  "not set";
            ?>
             <div class="form-group field-eccourse-created_by">
                <label class="control-label" for="eccourse-created_by">Created By</label>
                <input type="text" class="form-control" value="<?= $user_name; ?>" readonly="">
            </div>
            <!-- $form->field($model, 'OWNER')->textInput(['readonly' => true]) -->
            <!-- $form->field($model, 'VERSION_ID')->textInput() -->


        </div>
    </div>
    
    <?= \common\modules\media\widgets\MediaSelectorModalWidget::widget(); ?>
    <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"FEATURED_IMG", "bootstrap_cols"=>"4"]); ?>
    
 </div>


     
<?php ActiveForm::end(); ?>

