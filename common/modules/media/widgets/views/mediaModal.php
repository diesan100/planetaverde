<?php
use \yii\helpers\Html;
use yii\bootstrap\Modal;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::$app->view->registerJs('var urlLoadModalImages = "'. yii\helpers\Url::to(["//media/media-manager/ajax-image-list"]).'";',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var urlLoadImageData = "'. yii\helpers\Url::to(["//media/media-manager/load-image-data", "id"=>"-id-"]).'";',  \yii\web\View::POS_END);
Yii::$app->view->registerJs('var csrfParam = "'. \yii::$app->request->csrfToken.'"',  \yii\web\View::POS_END);
?>

<?php
Modal::begin([
    'header'=>'<h4 style="color: #487d29;"><strong>'.Yii::t('app', 'Set Image').'</strong></h4>',
    'id'=>'modal-media-selector',
    'size'=>'modal-lg',
]); ?>

<input type="hidden" id="field_img_name">
<div class="tabbable">
        <ul id="myTab2" class="nav nav-tabs">
                <li class="">
                    <a href="#tab_upload" data-toggle="tab">
                            Uplolad Files
                    </a>
                </li>
                <li class="active">
                    <a href="#tab_list" data-toggle="tab">
                            Media Library
                    </a>
                </li>
                
        </ul>
        <div class="tab-content">
                <div class="tab-pane fade" id="tab_upload">
                     <p>
                         <?php
                           $csrfToken = \Yii::$app->request->getCsrfToken();
                            echo \kato\DropZone::widget([ 
                                'options' => [
                                    // Url::to(['//lms/course-crud/index'])
                                    'url' => \Yii::$app->getUrlManager()->createUrl(['//media/media-upload-content/upload']) 
                                    ],
                                    'clientEvents' => [
                                        'sending' => "function(file, xhr, formData) { "
                                            . "formData.append('_csrf', '{$csrfToken}'); "                                            
                                        . "}",
                                        'removedfile' => "function(file){fileRemoved(file)}",
                                        'success' => "function(file, response){fileCompleted(response);}"
                                    ]       
                                ]);
                        ?>
                    </p>
                </div>
            
                <div class="tab-pane fade active in" id="tab_list" style="padding: 0px;">
                    <div class="images_panel_wrapper">
                        <div class="images_panel_left">
                            <div id='loading_modal_div'><i class='fa fa-circle-o-notch fa-spin fa-3x'></i></div>                    
                        </div>
                        <div class="images_panel_right">
                        </div>
                    </div>
                    <div class="images_selector_footer">
                        <?= Html::button(Yii::t('app', 'Select'), ["id"=>"selectImageButton", "class"=>"btn btn-success disabled", "onclick"=>"javascript:setThisImage('".$field."');"]); ?>
                    </div>
                </div>
                
        </div>
</div>
<?php
Modal::end();
?>

