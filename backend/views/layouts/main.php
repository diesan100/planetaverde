<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register ( $this );

if (isset($this->params['no_wrapp']) && $this->params['no_wrapp']) {
    $wrapp_content = false;
} else {
    $wrapp_content = true;
}
$profilePicUrl = Yii::$app->user->identity->picture_url;
if($profilePicUrl == null || $profilePicUrl == "") {
    $profilePicUrl = Yii::getAlias('@web') . "/images/user-4.png";
} else {
    $profilePicUrl = Yii::getAlias("@frontend_web") . $profilePicUrl . "?" . rand(10,100);
}

$module_id = "";
try {
    $module_id = Yii::$app->controller->module->id;
} catch (Exception $ex) {}   
?>

<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
<meta charset="UTF-8">

<meta name="viewport"
	content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="icon" href="<?= Yii::getAlias('@web')?>/imago_bw.ico" type="image/x-icon">  
        <?= Html::csrfMetaTags()?>
	    <title><?= Html::encode($this->title) ?></title>
	    <?php $this->head()?>

<link href="<?= Yii::getAlias('@web')?>/rapido/assets/css/plugins.css" rel="stylesheet">
<link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/css/themes/theme-default.css" type="text/css" id="skin_color">
<!--<link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/css/themes/theme-style9.css" type="text/css" id="skin_color">-->

<link rel="stylesheet" href="<?= Yii::getAlias('@web')?>/rapido/assets/css/print.css" type="text/css" media="print">

</head>


<!-- start: BODY -->
<body class="horizontal-menu-fixed">
<!--<?php $this->beginBody(["options"=>["class"=>"horizontal-menu-fixed"]])?>-->
<!-- start: SLIDING BAR (SB) -->

