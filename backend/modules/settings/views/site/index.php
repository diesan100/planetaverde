<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Configuración de MyProjectt');
$this->params['breadcrumbs'][] = $this->title;
?>
  
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Settings</span></h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Set up app params. They are not usually deleted or added once the app is working.       
                        </p>
                        <p>
                            Parameters are grouped by group name. A group represents a module or general functionality.
                        </p>
                        <div class="alert alert-block alert-danger fade in">                                
                            <h4 class="alert-heading">¡Warning!</h4>
                            <p>
                                Mistaken set up of any parameter can cause general failure of the app.
                            </p>                                
                        </div>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Settings <i class='fa fa-chevron-right'></i>", Url::to(['//settings/settings/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Background Images</span> Configuration</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Set up background images for each section of the app.
                        </p>   
                        <p>
                            <img src="<?=Yii::getAlias("@web")?>/images/settingImagesPic.png" width="100%" height="auto">
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Background Images <i class='fa fa-chevron-right'></i>", Url::to(['//settings/background-images/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>  
