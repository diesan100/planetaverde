<?php 
$this->title = 'Destinations';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destination'), 'url' => ['index']];
?>
<div class="spoggle">
    <a class="softArrow" href="#">
        <img src="<?=Yii::getAlias("@web")?>/images/softArrowRight.png" alt="" />
    </a>
    
     <?php
       echo yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
    ?>
    
    <div class="spogglez"> 
        <div class="mapBox">
            <!--<a href="#">-->
            <!--
            <img class="mapthis" src="<?= Yii::getAlias("@web") ?>/images/mapToggle.jpg" alt="" />
            -->
            <?= frontend\widgets\MappedImageMapWidget::widget(["area" => $area]); ?>

            <!--</a>-->
        </div>
        <div class="map-handler">
            <div class="show-control" style="display:none;">show map</div>
            <div class="hide-control">hide map</div>
            
        </div>
        <div class="contentBox flexcroll">
            &nbsp;
            
                <h1>Destinations</h1>
                <ul>
                    <?php foreach ($areaListing as $key => $model): ?>
                        <li>
                            	<a href="<?=$model->url?>">
                            		<span class="subHead1"><?=$model->name?></span>
                            		<?php
                            			$route = $model->getAreaRoute(false);
                            			if(count($route) > 1) echo '<span class="smallHead1"> | '. $route[0]['name']. '</span>';
                            		?>
                            	</a>
                            <?php if ($key + 1 != count($areaListing)): ?>
                                <hr style="margin-top: 10px"/>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>
</div>
