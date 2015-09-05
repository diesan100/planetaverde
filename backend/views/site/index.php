<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t("backend", "Planeta Verde Admin Panel");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Destinations</span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage everything reated with Festinations and Preset Trips
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Destinations <i class='fa fa-chevron-right'></i>", Url::to(['/destinations/site/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">User Trips </span> managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage Customized Trips, Budgets, Usert Trips and more
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Trips Managment <i class='fa fa-chevron-right'></i>", Url::to(['/trips/site/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Users</span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage Client Users and Admin Users
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Users <i class='fa fa-chevron-right'></i>", Url::to(['/users/site/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Front End CMS </span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Content Managment System (CMS) for the front site. Manage news and static contents.
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to CMS <i class='fa fa-chevron-right'></i>", Url::to(['/cms/site/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">App <span class="text-bold">Settings</span></h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage Application Settings
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Settings <i class='fa fa-chevron-right'></i>", Url::to(['/settings/site/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div> 
</div>  