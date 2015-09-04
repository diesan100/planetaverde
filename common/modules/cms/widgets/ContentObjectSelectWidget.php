<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\modules\cms\widgets;



/**
 * Description of MediaSelectorWidget
 *
 * @author Diego
 */
class ContentObjectSelectWidget extends \yii\bootstrap\Widget {
    
    public $object_id;
    public $type;

    public function init() {
        parent::init();
    }
    
    public function run()
    {
        /*
        var_dump($this->type);
        var_dump($this->object_id);
        $compara1 = is_null($this->type);
        $compara2 = is_null($this->object_id);
        
        var_dump($compara1);
        var_dump($compara2);
        */
        if( is_null($this->type) || is_null($this->object_id)) {
          /*  
            print_r("nulos!");
            */
            $value = "";
            
        } else {
            
            
        
            $value = \common\modules\cms\utils\CMSUtils::getObjectTitle($this->type, $this->object_id);
        }
        
        return $this->render('select_content_object', 
            [
                "value"=>$value,                
            ]);
    }
}
