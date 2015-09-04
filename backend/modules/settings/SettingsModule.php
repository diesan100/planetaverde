<?php
namespace backend\modules\settings;

class SettingsModule extends \yii\base\Module
{
    public static $SETTINGS_PARAM_TYPES = [
            '0' => 'Boolean', 
            '1' => 'Integer', 
            '2' => 'Texto simple', 
            '3' => 'Texto largo',
    ] ;
    
    const TYPE_BOOLEAN  = 0;
    const TYPE_INTEGER  = 1;
    const TYPE_TEXT     = 2;
    const TYPE_LONGTEXT = 3;
    
    public function init()
    {
        parent::init();

        //$this->params['foo'] = 'bar';
        // ...  other initialization code ...
    }
}
?>