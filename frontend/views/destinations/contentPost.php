<?php
use yii\helpers\Url;
use common\modules\media\models\CmsImages;

$this->title = $post->TITLE;

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
        <li class="activa"><a href="<?=$area->getUrl()?>">News</a></li>
    </ul>
    <div class="spogglez"> 
        <div class="mapBox">
            <?php echo CmsImages::getImageTag($post->FEATURED_IMG)?>
        </div>
        <div class="contentBox">
            <div class='flexcroll'>
                <h1><?=$post->TITLE?></h1>
                <p>
                	<?php echo $post->CONTENT?>
                </p>
            </div>
        </div>
    </div>
</div>