<div class="main-wrapper">
	<!-- start: TOPBAR -->
	<header class="topbar navbar navbar-inverse navbar-fixed-top inner" style="background-image: none !important;">
		<!-- start: TOPBAR CONTAINER -->
		<div class="container">
			<div class="navbar-header">
				<a class="sb-toggle-left hidden-md hidden-lg" href="#main-navbar"> <i
					class="fa fa-bars"></i>
				</a>
				<!-- start: LOGO -->
                                <a class="navbar-brand" href="<?=Yii::getAlias("@web");?>">                                     
                                    <img style="margin-top: 2px; height: 29px;" src="<?= Yii::getAlias('@web')?>/images/logo_horiz.png" alt="Planeta Verde Admin Page">                                    
				</a>
				<!-- end: LOGO -->
			</div>
			<div class="topbar-tools">
				<!-- start: TOP NAVIGATION MENU -->
                        <ul class="nav navbar-right">
                            <!-- start: USER DROPDOWN -->
                            
                            <?= $this->render("menus/user-drop-down", ["profilePicUrl"=>$profilePicUrl]); ?>
                            <!-- end: USER DROPDOWN -->
                            
                            <!--
                            <li class="right-menu-toggle">
                                <a href="#" class="sb-toggle-right">
                                    <i class="fa fa-globe toggle-icon"></i> <i class="fa fa-caret-right"></i> <span class="notifications-count badge badge-default animated bounceIn"> 3</span>
                                </a>
                            </li>
                            -->
                        </ul>
                        <!-- end: TOP NAVIGATION MENU -->
			</div>
		</div>
		<!-- end: TOPBAR CONTAINER -->
	</header>
	<!-- end: TOPBAR -->
	<!-- start: HORIZONTAL MENU -->
	<div id="horizontal-menu" class="navbar navbar-inverse hidden-sm hidden-xs inner">
            <div class="container">
                <div class="navbar-collapse">
                    <?= $this->render("menus/main-header-menu"); ?>
                </div>
                <!--/.nav-collapse -->
            </div>
	</div>
	<!-- end: HORIZONTAL MENU -->
	<!-- start: PAGESLIDE LEFT -->
	<a class="closedbar inner hidden-sm hidden-xs" href="#" style="bottom: 1px;"> </a>
	<nav id="pageslide-left" class="pageslide inner">
		<div class="navbar-content" style="height: 348px;">
			<!-- start: SIDEBAR -->
			<div
				class="main-navigation left-wrapper transition-left ps-container"
				style="height: 298px;">
				<div class="navigation-toggler hidden-sm hidden-xs">
					<a href="#main-navbar" class="sb-toggle-left"> </a>
				</div>
				<div class="user-profile border-top padding-horizontal-10 block">
                                    
                                    <?php
                                    $module_pic = "imago_50_50.png";
                                    
                                    if ($module_id=="cms" || $module_id=="media" ) {
                                        $module_title = "CMS";
                                        $module_subtitle = "Front End";                                        
                                    } else if ($module_id=="users") {
                                        $module_title = "Users";
                                        $module_subtitle = "Managment";
                                    } else if ($module_id=="dashboard") {
                                       $module_title = "Planeta Verde";
                                        $module_subtitle = "Dashboard";
                                    } else if ($module_id=="billing") {
                                       $module_title = "Facturación";
                                        $module_subtitle = "Planeta Verde";                                    
                                    }   else {
                                        $module_title = "Dashboard";
                                        $module_subtitle = "Planeta Verde";
                                    }
                                    ?>
                                    
					<div class="inline-block">
                                            
                                            <img id="profile-img-sidebar----" src="<?= Yii::getAlias("@web")?>/images/<?=$module_pic;?>" alt="">
					</div>
					<div class="inline-block">
						<h5 class="no-margin"><?=$module_title;?></h5>
						<h4 class="no-margin"><?=$module_subtitle;?></h4>
                                                <!--
						<a class="btn user-options sb_toggle"> <i class="fa fa-cog"></i>
						</a>
                                                -->
					</div>
				</div>
				<!-- start: MAIN NAVIGATION MENU -->
				<ul class="main-navigation-menu core-menu hidden-md hidden-lg">
					<li class="active open"><a
						href="/myprojectt/backend/web/index.php?r=cms-site%2Findex"> Front
							Site CMS </a></li>
					<li><a href="#"> Learning Managment System </a></li>
					<li><a href="#"> Billing </a></li>
				</ul>
				<ul class="main-navigation-menu">
                                    <?php
                                    $module_id = "";
                                    try {
                                        $module_id = Yii::$app->controller->module->id;
                                    } catch (Exception $ex) {}                                    
                                    
                                    if ($module_id=="cms") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-cms.php');                                    
                                    } else if ($module_id=="users") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-users.php');                                    
                                    } else if ($module_id=="dashboard") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-dashboard.php');
                                    } else if ($module_id=="billing") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-billing.php');
                                    } else if ($module_id=="settings") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-settings.php');
                                    } else if ($module_id=="destinations") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-destinations.php');
                                    } else if ($module_id=="trips") {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-trips.php');
                                    } else {
                                        include (dirname(__FILE__).'/menus/sidebar-menu-dashboard.php');
                                    }
                                    
                                    ?>
				</ul>
				<!-- end: MAIN NAVIGATION MENU -->
				<div class="ps-scrollbar-x-rail"
					style="left: 0px; bottom: 3px; width: 260px; display: none;">
					<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps-scrollbar-y-rail"
					style="top: 0px; right: 3px; height: 298px; display: inherit;">
					<div class="ps-scrollbar-y" style="top: 0px; height: 152px;"></div>
				</div>
			</div>
			<!-- end: SIDEBAR -->
		</div>
		<div class="slide-tools">
                    
			<div class="col-xs-6 text-left no-padding">
				<a class="btn btn-sm status" href="#"> Status <i
					class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
				</a>
			</div>
			<div class="col-xs-6 text-right no-padding">
                                <a class="btn btn-sm log-out text-right" href="<?= yii\helpers\Url::to(['//site/logout']); ?>" data-method="post">
                                    <i class="fa fa-power-off"></i> Salir
				</a>
			</div>
		</div>
	</nav>
	<!-- end: PAGESLIDE LEFT -->
	
        <?php //echo $this->render("components/rightSliderSidebar"); ?>
        
	<!-- start: MAIN CONTAINER -->
	<div class="main-container inner">
		<!-- start: PAGE -->
		<div class="main-content" style="min-height: 258px;">
			<!-- start: PANEL CONFIGURATION MODAL FORM -->
			<div class="modal fade" id="panel-config" tabindex="-1" role="dialog"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">�</button>
							<h4 class="modal-title">Panel Configuration</h4>
						</div>
						<div class="modal-body">Here will be a configuration form</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- end: SPANEL CONFIGURATION MODAL FORM -->
			<div class="container">
				<!-- start: PAGE HEADER -->
				<!-- start: TOOLBAR -->
				<div class="toolbar row">
					<div class="col-sm-12 hidden-xs">
						<div class="page-header">
							<h1>
                                                            <?= Html::encode($this->title) ?> 
                                                            <small>
                                                                <?php
                                                                if ($module_id=="cms" || $module_id=="media" ) {
                                                                    echo "Frontend Content Management System";
                                                                } else if ($module_id=="users") {
                                                                    echo "Gestión de usuarios";
                                                                } else if ($module_id=="dashboard") {
                                                                    echo "Dashboard";
                                                                } else if ($module_id=="lms") {
                                                                    echo "Learning Management System";
                                                                } else if ($module_id=="explorer") {
                                                                    echo "Gestión del Explorador";
                                                                } else if ($module_id=="promos") {
                                                                    echo "Gestión de Códigos Promocionales";
                                                                } else if ($module_id=="billing") {
                                                                    echo "Gestión de Pagos y Facturación";
                                                                } else if ($module_id=="planes") {
                                                                    echo "Gestión de Planes de Suscripción";
                                                                } else if ($module_id=="settings") {
                                                                    echo "Configuración de Planeta Verde";
                                                                } else {
                                                                    echo "Planeta Verde";
                                                                }   
                                                                ?>
                                                            </small>
							</h1>
						</div>
					</div>
					
				</div>
				<!-- end: TOOLBAR -->
				<!-- end: PAGE HEADER -->
				<!-- start: BREADCRUMB -->
				<div class="row">
                                    <div class="col-md-12">
                                        <?= Breadcrumbs::widget([
                                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                        ]) ?>
                                    </div>
				</div>
				<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
				<div class="row">
                                        <?php if($wrapp_content) { ?>
					<div class="col-md-12">
						<div class="panel panel-white">
							<div class="panel-body">
								<div class="post-content-index">
                                        <?php } ?>
   									<?= $content?>
                                        <?php if($wrapp_content) { ?>
                                                               </div>
							</div>
						</div>
					</div>
                                        <?php } ?>
					<!-- end: PAGE CONTENT-->
				</div>
				<div class="subviews">
					<div class="subviews-container"></div>
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<footer class="inner">
			<div class="footer-inner">
				<div class="pull-left">2015 &copy; Planeta Verde by WABLE</div>
				<div class="pull-right">
					<span class="go-top"><i class="fa fa-chevron-up"></i></span>
				</div>
			</div>
		</footer>
		<!-- end: FOOTER -->
	</div>
        
        
    

        
    <?php $this->endBody()?>
    
        
        <?php if(isset($this->params['notification_msg']) && $this->params['notification_msg']!="") { ?>
<script>
    toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "2000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

    $( document ).ready(function() {
        toastr["success"]("<?=$this->params['notification_msg']?>");
    });
</script>
<?php } ?> 

    <script>
            jQuery(document).ready(function() {
                Main.init();
                //SVExamples.init();
            });
        </script>
	</body>

</html>
<?php $this->endPage()?>

