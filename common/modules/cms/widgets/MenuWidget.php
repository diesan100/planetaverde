<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\modules\cms\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use \yii\helpers\Url;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsMenuItem;
use common\modules\cms\models\CmsWPositionExtended;

use \Yii;

class MenuWidget extends Widget
{
    // Current CMS Page
    public $current_page;

    // Widget section
    public $section;
    
    // Widget section
    public $active_ancestors = false;
    
    public $check_grandparents = true;
    
    public function init()
    {
        parent::init();

    }

    public function run()
    {                
        // Get widgets for this page an selected section
        $menus = CmsWPositionExtended::getWidgets($this->section);

        foreach ($menus as $widget) {
            
            if (is_a($widget, 'common\modules\cms\models\CmsMenu')) {
                //print_r('<ul class="menu">');
                $menu_items = $widget->getCmsMenuItems()->andWhere('STATE='.CMSConstants::$CMS_CONTENT_STATE_PUBLISHED)->andWhere('PARENT_MENU IS NULL')->orderBy('PARENT_MENU')->orderBy('order')->all();
                
                foreach ($menu_items as $item) {
                    $li_class = "";
                    
                    if($item->hasChildren()) {
                        //$hasChildren = true;
                        $li_class = "has-child";
                    }
                    
                    // Get URL
                    $encodedTitle = str_replace(" ", "-", $item->TITLE);
                    if($item->IS_HOME) {
                        $itemURL = Yii::getAlias('@web');
                    } else {
                        $itemURL = Yii::getAlias('@web') . "/" . $encodedTitle;
                    }
                            
                    // Check if active
                    if (
                            $this->current_page->ID == $item->PAGE ||
                            ($this->active_ancestors==true && $this->current_page->isDescendant($item->PAGE, $this->check_grandparents))
                           ) {
                          
                        $li_class .= " active";
                    }                     
                    
                    // Print li tag
                    print_r('<li class="'.$li_class.'"><a href="'. $itemURL.'">' . $item->TITLE);
                    if($item->hasChildren()) {
                        // print toggle icon
                        print_r(' &nbsp;<i class="fa fa-caret-down"></i></a>');
                        $grandchildClass = ($item->hasGrandchildren())?"sub-menu":"no-submenu";
                        print_r("<ul class='".$grandchildClass."'>");
                        $children = $item->getChildren();
                        foreach ($children as $child) {
                            $encodedTitle = str_replace(" ", "-", $child->TITLE);
                            $childItemURL = Url::to($encodedTitle);
                            if($child->hasChildren()) {
                                //$childClass = ($child->hasChildren())?"sub-menu":"";
                                print_r('<li><a href="'.  $itemURL . "/" . $childItemURL.'">' . $child->TITLE . "</a>");
                                print_r("<ul>");
                                    $subChildren = $child->getChildren();
                                    foreach ($subChildren as $subChild) {
                                        $encodedTitle = str_replace(" ", "-", $subChild->TITLE);
                                        $subChildURL  = $childItemURL . "/" . $encodedTitle;
                                        print_r('<li><a href="'.  $itemURL . "/" . $subChildURL.'">' . $subChild->TITLE . "</a>");
                                    }
                                print_r("</ul>");
                                print_r("</li>");
                            } else  {
                                print_r('<li><a href="'.  $itemURL . "/" . $childItemURL.'">' . $child->TITLE . "</a></li>");
                            }
                        }
                        print_r("</ul>");
                    } else {
                        // close anchor tag if not children
                        print_r("</a>");
                    }
                    // close tag
                    print_r('</li>');
		}
                // close menu tag
                //print_r('</ul>');
            } else {
                print_r("is NOT a menu!");
            }
                    
        }
        
        return;
    }
}

?>

