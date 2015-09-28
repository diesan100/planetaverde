<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    /** 
    <link rel="stylesheet" href="rapido/assets/css/themes/theme-default.css" type="text/css" id="skin_color">
    <link rel="stylesheet" href="assets/css/print.css" type="text/css" media="print">
    <style id="holderjs-style" type="text/css"></style>
    **/
    
    public $css = [
        //'rapido/assets/plugins/bootstrap/css/bootstrap.min.css',
        'rapido/assets/plugins/font-awesome/css/font-awesome.min.css',
        'rapido/assets/plugins/iCheck/skins/all.css',
        'rapido/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css',
        'rapido/assets/plugins/animate.css/animate.min.css',
        'rapido/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css',
        'rapido/assets/plugins/owl-carousel/owl-carousel/owl.theme.css',
        'rapido/assets/plugins/owl-carousel/owl-carousel/owl.transitions.css',
        'rapido/assets/plugins/summernote/dist/summernote.css',
        'rapido/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css',
        'rapido/assets/plugins/toastr/toastr.min.css',
        //'rapido/assets/plugins/bootstrap-select/bootstrap-select.min.css',
        //'rapido/assets/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
        'rapido/assets/plugins/DataTables/media/css/DT_bootstrap.css',
        //'rapido/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css',
        //'rapido/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
        'rapido/assets/css/styles.css',
        'rapido/assets/css/styles-responsive.css',
        'rapido/assets/css/plugins.css',
        'rapido/assets/css/customized_diego.css',
        'css/uploadsProject.css',
        'css/module-images.css',
        'css/lms-styles.css',
        'css/cms-styles.css',
        
    ];
    
    
    public $js = [
        //'js/jquery.ui.widget.js',
        //'js/jquery.fileupload.js',
        
        
        'rapido/assets/js/main.js',
        
        //'rapido/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js',
        //'rapido/assets/plugins/bootstrap/js/bootstrap.min.js',
        //'rapido/assets/plugins/blockUI/jquery.blockUI.js',
        'rapido/assets/plugins/iCheck/jquery.icheck.min.js',
        //'rapido/assets/plugins/moment/min/moment.min.js',
        'rapido/assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js',
        'rapido/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js',
        'rapido/assets/plugins/bootbox/bootbox.js',
        'rapido/assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js',
        'rapido/assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js',
        'rapido/assets/plugins/jquery.appear/jquery.appear.js',
        'rapido/assets/plugins/jquery-cookie/jquery.cookie.js',
        'rapido/assets/plugins/velocity/jquery.velocity.min.js',
        'rapido/assets/plugins/TouchSwipe/jquery.touchSwipe.min.js',
        'rapido/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js',
        'rapido/assets/plugins/jquery-mockjax/jquery.mockjax.js',
        'rapido/assets/plugins/toastr/toastr.js',
        //'rapido/assets/plugins/bootstrap-modal/js/bootstrap-modal.js',
        //'rapido/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js',
        //'rapido/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js',
        //'rapido/assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js',
        //'rapido/assets/plugins/bootstrap-select/bootstrap-select.min.js',
        //'rapido/assets/plugins/jquery-validation/dist/jquery.validate.min.js',
        //'rapido/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js',
        //'rapido/assets/plugins/DataTables/media/js/jquery.dataTables.min.js',
        //'rapido/assets/plugins/DataTables/media/js/DT_bootstrap.js',
        //'rapido/assets/plugins/truncate/jquery.truncate.js',
        //'rapido/assets/plugins/summernote/dist/summernote.min.js',
        //'rapido/assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
        //'rapido/assets/js/subview.js',
        //'rapido/assets/js/subview-examples.js',
        //'rapido/assets/plugins/holder/holder.js',
        
        'js/module-images.js',        
        'js/settings-module.js',
        'js/menu-item.js',
        'js/selectObjectModal.js',
        
        'js/jquery.nestable.js',
        'js/cms-nestable.js',
        'js/cms-menus.js',
        
    		
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FileUploadAsset',
    ];
}
