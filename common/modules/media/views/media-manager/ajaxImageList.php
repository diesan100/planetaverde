<?php
use kartik\grid\GridView;
// \common\modules\media\MediaManagerModuleAsset::register($this);
?>


<ul class="modal_image_gallery">
<?php 
foreach ($dataProvider->getModels() as $key => $image) {
    ?>
    <li>
        <div class='gallery-thumbnail small clicable' data-id="<?=$image->ID?>"><img class=""  src="<?= Yii::getAlias("@frontend_web"). "/" . $image->URL; ?>"></div>
    </li>
<?php
}
?>
</ul>