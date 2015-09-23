<?php
$this->title = 'Destination';


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destination'), 'url' => ['index']];
?>
<div class="container breadcrumbs_custom">
    <div class="row">
<div class="col-md-12">    
    <?php
       echo yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
    ?>
</div>
        </div>
</div>
<div class="clearfix"></div>
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
                <h1>Destinos</h1>
                <ul>
                    <?php foreach ($areaListing as $key => $model): ?>
                        <li>
                            <h2>Destino <?php echo $key + 1; ?> | <?php echo $model->name; ?></h2>
                            <?php if ($key + 1 != count($areaListing)): ?>
                                <hr>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>