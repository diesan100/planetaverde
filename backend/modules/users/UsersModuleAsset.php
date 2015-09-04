<?php

namespace app\modules\users;

class UsersModuleAsset extends \yii\web\AssetBundle
{
    public function init() {
       $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
    
    public $js = [
        'js/profileImageUpload.js',
        
    ];
    
    public $css = [
        'css/uploadsProject.css',
        
    ];
    
    public $depends = [
        'common\assets\FileUploadAsset',
    ];
}
?>