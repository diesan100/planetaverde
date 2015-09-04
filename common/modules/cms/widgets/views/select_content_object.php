<?php
use \yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::$app->view->registerJs('var urlLoadObjectSelector = "'. yii\helpers\Url::to(["//cms/site/objects-list"]).'";',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var csrfParam = "'. \yii::$app->request->csrfToken.'"',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var editPost = "'. Url::to(['//cms/cms-post-content/update',"id"=>"-id-"]).'"',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var editCat = "'. Url::to(['//cms/cms-category/update',"id"=>"-id-"]).'"',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var editCourse = "'. Url::to(['//lms/course-crud/update',"id"=>"-id-"]).'"',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var editCollege = "'. Url::to(['//lms/college-crud/update',"id"=>"-id-"]).'"',  \yii\web\View::POS_END);
?>


<div style="display:inline-block; margin-bottom: 10px; width: 100%;">
    
<?=Html::textInput("show_object", $value, ["id"=>"show_object", "class"=>"form-control", "style"=>"width: 65%;float: left; margin-right: 10px;", "readonly"=>'true'] );?>

<?= Html::a("Select...", "#",["id"=>"selec_object_combo", 'class' => 'btn btn-success', "onclick"=>"javascript:$('#object-content-selector').modal('show');"]) ?>

<?php 
if($value=!null && $value!="") {
    echo Html::a("Edit content...", "#",["id"=>"edit-content-button",'class' => 'btn btn-success', "style"=>"margin-left: 10px;"]);
} else{        
   echo Html::a("Edit content...", "#",["id"=>"edit-content-button",'class' => 'btn btn-success', "style"=>"margin-left: 10px;", "disabled"=>true]);
}    
?>

</div>
<?php
Modal::begin([
    'header'=>'<h4 style="color: #487d29;"><strong>'.Yii::t('app', 'Set Content').'</strong></h4>',
    'id'=>'object-content-selector',
    'size'=>'modal-lg',
]); ?>

<div id="loading_modal_div_1"> 
    Loading...
</div>

<?php
Modal::end();
?>

