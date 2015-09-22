<div class="spoggle">
    <a class="softArrow" href="#">
        <img src="<?=Yii::getAlias("@web")?>/images/softArrowRight.png" alt="" />
    </a>
    <div class="spogglez"> 
        <div class="mapBox">
            <!--<a href="#"><img class="mapthis" src="<?=Yii::getAlias("@web")?>/images/mapToggle.jpg" alt="" /></a>-->
            <?= frontend\widgets\MappedImageMapWidget::widget(["area"=>$area]);?>
        </div>
        <div class="contentBox">
             <div class='flexcroll'>
                <h1><?= $title ?></h1>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>