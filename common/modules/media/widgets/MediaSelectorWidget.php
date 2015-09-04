<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\modules\media\widgets;



/**
 * Description of MediaSelectorWidget
 *
 * @author Diego
 */
class MediaSelectorWidget extends \yii\bootstrap\Widget {
    
    public $model;
    public $field;
    public $bootstrap_cols;

    public function init() {
        parent::init();
    }
    
    public function run()
    {
        //print_r($this->model);
        //print_r($this->field);
        //print_r($this->model->{$this->field});
        
        if($this->model->{$this->field} != null) {
            $cmsImage = \common\modules\media\models\CmsImagesSearch::findOne($this->model->{$this->field});
        }else {
            $cmsImage = null;
        }
        return $this->render('mediaSelector', 
            ["model"=>$this->model, "field"=>$this->field, "bootstrap_cols"=>$this->bootstrap_cols, "cmsImage" => $cmsImage]);
    }
}
