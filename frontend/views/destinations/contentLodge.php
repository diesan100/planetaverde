<?php
use yii\helpers\Url;
use common\modules\media\models\CmsImages;

$this->title = $lodge->name;

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
        <li><a href="<?=$area->getUrl()?>">Information</a></li>
        <li class="activa"><a href="javascript:showAreaInfo('lodge');">Lodges</a></li>
        <li><a href="javascript:showAreaInfo('feedback');">Feedback</a></li>
        <li><a href="javascript:showAreaInfo('feedback');"><i class="fa fa-star"></i> Add to wishlist</a></li>
    </ul>
    <div class="spogglez"> 
        <div class="mapBox">
            <?php echo CmsImages::getImageTag($lodge->img)?>
        </div>
        <div class="contentBox">
            <div class='flexcroll'>
                <div class="content content-lodge">
                	<h1><?=$lodge->name?><span class="lost_star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h1>
                	<p>
                		<?php echo $lodge->description?>
                	</p>
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
	if(param == 'lodge')
		$('.content.content-lodge').show();
	else if(param == 'feedback')
		$('.content.content-feedback').show();
	fleXenv.updateScrollBars();
}
</script>