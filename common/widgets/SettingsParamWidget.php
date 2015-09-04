<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\widgets;

use yii\base\Widget;
use \backend\modules\settings\models\SettingsSearch;
use \Yii;

class SettingsParamWidget extends Widget
{
    public $group_name;
    public $param_name;
    
    
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
        $param = SettingsSearch::findOne(["group_name"=>$this->group_name, "param_name"=>$this->param_name]);
        if($param!=null) {
            echo $param->getValue();
        } else {
            return "No found";
        }
    }
}

?>

