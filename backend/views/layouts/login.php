<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $content string */


/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="<?= Yii::$app->language ?>" class="no-js">

<head>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/iCheck/skins/all.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/css/styles.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/css/styles-responsive.css">
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/iCheck/skins/all.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    
    <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="login bg_style_2">
    <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                    <div class="logo">
                        <img src="<?= Yii::getAlias('@web')?>/images/logo.png">
                    </div>
                    <!-- start: LOGIN BOX -->
                    <div class="box-login">
                        <h3><?=Yii::t("backend", "Login")?></h3>
                           
                           <?= $content ?>
                            
                            <!-- start: COPYRIGHT -->
                            <div class="copyright">                                
                                <?=Yii::t("backend", "2015 &copy; Planeta Verde.")?>
                            </div>
                            <!-- end: COPYRIGHT -->
                    </div>
                    <!-- end: LOGIN BOX -->
            </div>
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <!--[if lt IE 9]>
    <script src="rapido/assets/plugins/respond.min.js"></script>
    <script src="rapido/assets/plugins/excanvas.min.js"></script>
    <script type="text/javascript" src="rapido/assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
    <!--<![endif]-->
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/iCheck/jquery.icheck.min.js"></script>
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/jquery.transit/jquery.transit.js"></script>
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/js/main.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?= Yii::getAlias('@web')?>/rapido/assets/js/login.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
            jQuery(document).ready(function() {
                    Main.init();
                    Login.init();
            });
    </script>
	</body>
</html>
<?php $this->endPage() ?>

