<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use \yii\helpers\Url;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsMenuItem;
use common\modules\cms\models\CmsWPositionExtended;
use \Yii;

class MenuWidget extends Widget
{
    public $current_page;
    public $section;
    /*public $cms_page;*/
    public $current_item;
    public $parent_current_item;
    public $separator;
    public $base_url;
    public $new_tab;
    
    public function init()
    {
        parent::init();
        /*if ($this->section === null) {
            $this->section = 'Hello World';
        }
        print_r("<br>section: " . $this->section);
         print_r("<br>current_item: " . $this->current_item);
          print_r("<br>parent_current_item: " . $this->parent_current_item);
           print_r("<br>");*/
    }

    public function run()
    {
        $basePath = (isset($this->base_url) && $this->base_url!="")? $this->base_url : Yii::getAlias('@web');
        //$current_url = \Yii::$app->request->url;
        // Get widgets for this page an selected section
        $menus = CmsWPositionExtended::getWidgets(/*$this->cms_page, */$this->section);
        //print_r("widgets_num : " . sizeof($menus));
        
        
        foreach ($menus as $widget) {
            
            if (is_a($widget, 'common\modules\cms\models\CmsMenu')) {
                //print_r('<ul class="menu">');
                $menu_items = $widget->getCmsMenuItems()->andWhere('STATE='.CMSConstants::$CMS_CONTENT_STATE_PUBLISHED)->andWhere('PARENT_MENU IS NULL')->orderBy('PARENT_MENU')->orderBy('order')->all();
                
                $counter = 1;
                $array_size = sizeof($menu_items);
        
                foreach ($menu_items as $item) {
                    $li_class = "";
                    
                     // check if it has children
                    $children = CmsMenuItem::find()->where('PARENT_MENU = :parent_id', ['parent_id'=>$item->ID])->all();
                    if(isset($children) && sizeof($children)>0) {
                        $hasChildren = true;
                        $li_class = "menusub";
                    } else {
                        $hasChildren = false;
                    }
                    
                    // Get URL
                    $encodedTitle = str_replace(" ", "-", $item->TITLE);
                    if ($item->TYPE == 1/*CMSConstants::$CMS_MENU_ITEM_TYPE_URL*/) {
                       $itemURL = $item->URL;
                    } else {
                        $itemURL = $basePath . "/" . $encodedTitle;
                    }
                    // Check if active
                    if (isset($this->current_item)) {
                        if ($this->current_item == $item->TITLE || 
                                ($this->view->params['parent_current_item'] != NULL && ($this->view->params['parent_current_item'] === $encodedTitle))) {
                            $li_class .= " active";
                        } 
                    }
                    
                    //print_r("1:" . $this->view->params['parent_current_item'] . " , 2: " . $encodedTitle . "<br>");
                    //print_r("<br>itemURL: " . $itemURL. "<br>");
                    
                    // Print li tag
                    $newTab =  ( isset($this->new_tab) && ($this->new_tab == true)) ?"target='_blank'":"";
                    
                    print_r('<li class="'.$li_class.'"><a '.$newTab.' class="" href="'. $itemURL.'">' . $item->TITLE .'</a>'. PHP_EOL);
                    
                    
                    if($hasChildren) {
                        // print toggle icon
                        //print_r(' &nbsp;<i class="fa fa-caret-down"></i></a>');
                        print_r('<div class="smallnavi">' . PHP_EOL .  '<ul class="navismall"> ' . PHP_EOL .  ' <li>'. PHP_EOL);
                            foreach ($children as $child) {
                                $encodedTitle = str_replace(" ", "-", $child->TITLE);
                                $childItemURL = Url::to($encodedTitle);
                                print_r(' <a href="'.  $itemURL . "/" . $childItemURL.'">' . $child->TITLE . "</a> " . PHP_EOL );
                            }
                        print_r("</li> </ul> </div>");
                    } else {
                        // close anchor tag if not children
                        //print_r("</a>");
                    }
                    // close tag
                    print_r('</li>');
                    
                    
                    if(isset($this->separator) && $this->separator != null && $this->separator != "") {
                        if ($array_size != $counter) {
                            print_r('<li class="divider">'.$this->separator.'</li>');
                        }
                    }
                    
                    $counter++;
                    
		}
                // close menu ag
                //print_r('</ul>');
            } else {
                print_r("is NOT a menu!");
            }
            
                    
        }
        
        return;
    }
}

?>

