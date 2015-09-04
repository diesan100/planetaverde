<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Pagos y facturación');
$this->params['breadcrumbs'][] = $this->title;
?>
  
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Facturas</span></h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Visualiza las facturas generadas mediante las pasarelas de pago. Las facturas se generan automáticamente cuando los pagos son aceptados por las pasarelas de pago.
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Facturas <i class='fa fa-chevron-right'></i>", Url::to(['//billing/invoice/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Logs</span> de pasarelas</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Consulta los registros de eventos de las pasarelas de pago (Paypal y Redsys). Los eventos más importantes de las pasarelas serán enviados a la dirección de email <b><i><?= \common\mail\MyMailMyProjectt::getPaymentsAddress()?></i></b><br>
                        </p>
                        <p>
                            Dicha dirección puede ser configurada en la sección correspondiente.
                        </p>
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Logs <i class='fa fa-chevron-right'></i>", Url::to(['//billing/gateway-logs/index']), ["class"=>"btn btn-orange"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>  
