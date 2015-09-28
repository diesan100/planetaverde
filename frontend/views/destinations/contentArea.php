<?php
$this->title = 'Destination';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destination'), 'url' => ['index']];
$route = $area->getAreaRoute(false);
foreach ($route as $r)
{
	array_push($this->params['breadcrumbs'], ['label'=>$r['name'], 'url'=> $r['id']]);
}
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
     <ul class="sub_navigation">
        <li><a href="javascript:showAreaInfo('info')">Information</a></li>
        <li><a href="javascript:showAreaInfo('news')"">News</a></li>
        <li><a href="javascript:showAreaInfo('gt')"">Group Trips</a></li>
        <li><a href="javascript:showAreaInfo('lodge')"">Lodges</a></li>
        <li><a href="javascript:showAreaInfo('feedback')"">Feedback</a></li>
    </ul>
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
                <div class="content content-info" style="display: none">
                	<h1>About <?=$area->name?></h1>
                	<?php echo $area->description ?>
                </div>
                <div class="content content-news" style="display: none">
                <?php foreach ($news as $t): ?>
                	<h2><?=$t->TITLE?></h2>
                	<p><?=$t->CONTENT?></p>
                <?php endforeach;?>
                </div>
                <div class="content content-lodge" style="display: none">
                <?php foreach ($lodges as $t): ?>
                	<h2><?=$t->name?></h2>
                	<p><?=$t->description?></p>
                <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showAreaInfo(param)
{
	$('.contentBox .content').hide();
	if(param == 'info')
		$('.content.content-info').show();
	else if(param == 'news')
		$('.content.content-news').show();
	else if(param == 'lodge')
		$('.content.content-lodge').show();
	fleXenv.updateScrollBars();
}
</script>