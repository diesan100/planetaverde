<?php
use yii\helpers\Url;
use common\modules\media\models\CmsImages;

$this->title = $lodge->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destination'), 'url' => ['index']];
$route = $area->getAreaRoute(false);
foreach ($route as $r)
{
	array_push($this->params['breadcrumbs'], ['label'=>$r['name'], 'url'=> yii::$app->request->baseUrl. '/Destinations/'. $r['name']]);
}
?>

<div class="clearfix"></div>
<div class="spoggle">
    <a class="softArrow" href="#">
        <img src="<?= Yii::getAlias("@web") ?>/images/softArrowRight.png" alt=""/>
    </a>
    <p class="breadcrumb">
     <?php
       echo yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
    ?>
    </p>
     <ul class="sub_navigation">
        <li class="activa"><a href="javascript:showAreaInfo('lodge');">Information</a></li>
        <li><a href="javascript:showAreaInfo('news');">News</a></li>
        <li><a href="javascript:showAreaInfo('feedback');">Feedback</a></li>
        <li><a href="javascript:showAreaInfo('feedback');"><i class="fa fa-star"></i> Add to wishlist</a></li>
    </ul>
    <div class="spogglez"> 
        <div class="mapBox">
            <?php echo CmsImages::getImageTag($lodge->img, ['style'=>'width: 400px'])?>
        </div>
        <div class="contentBox">
            <div class='flexcroll'>
                <div class="content content-lodge">
                	<h1><?=$lodge->name?><span class="lost_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h1>
                	<p>
                		<?php echo $lodge->description?>
                	</p>
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
                
                <div class="content content-feedback" style="display: none">
                	<p class="heading1">Feedback</p>
                <?php foreach ($feedbacks as $f): ?>
                	<div class="noticBox">
		                <img class="left mr10" src="images/noimg.jpg" alt="" />
		                <div class="left sifi">
		                	<span class="star_rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
		                    <div class="clear"></div>
		            		<p class="smallHeadz">The views of the highest mountain in Malaysia is spectacular</p>
		                </div>
		            </div>
                <?php endforeach;?>
	                <div class="noticBox">
		                <img class="left mr10" src="images/noimg.jpg" alt="" />
		                <div class="left sifi">
		                	<span class="star_rating"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
		                    <div class="clear"></div>
		            		<textarea placeholder="Write a feedback" onfocus="this.placeholder = ''" onblur="this.placeholder = '_danos tu feedback'"></textarea>
		                </div>
		            </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showAreaInfo(param)
{
	$('.contentBox .content').hide();
	if(param == 'lodge')
		$('.content.content-lodge').show();
	else if(param == 'feedback')
		$('.content.content-feedback').show();
	else if(param == 'news')
		$('.content.content-news').show();
	fleXenv.updateScrollBars();
}
</script>