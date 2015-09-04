<?php
namespace common\modules\cms\models;


use common\modules\cms\models\CmsWidgetPosition;
use common\modules\cms\constants\CMSConstants;
use \yii\db\Query;
/**
 * This class extends the generated class by yii2
 */
class CmsWPositionExtended extends CmsWidgetPosition {
	
	/**
	 * Gets the widgets organized by sections
	 * @param unknown $page_id
	 */
	public static function getWidgetsByPage($page_id) {
		
		$widget_positions = CmsWidgetPosition::find(['PAGE'=>$page_id])->indexBy('LAYOUT_SECTION')->all();
		
		$return_widgets = array();
		
		foreach ($widget_positions as $wp) {
			//echo "<br>------------------------------";
			if (!isset($return_widgets[$wp['LAYOUT_SECTION']])) {
				 //echo "<br>no existe, se crea nuevo array. seccion: " . $wp['LAYOUT_SECTION']; 
				$return_widgets[$wp['LAYOUT_SECTION']] = array();
			}
			
			if($wp['TYPE'] === CMSConstants::$MENU_WIDGET_TYPE) {
				$widget = CmsMenu::findOne(['ID'=>$wp['WIDGET_ID']]);

			} else if($wp['TYPE'] === CMSConstants::$SLIDER_WIDGET_TYPE) {
				// TODO: SLIDERS
				// $widget = CmsSlider::findOne( ['ID'=>$wp['WIDGET_ID']] );
			}
			//echo "class = " . get_class($wp);
			$wp->WIDGET = $widget;
			
			$return_widgets[$wp['LAYOUT_SECTION']][] = $wp;
			//var_dump($wp['LAYOUT_SECTION']);	
		}
		
// 		echo "<br>size: " . sizeof($return_widgets['1']);
// 		echo "<br>size: " . sizeof($return_widgets['2']);
// 		echo "<br>size: " . sizeof($return_widgets);
		
		return $return_widgets;
	}
        
        /**
	 * Gets the widgets organized by sections
	 * @param unknown $page_id
	 */
	public static function getWidgets(/*$page_id, */$section) {
		
            $widgets = array();
            
            // GET THE WIDGET POSITIONS FOR THAT PAGE AND SECTION
            $subQuery = (new Query)->select('id')->from('cms_layout_section')->where('NAME=:NAME', [':NAME' => $section]);
            $query = (new Query)->select(['WIDGET_ID', 'TYPE'])->from('cms_widget_position')->where(['LAYOUT_SECTION' => $subQuery]);
            
             //'LAYOUT_SECTION' => $subQuery])

            
                    
            // Create a command. You can get the actual SQL using $command->sql
            $command = $query->createCommand();

            // Execute the command: 
            $positions = $command->queryAll();

            // LOOP OVER THE POSITIONS
            foreach ($positions as $position) {
                
                if($position['TYPE'] == CMSConstants::$MENU_WIDGET_TYPE) {
                        $widget = CmsMenu::findOne(['ID'=>$position['WIDGET_ID']]);
                } else if($position['TYPE'] == CMSConstants::$SLIDER_WIDGET_TYPE) {
                        // TODO: SLIDERS
                }
                        
                $widgets[] = $widget;
            }
                         
            return $widgets;
	}
}
?>