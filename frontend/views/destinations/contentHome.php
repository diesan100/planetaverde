<?php 
$this->title = 'Destinations';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destination'), 'url' => ['index']];
?>
<div class="spoggle">
    <a class="softArrow" href="#">
        <img src="<?=Yii::getAlias("@web")?>/images/softArrowRight.png" alt="" />
    </a>
    <p class="breadcrumb">
     <?php
       echo yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
    ?>
    </p>
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
                <h1>Destinations</h1>
                <ul>
                    <?php foreach ($areaListing as $key => $model): ?>
                        <li>
                            <h2>
                            	Destination <?php echo $key + 1; ?> | 
                            	<a href="<?=$model->url?>"><?=$model->name?></a>
                            </h2>
                            <?php if ($key + 1 != count($areaListing)): ?>
                                <hr>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>
</div>