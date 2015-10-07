<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\MenuWidget;
use common\widgets\SettingsParamWidget;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
<link rel="icon" href="<?=Yii::getAlias("@web");?>/images/favicon.ico" type="image/x-icon">

<!--<title>Planeta Verde | Passionate about nature</title>-->

<title><?= Html::encode($this->title) ?></title>
  
<meta name="description" content="<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"meta-description"]); ?>"/>
<meta name="keywords" content="<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"meta-words"]); ?>">
<?php $this->head() ?>
<?= Html::csrfMetaTags() ?>

<!--## css file ##-->
<link type="text/css" rel="stylesheet"  href="<?=Yii::getAlias("@web")?>/css/reset.css" media="all" />
<link type="text/css" rel="stylesheet"  href="<?=Yii::getAlias("@web")?>/css/style.css" media="screen" />
<link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="<?=Yii::getAlias("@web")?>/css/style.min.css" />

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->

</head>
    
<?php $this->beginBody() ?>
<section class="mainWrap o-wrapper" id="o-wrapper">

    <a href="<?=Yii::getAlias("@web")?>" class="logo"><img src="<?=Yii::getAlias("@web")?>/images/logo.png" alt="logo" /></a>

    <a id="c-button--slide-left" class="menu-link" href="#"><i class="fa fa-bars"></i></a>

    <ul class="navigation">
        <?= MenuWidget::widget(   ['section' => 'main-nav', 
                                    'current_item'=>$this->params['current_item'],
                                    'parent_current_item'=>$this->params['parent_current_item'],                                        
                                             ]) 
        ?>
    </ul>

    <ul class="login">
        <li><a href="<?=  Url::to(["/Wishlist"]); ?> "><img src="<?=Yii::getAlias("@web")?>/images/wishlist.png" alt="" /></a></li>
        <li><a href="#" class="oddz"><input type="text" placeholder="search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" /><img src="<?=Yii::getAlias("@web")?>/images/search.png" alt="" /></a></li>
        <li><a target="blank" href="<?= backend\modules\settings\models\Settings::getParamValue("front-page", "facebook-link");?> "><img src="<?=Yii::getAlias("@web")?>/images/facebook.png" alt="" /></a></li>
        
        <li class="">
            <?php 
                if(Yii::$app->user->isGuest) { ?>
                    <a href="<?= yii\helpers\Url::to(["site/signup"]); ?>"><img src="<?=Yii::getAlias("@web")?>/images/login.png" alt="" /></a>
                <?php } else { ?>
                    <a data-method="post" style="float:right" href="<?= Url::to(["/logout"]); ?>" data-method="post"><img src="<?=Yii::getAlias("@web")?>/images/logout.png" alt="logout" /></a>
                    <a href="<?= Url::to(["/user-profile/index"]); ?>" class="goto-user-link"><?=Yii::$app->user->identity->email;?></a>
                    <a  style="float:right"><img src="<?=Yii::getAlias("@web")?>/images/user.png" alt="" /></a>
                <?php } ?>
                        
        </li>
        
    </ul>
    
    <?= $content; ?>
    
</section>
<!--  mobile menu  -->
<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
  <button class="c-menu__close">Close <i class="fa fa-times-circle"></i></button>
  <ul class="c-menu__items">
    <li class="c-menu__item"><a href="#" class="c-menu__link">Home</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Destinos</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Sobre nosotros</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Wishlist</a></li>
    <li class="c-menu__item"><a href="#" class="c-menu__link">Contacto</a></li>
  </ul>
  <div class="miniLogo"><img src="<?=Yii::getAlias("@web")?>/images/logoMain.png" alt="" /></div>
</nav>
<div id="c-mask" class="c-mask"></div><!-- /c-mask -->
<!--  mobile menu  -->

<!--  background slider  -->
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active index item"><div class="slide-pattern"></div></div>
    <div class="item index"><div class="slide-pattern"></div></div>
    <div class="item index"><div class="slide-pattern"></div></div>
  </div>
  <!-- Carousel nav -->
  <div class="mirchiBox">
  	<a class="carousel-control left" href="#carousel" data-slide="prev"><img src="<?=Yii::getAlias("@web")?>/images/softArrowLeft.png" alt="" /></a>
    <span class="copyright">Destination | &copy; User</span>
    <a class="carousel-control right" href="#carousel" data-slide="next"><img src="<?=Yii::getAlias("@web")?>/images/softArrowRight.png" alt="" /></a>
  </div>
  <p class="pluto">Impressum | AGBs</p>
</div>
<!--  background slider  -->

<!--
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.js'></script>
-->

<!-- menus script -->



<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>