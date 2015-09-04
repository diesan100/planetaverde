<?php
namespace common\assets;

use Yii;
/**
 * Description of FileUploadAsset
 *
 * @author Diego
 */
class FileUploadAsset  extends \yii\web\AssetBundle {
    
    //public $sourcePath = '@common/assets/assets_files';
    
    public function init() {
        $this->sourcePath =__DIR__ . '/assets_files';
        
        parent::init();
    }
    
    public $js = [
        'js/jquery.ui.widget.js',
        'js/jquery.fileupload.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
    
}
