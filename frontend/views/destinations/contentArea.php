<?php $this->title = 'Destination'; ?>
<div class="spoggle">
    <a class="softArrow" href="#">
        <img src="<?= Yii::getAlias("@web") ?>/images/softArrowRight.png" alt="" />
    </a>
    <div class="spogglez"> 
        <div class="mapBox">
            <!--<a href="#">-->
            <!--
            <img class="mapthis" src="<?= Yii::getAlias("@web") ?>/images/mapToggle.jpg" alt="" />
            -->
            <?= frontend\widgets\MappedImageMapWidget::widget(["area" => $area]); ?>

            <!--</a>-->
        </div>
        <div class="contentBox">
            <div class='flexcroll'>
                <!--<h1><?php // $title  ?></h1>-->
                <?php // $content ?>
                <h1>Continents</h1>
                <ul>
                    <?php foreach ($areaListing as $model): ?>
                        <li><?php echo $model->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>