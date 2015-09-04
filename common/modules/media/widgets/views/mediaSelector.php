<?php
use \yii\helpers\Html;
?>

<div class="panel panel-white">
    <div class="panel-heading border-dark">
        <h4 class="panel-title"><?= $model->attributeLabels()[$field]; ?></h4>
    </div>
    <div class="panel-body panel-white">
        <div class="mediaSelectorWrapper">
            <div class="media-selector-img-box">
                <?php if ($cmsImage != null) {
                    $showRemove = "inline";?>
                    <img id="img_<?=$field?>" src="<?= Yii::getAlias("@frontend_web"). "/". $cmsImage->URL ?>">
                <?php } else { 
                    $showRemove = "none";?>
                    <img id="img_<?=$field?>" src="" style="display: none;">
                <?php } ?>
            </div>
            <?= Html::activeHiddenInput($model, $field, ["id" => "hidden_".$field]) ;?>
            <?= Html::button(Yii::t('app', 'Select file...'), ["class"=>"btn btn-success", "onclick"=>"javascript:$('#field_img_name').val('".$field."');$('#modal-media-selector').modal('show');"]); ?>    
            <?= Html::button(Yii::t('app', 'Remove'), ["class"=>"btn btn-danger", "id"=>"unset_" . $field , "style"=>"display:".$showRemove, "onclick"=>"javascript:unsetFile('".$field."')"]); ?>    
        </div>
    </div>
</div>
