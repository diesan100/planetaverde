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
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
  
    <meta name="description" content="<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"meta-description"]); ?>"/>
    <meta name="keywords" content="<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"meta-words"]); ?>">
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
   
    <!-- Latest compiled and minified CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    -->
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="icon" href="<?= Yii::getAlias('@web')?>/logo.ico" type="image/x-icon">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400italic,300,300italic,400' rel='stylesheet' type='text/css'>
 
</head>
<body>
    
<?php $this->beginBody() ?>

<header id="header-nav">
    <div class="container">
        <div id="logo-div">
            <a href="<?= Yii::getAlias("@domain_url"); ?>"><img src="<?= Yii::getAlias('@web')?>/images/logo.png"></a>
        </div>
        <div id="header-options">
            <div class="menu_bar">
                <div class="bt-menu"><i class="fa fa-bars"></i></div>
            </div>
            <div id="header-menu">
                <ul class="menu">
                    <?= MenuWidget::widget(   ['section' => 'main-nav', 
                                       'current_item'=>$this->params['current_item'],
                                       'parent_current_item'=>$this->params['parent_current_item'],                                        
                                                ]) ?>
                    
                        <?php if (!Yii::$app->user->isGuest) {
                            //echo $this->render("components/user_menu");
                            echo \usersbackend\widgets\UsersbackendMenuWidget::widget(["isFront"=>true]);
                        } else { 
                            // No está logado
                            ?><li>
                            <!--<a href="<?= Yii::$app->urlManagerBackendEnd->createUrl("/site/login"); ?>"><?=Yii::t('app','Iniciar sesión')?></a>-->
                            <?= Html::a(Yii::t('app','Iniciar sesión'), Yii::getAlias("@frontend_web"));?>
                             </li>
                        <?php } ?>
                   
                    <?php if (Yii::$app->user->isGuest) { ?>
                             <li class="free">
                        <?= Html::a(Yii::t('app','Prueba gratis'), Yii::getAlias("@frontend_web") . "/site/free-signup", ["class"=>"btn-try-header"]);?>
                                 </li>
                    <?php } ?>
                </ul>
            </div>
            
        </div>
    </div>
</header>

  
<?php if (isset ($this->params['cms_page']->HEADER_IMAGE) && $this->params['cms_page']->HEADER_IMAGE != NULL) { ?>
<div class="background-image" style="background-image: url('<?=Yii::getAlias("@web")?>/<?php echo $this->params['cms_page']->getHEADERIMAGE()->one()->URL; ?>')">
    <div class="content container">
        <div id="full-intro-image" class="row">

            <!--div class="darker_overlay"></div-->
            <?php if (isset ($this->params['cms_page']->HEADER_TEXT) && $this->params['cms_page']->HEADER_TEXT != NULL) { ?>
            <div class="col-sm-12">
                <div class="centered">
                    <div class="logo2">
                        <img src="<?= Yii::getAlias('@web')?>/images/logo2.png">
                    </div>
                    <div class="header-img-frame">
                        <h4><?php echo $this->params['cms_page']->HEADER_TEXT; ?></h4>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if (isset ($this->params['cms_page']->HEADER_MASK) && $this->params['cms_page']->HEADER_MASK != NULL) { ?>
                <div class="mask_image_overlay"><img src="<?=Yii::getAlias("@web")?>/<?php echo $this->params['cms_page']->getHEADERMASK()->one()->URL; ?>"></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } else { ?>
<!--<div id="full-intro-image"></div>    -->
<?php } ?>

<?php if (isset ($this->params['cms_page']->INTRO_TEXT) && $this->params['cms_page']->INTRO_TEXT != NULL) { ?>
<div class="content container intro_page_text">
    <div class="col-sm-9">
        <h1><?= $this->params['cms_page']->INTRO_TEXT ?></h1>
    </div>
    <?php if (isset ($this->params['cms_page']->INTRO_IMAGE) && $this->params['cms_page']->INTRO_IMAGE != NULL) { ?>
    <div class="col-sm-3">
        <img src="<?=Yii::getAlias("@web")?>/<?php echo $this->params['cms_page']->getINTROIMAGE()->one()->URL; ?>">
    </div>
    <?php } ?> 
</div>
<?php } ?>  
   
   
<?php if (isset($this->params['cms_page']) && $this->params['cms_page']->WRAP_CONTENT ==  true ) { ?>
    <div class="content container" id="main-content">
        <div class="row">
<?php } ?>
    <?= $content; ?>    
<?php if (isset($this->params['cms_page']) && $this->params['cms_page']->WRAP_CONTENT ==  true ) { ?>
        </div>
    </div>
<?php } ?>
   

<div id="cookies_div">
    <div class="container">
        <div class="cookies_left">
            <h1><?=Yii::t('app','Política<br>de cookies')?></h1>
            <button type="boton" onclick="javascript:aceptar_cookies();" class="cookies_button"><?=Yii::t('app','Aceptar')?></button>
        </div>
        <div class="cookies_right">
            <div class="text">
                <?=Yii::t('app','Uso de Cookies: Utilizamos cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad relacionada con sus preferencias mediante el análisis de sus hábitos de navegación. Si continúa navegando, consideramos que acepta su uso. Puede obtener más información, o bien conocer cómo cambiar la configuración, en nuestra ') ?>
                <a href="<?= yii\helpers\Url::to(['/Política-de-cookies']); ?>"><?=Yii::t('app','Política de cookies')?></a>
            </div>
        </div>
    </div>
</div>




<?php $this->endBody() ?>
    
<!-- Latest compiled and minified JavaScript
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>

<script type="text/javascript">
    
 
    var k = 'myprojectt_cookiepolicy',
         v = 'accepted',
         p = $('#cookies_div');

    jQuery(function ($) {
         // Si no existe la cookie o no se ha aceptado la política de cookies,
         // mostramos el mensajito.
         if ($.cookie(k) !== v) {
             $('#cookies_div').show();
         }
    });

function aceptar_cookies(){
    // Ocultamos el mensaje.
    $('#cookies_div').hide();
    // Creamos la cookie.
    $.cookie(k, v, {expires: 365, path: '/'});
}

</script>


<?= SettingsParamWidget::widget(["group_name"=>"front-page", "param_name"=>"google-analytics"]); ?>

</body>
</html>

<?php $this->endPage() ?>