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
class MediaSelectorModalWidget extends \yii\bootstrap\Widget {
    
    public $model;
    public $field;
    public $bootstrap_cols;

    public function init() {
        parent::init();
    }
    
    public function run()
    {
        return $this->render('mediaModal', 
            ["model"=>$this->model, "field"=>$this->field, "bootstrap_cols"=>$this->bootstrap_cols]);
    }
}
