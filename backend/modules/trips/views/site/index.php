<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t("backend", "Trips");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Group-Trip</span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Manage Group-Trips
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Group-trips <i class='fa fa-chevron-right'></i>", Url::to(['/trips/grouptrip/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Custom-Trip </span> Managment</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Custom-Trips
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Go to Custom-trips <i class='fa fa-chevron-right'></i>", Url::to(['/trips/customtrip/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        
</div>  