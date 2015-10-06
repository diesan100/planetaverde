<?php
use yii\helpers\Url;
use common\modules\media\models\CmsImages;

$this->title = 'Destination';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destination'), 'url' => ['index']];
$route = $area->getAreaRoute(false);
foreach ($route as $r)
{
	array_push($this->params['breadcrumbs'], ['label'=>$r['name'], 'url'=> $r['name']]);
}
?>

<div class="clearfix"></div>
<div class="spoggle">
    <a class="softArrow" href="#">
        <img src="<?= Yii::getAlias("@web") ?>/images/softArrowRight.png" alt="" />
    </a>
    <p class="breadcrumb">
     <?php
       echo yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
    ?>
    </p>
     <ul class="sub_navigation">
        <li class="activa"><a href="javascript:showAreaInfo('info')">Information</a></li>
        <?php if(isset($news) && count($news)) echo '<li><a href="javascript:showAreaInfo(\'news\')"">News</a></li>'; ?>
        <?php if(isset($trips) && count($trips)) echo '<li><a href="javascript:showAreaInfo(\'gt\')"">Group Trips</a></li>'; ?>
        <?php if(isset($lodges) && count($lodges)) echo '<li><a href="javascript:showAreaInfo(\'lodge\')"">Lodges</a></li>'; ?>
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
                
                <div class="content content-info">
                	<p class="heading1">About <?=$area->name?></p>
                	<p class="smallHead1"><?php echo $area->description ?></p>
                </div>
                
                <div class="content content-news" style="display: none">
                	<p class="heading1">News</p>
                <?php foreach ($news as $t): ?>
                	<div class="noticBox">
                		<?php echo CmsImages::getImageTag($t->FEATURED_IMG, ['class'=>'left mr10', 'style'=>'width: 60px'])?>
                		<div class="left sifi">
                			<p class="subHead1"><?=$t->TITLE?></a></p>
            				<p class="smallHead1">
            					<?=substr($t->CONTENT, 0, 100)?>
                				<a href="<?=Url::to(['destinations/index', 'area_name'=>$area->name, 'ptype'=>'news', 'pid'=>$t->ID])?>">[Read more]</a>
            				</p>
                		</div>
            		</div>
                <?php endforeach;?>
                </div>
                
                <div class="content content-lodge" style="display: none">
                	<p class="heading1">Lodges</p>
                <?php foreach ($lodges as $t): ?>
                	<div class="noticBox">
                		<div class="left sifi">
                			<p class="subHead1"><a href="<?=Url::to(['destinations/index', 'area_name'=>$area->name, 'ptype'=>'lodge', 'pid'=>$t->id])?>"><?=$t->name?></a></p>
            				<p class="smallHead1"><?=$t->notes?></p>
                		</div>
            		</div>
                <?php endforeach;?>
                </div>
                
                <div class="content content-trip" style="display: none">
                	<p class="heading1">Group Trips</p>
                <?php foreach ($trips as $t): ?>
                	<div class="noticBox">
                		<div class="left sifi">
                			<p class="subHead1"><a href="<?=Url::to(['destinations/index', 'area_name'=>$area->name, 'ptype'=>'gt', 'pid'=>$t->id])?>"><?=$t->title?></a></p>
            				<p class="smallHead1"><?=$t->subtitle?></p>
                		</div>
            		</div>
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
	else if(param == 'gt')
		$('.content.content-trip').show();
	fleXenv.updateScrollBars();
}
</script>