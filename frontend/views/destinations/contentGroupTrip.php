<?php
use yii\helpers\Url;
use common\modules\media\models\CmsImages;

$this->title = $trip->title;

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
        <li class="activa"><a href="javascript:showAreaInfo('summary');">Summary</a></li>
        <li><a href="javascript:showAreaInfo('itinerary');">Itinerary</a></li>
        <li><a href="javascript:showAreaInfo('dateprice');">Dates and Prices</a></li>
        <li><a href="javascript:showAreaInfo('accommodation');">Accommodations</a></li>
        <li><a href="javascript:showAreaInfo('feedback');">Extension program</a></li>
        <li><a href="javascript:showAreaInfo('feedback');">Request offer</a></li>
        <li><a href="javascript:showAreaInfo('feedback');"><i class="fa fa-star"></i> Add to wishlist</a></li>
        <li><a href="javascript:showAreaInfo('feedback');">Feedback</a></li>
    </ul>
    <div class="spogglez"> 
        <div class="mapBox">
            <?php echo CmsImages::getImageTag($trip->image, ['style'=>'width: 400px'])?>
        </div>
        <div class="contentBox">
            <div class='flexcroll'>
                <div class="content content-summary">
                	<p class="heading1"><?=$trip->title?><span class="lost_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></p>
                	<p class="smallHead1">
                		<?php echo $trip->description?>
                	</p>
                </div>
                <div class="content content-itinerary" style="display: none">
                	<p class="heading1">Itinerary</p>
                	<p class="smallHead1">
                		<?php echo $trip->itinerary?>
                	</p>
                </div>
                <div class="content content-dateprice" style="display: none">
                	<p class="heading1">Dates and Prices</p>
                	<p class="smallHead1">
                		<?php echo $trip->dateprice?>
                	</p>
                </div>
                <div class="content content-accommodation" style="display: none">
                	<p class="heading1">Accommodations</p>
                	<?php foreach ($trip->tripItems as $t):?>
                		<div class="noticBox">
                			<img class="left mr10" src="images/noimg.jpg" alt="" />
			                <div class="left sifi">
			                	<p class="subHead1">
			                		<?=$t->lodge->name?><span class="star_rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
			                	</p>
			                    <div class="clear"></div>
			            		<p class="smallHeadz"><?=$t->lodge->notes?></p>
			                </div>
                		</div>
                	<?php endforeach;?>
                </div>
                <div class="content content-feedback" style="display: none">
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
	if(param == 'summary')
		$('.content.content-summary').show();
	else if(param == 'feedback')
		$('.content.content-feedback').show();
	else if(param == 'itinerary')
		$('.content.content-itinerary').show();
	else if(param == 'dateprice')
		$('.content.content-dateprice').show();
	else if(param == 'accommodation')
		$('.content.content-accommodation').show();
	fleXenv.updateScrollBars();
}
</script>