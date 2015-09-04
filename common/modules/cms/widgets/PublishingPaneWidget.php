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
class PublishingPaneWidget extends \yii\bootstrap\Widget {
    
    public $model;
    public $form;

    public function init() {
        parent::init();
    }
    
    public function run()
    {
/*
        $created_by = \common\modules\users\models\User::findOne($this->model->CREATED_BY);
        if($created_by!=null) {
            $created_by_name = $created_by->name . " " . $created_by->surname . " (" . $created_by->email . ")";
        } else {
            $created_by_name = "Not set";
        }
        
        
        $updated_by = \common\modules\users\models\User::findOne($this->model->CREATED_BY);
        if($updated_by!=null) {
            $updated_by_name = $updated_by->name . " " . $updated_by->surname . " (" . $updated_by->email . ")";
        } else {
            $updated_by_name = "Not set";
        }*/
            
        return $this->render('publishing_view', 
            [
                "model"=>$this->model,"form"=>$this->form ,
                /*"created_by"=>$created_by_name, 
                "updated_by"=>$updated_by_name*/
            ]);
    }
}
