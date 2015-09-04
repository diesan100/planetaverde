<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use common\modules\cms\models\CmsCategory;
use common\modules\cms\models\CmsPostContent;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\widgets\ContentObjectSelectWidget;
use common\modules\cms\models\CmsPage;

/* @var $this yii\web\View */
/* @var $model app\models\CmsPage */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin() ?>
    
    <div class="col-lg-8 col-md-7">
        <div class="panel panel-white">
            <div class="panel-heading border-dark">
		<h4 class="panel-title">Main parameters</h4>
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'TITLE')->textInput(['maxlength' => 255]) ?>
                
                
                
                <?php 
                    $dataCat=ArrayHelper::map(\common\modules\cms\models\CmsLayout::find()->asArray()->all(), 'ID', 'TITLE');
                    echo $form->field($model, 'LAYOUT')->dropDownList($dataCat,['ID'=>'TITLE']);
                ?>
                
        
                <?php 
                    $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_PAGE_TYPES , 'ID', 'VALUE');
                    echo $form->field($model, 'TYPE')->dropDownList($dataCat,['ID'=>'VALUE']);
                ?>

                
                <?php 
                /*
                    $dbData = CmsPostContent::find()->asArray()->all();
                    $dbData = ArrayHelper::merge([["-1"=>"NULL" , "TITLE"=>"None"]], $dbData);

                    $posts=ArrayHelper::map($dbData, 'ID', 'TITLE');
                    echo $form->field($model, 'CONTENT_ID')->dropDownList($posts,['ID'=>'TITLE']); 
                 * 
                 */
                ?>

                              
                <?php 
                /*
                    $dbData = CmsCategory::find()->asArray()->all();
                    $dbData = ArrayHelper::merge([["-1"=>"NULL" , "NAME"=>"None"]], $dbData);

                    $categories=ArrayHelper::map($dbData, 'ID', 'NAME');
                    echo $form->field($model, 'POST_CATEGORY')->dropDownList($categories,['ID'=>'NAME']); 
                 * */
                                   
                ?>
                
                <?= $form->field($model, 'HEADER_TEXT')->textarea()?>
                
                <?= $form->field($model, 'INTRO_TEXT')->textarea()?>

                <?= $form->field($model, 'CONTENT_ID', ['options'=>['style'=>'width: 10%; float: left']])->hiddenInput(['maxlength' => 255, 'readonly'=>true]); ?>                
                <?= ContentObjectSelectWidget::widget(["object_id"=>$model->CONTENT_ID, "type"=>$model->TYPE]); ?>  
                
                <!--
                <?= $form->field($model, 'URL')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'CONTROLLER')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'METHOD')->textInput(['maxlength' => 255]) ?>
                -->
            </div>
        </div>
        
        
    </div>
    <div class="col-lg-4 col-md-5">
        
        <?= \common\modules\cms\widgets\PublishingPaneWidget::widget(["model"=>$model, "form"=>$form]);?>
        
        <div class="panel panel-white">
            <div class="panel-heading border-dark">
		<h4 class="panel-title">Publishing parameters</h4>
            </div>
            <div class="panel-body">
                <?php 
                    $dbData = CmsPage::find()->asArray()->all();
                    $dbData = ArrayHelper::merge([["-1"=>"NULL" , "TITLE"=>"None"]], $dbData);
                    $data=ArrayHelper::map($dbData, 'ID', 'TITLE');
                    echo $form->field($model, 'PARENT_PAGE', ['labelOptions'=>['label' => 'Parent Page']])->dropDownList($data,['ID'=>'TITLE']);
                ?>
                
                <?php 
                    $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
                    echo $form->field($model, 'STATE')->dropDownList($dataCat,['ID'=>'VALUE']);
                ?>
                <?= $form->field($model, 'IS_HOME')->checkbox() ?> 
                <?= $form->field($model, 'SHOW_BREAD_CRUMBS')->checkbox() ?> 
                <?= $form->field($model, 'WRAP_CONTENT')->checkbox() ?> 
                
            </div>
        </div>
        

        <?= \common\modules\media\widgets\MediaSelectorModalWidget::widget(); ?>
        <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"HEADER_IMAGE", "bootstrap_cols"=>"4"]); ?>
        <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"HEADER_MASK", "bootstrap_cols"=>"4"]); ?>
        <?= \common\modules\media\widgets\MediaSelectorWidget::widget(["model"=>$model, "field"=>"INTRO_IMAGE", "bootstrap_cols"=>"4"]); ?>
        

        
    </div>


        
<?php ActiveForm::end(); ?>


<!--
<script>

jQuery(document).ready(function() {
    updateFields();
    
    function updateFields() {
        var selected  = $("#cmspage-type").find(":selected").val();
        console.log("selected: " + selected);
        
        // Internal page
        if(selected == "0") {
            console.log("simple post TYPE");
          $(".field-cmspage-post_category").hide();
             $(".field-cmspage-content_id").show();
        }
        // URL
        else if (selected == "1") {
            console.log("category TYPE");
             $(".field-cmspage-post_category").show();
            $(".field-cmspage-content_id").hide();
            
        }
        else {
            console.log("Unknown type");
        }
     
     
    }
    
    $( "#cmspage-type" ).change(function() {
        updateFields();
    });


});


</script>
-->