<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t("backend", "Destinations");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Areas</span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage areas
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Areas <i class='fa fa-chevron-right'></i>", Url::to(['/destinations/area/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Lodges </span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage lodges
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Lodges <i class='fa fa-chevron-right'></i>", Url::to(['/destinations/lodge/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        
</div>  