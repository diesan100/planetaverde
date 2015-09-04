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
                    <h4 class="panel-title"><span class="text-bold">Configuración</span></h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Configura las variables de la aplicación. Generalmente ninguna variable tendrá que ser eliminada o añadida.                            
                        </p>
                        <p>
                            Los parámetros están distribuidos en grupos (Los parámetros pueden ser filtrados por grupos en la página correpospondiente).
                        </p>
                        <div class="alert alert-block alert-danger fade in">                                
                            <h4 class="alert-heading">¡Precaución!</h4>
                            <p>
                                La configuración errónea de alguno de los parámetros puede tener consecuencias graves en el funcionamiento general de la aplicación o en módulos especialmente delicados como las pasarelas de pago.
                            </p>                                
                        </div>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Configuración <i class='fa fa-chevron-right'></i>", Url::to(['//settings/settings/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Mensajes (Bocadillos)</span> de ayuda</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Configura los mensajes incluidos en los bocadillos de ayuda de la aplicación.
                        </p>                        
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Mensajes <i class='fa fa-chevron-right'></i>", Url::to(['//settings/messages/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>  
