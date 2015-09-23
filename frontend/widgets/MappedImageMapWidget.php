<?php

/*
 * This widget renders a map in the destinations section.
 * It renders image and the mapping for every children, including the link to such children.
 */

namespace frontend\widgets;

use common\modules\media\models\CmsImages;
use Yii;

/**
 * Description of MediaSelectorWidget
 *
 * @author Diego
 */
class MappedImageMapWidget extends \yii\bootstrap\Widget {
    
    public $area;
    public $params;

    public function init() {
        parent::init();
    }
    
    public function run()
    {
        // Get image tag
       $image = CmsImages::findOne($this->area->map_image);
       $url = Yii::getAlias(Yii::getAlias("@frontend_web")) . "/" . $image->URL;
       $params_string = "";
       if(isset($this->params)) {
           
           foreach ($this->params as $key => $value) {
               $params_string .= $key ."='".$value."'";
           }               
           
       }
       $imageTag = '<img class="mapthis" src="' . $url . '" '.$params_string.' usemap="#Map">';
       $mappingTag = "";
        
       // Get mapping for children
       $childrenArea = $this->area->getChildren();
       
        if($childrenArea != null && sizeof($childrenArea) > 0) {
            
            $mappingTag = '<map name="Map" id="Map">';
            foreach ($childrenArea as $childArea) {
                if($childArea->coords_in_parent != null && $childArea->coords_in_parent != "") {
                    $mappingTag .= '<area alt="'.$childArea->name.'" title="'.$childArea->name.'" href="'.$childArea->getUrl().'" shape="poly" coords="'.$childArea->coords_in_parent.'" />';
                }
            }
            $mappingTag .= '</map>'; 
        }
        
        $this->view->registerJs($this->getJScript(), \yii\web\View::POS_READY);
        
        return $imageTag . PHP_EOL . $mappingTag;
    }
    
    
    private function getJScript() {
        return "$(function() {
                $('.mapthis').maphilight({fade: false});
            });";
    }
        
}
