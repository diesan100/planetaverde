<?php

namespace common\modules\cms;

class CmsModuleAsset extends \yii\web\AssetBundle
{
    public function init() {
       $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
    
    public $js = [
        'js/menu-item.js',
        
    ];
    
    public $css = [
        //'css/uploadsProject.css',
        
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
?>