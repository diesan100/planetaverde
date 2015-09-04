<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\models\CmsMenuItem;
use common\models\CmsMenu;
use yii\helpers\Url;
use common\widgets\MenuWidget;
use kartik\widgets\ActiveForm;
use common\widgets\SettingsParamWidget;
use backend\modules\settings\models\Settings;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<!--<title>Planeta Verde | Passionate about nature</title>-->

<title><?= Html::encode($this->title) ?></title>
  
<meta name="description" content="<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"meta-description"]); ?>"/>
<meta name="keywords" content="<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"meta-words"]); ?>">
<?php $this->head() ?>
<?= Html::csrfMetaTags() ?>

<!--## css file ##-->
<link type="text/css" rel="stylesheet"  href="<?=Yii::getAlias("@web")?>/css/reset.css" media="all" />
<link type="text/css" rel="stylesheet"  href="<?=Yii::getAlias("@web")?>/css/style.css" media="screen" />
<!--<link rel='stylesheet prefetch' href='css/bootstrap.min.css'>-->
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
        <li><a href="#"><img src="<?=Yii::getAlias("@web")?>/images/carro.png" alt="" /></a></li>
        <li><a href="#" class="oddz"><input type="text" placeholder="search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" /><img src="<?=Yii::getAlias("@web")?>/images/search.png" alt="" /></a></li>
        <li><a href="#"><img src="<?=Yii::getAlias("@web")?>/images/facebook.png" alt="" /></a></li>
        <li><a href="#"><img src="<?=Yii::getAlias("@web")?>/images/login.png" alt="" /></a></li>
    </ul>
    
    <?= $content; ?>
    
    <!--
    <div class="spoggle">
        <a class="softArrow" href="#">
            <img src="<?=Yii::getAlias("@web")?>/images/softArrowRight.png" alt="" />
        </a>
        <div class="spogglez"> 
            <div class="mapBox">
                <a href="#"><img class="mapthis" src="<?=Yii::getAlias("@web")?>/images/mapToggle.jpg" alt="" /></a>
            </div>
            <div class="contentBox">
                <p class="heading1">How to use</p>
                <p class="heading4">Texto explicativo del uso del mapa.</p>
            </div>
        </div>
    </div>
    -->
    
    <!--
    <section class="filosofia">
	<div id='mycustomscroll' class='flexcroll'>
            <p class="bigtitle1">Filosofia</p>
            <p>Wir sind ein für Tierbeobachtung spezialisiertes Reiseunternehmen, das bezweckt, qualitativ hochwertige Naturreisen anzubieten.</p>
            <p>Die Authentizität der letzten großen Tierparadiese unseres Planeten näher zu bringen, ist was, uns zur Gründung dieses Unternehmens bewegte. Unser Ziel dabei: Reisen zu konzipieren, die eine lebensverändernde Wirkung auf Gäste haben.</p>
            <p>Dies mag etwas gewagt sein, aber wir wissen, dass es möglich ist. Und wir wissen auch, dass uns dieses Objektiv bei jeder
            neuen Reise mehr annähren.</p>
            <p>In diesen Seiten wollen wir Sie Hinter den Kulissen von Planeta Verde führen, damit Sie lernen, wer wir sind, was wir machen, wie
            wir denken und alles, was Sie bei uns erwarten können und das, was Sie nicht erwarten können. Wir hoffen, dass Sie am Ende
            der Lektüre besser wissen, ob wir die Veranstalter sind, denen Sie die Planung Ihrer Traumnaturreise anvertrauen wollen oder, ob
            Sie sich an jemanden anderen lieber wenden.</p>
            <p>Es erübrigt sich zu sagen, dass eine Truppe Tier- und Reiseliebhaber hinter Planeta Verde steckt. Uns verbindet eine gemeinsame Leidenschaft für Reisen in die Natur und die ständige Sorge, welchen bescheidenen Beitrag wir zu einer nachhaltigen</p>
            <p>Ein schneller Überblick unseres Reiseangebotes genügt, um zu merken, dass wir überwiegend Entwicklungsländer ins Programm aufgenommen haben. Die Gründe dafür liegen auf der Hand: Hier präsentiert sich die Natur häufig am Spektakulärsten.</p>
            <p>Aber auch hier ist diese am akutsten gefährdet. Für die meisten dieser Länder bedeuten die Erträge aus dem Ökotourismus die
            einzigen Mitteln, eine halbweg effektive Naturschutzpolitik auf die Beine zu stellen. Der Weg zum Bestehend bleiben und Ausdehnen der Naturschutzgebiete führt jedoch meistens an einer erzielten Verstärkung der Besucherzahlen nicht vorbei. Dies ist</p>
            <p>klar gut für die Wirtschaft. Aber was gut für die Wirtschaft ist, muss nicht unbedingt gut für die lokale Fauna sein. Die Lebensbedingungen der Tierwelt und die Qualität der Tierbeobachtung leiden immer mehr unter einer außer Kontrolle geratenen Politik</p>
            <p>der „je mehr Touristen, desto besser“. Dazu beigetragen hat die relativ neue geratene Mode des Ökotourismus mit seiner manchmal leichtsinnigen Klientel.
            Frühere unberührte Tierparadiese gleichen heutzutage einem bunten Zoo, wo man Jeeps in gleichen Zahlen wie wilde Tiere
            beobachten kann. Man denkt allein zum Beispiel an den Ngorongoro-Krater oder an die Nebelwälder Costa Ricas, die täglich von
            lauten Touristenscharen erobert werden.</p>
        </div>
    </section>
    -->

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
    <a href="#" class="copyright">Destino | &copy; Usuario</a>
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