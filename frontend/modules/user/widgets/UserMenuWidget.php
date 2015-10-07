<?php

/* 
 * This widget renders the user menu for the private area
 */


namespace frontend\modules\user\widgets;

use yii\base\Widget;


class UserMenuWidget extends Widget
{
    // Current CMS Page
    //public $current_page;

    
    public function init()
    {
        parent::init();

    }

    public function run()
    {                        
        return $this->render("userMenu", ["param"=>null]);
    }
}

?>

