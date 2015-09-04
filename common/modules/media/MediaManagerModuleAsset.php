<?php

namespace common\modules\media;

class MediaManagerModuleAsset extends \yii\web\AssetBundle
{
    public function init() {
       $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
    
    public $js = [
        //'js/profileImageUpload.js',
        
    ];
    
    public $css = [
        'css/image-manager.css',
        
    ];
    
    public $depends = [
        //'common\assets\FileUploadAsset',
    ];
}
?>