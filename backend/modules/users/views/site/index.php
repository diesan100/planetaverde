<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Usuarios de MyprojecTT');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Clientes</span> de MyProjectt</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Consulta y exporta todos los clientes que están registrados en MyProjectt.
                        </p>
                        
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Clientes <i class='fa fa-chevron-right'></i>", Url::to(['//users/clients/index']), ["class"=>"btn btn-success"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Membresias</span> de Clientes</h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Consulta los datos de membresia de los clientes de MyProjectt. En esta tabla puedes consultar el plan actual, la fecha del proximo pago, el nivel de utilización de su cuenta, etc.
                        </p>                        
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Membersias <i class='fa fa-chevron-right'></i>", Url::to(['//users/membership/index']), ["class"=>"btn btn-success"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>  

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Datos de <span class="text-bold">Facturación</span></h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Consulta los datos de facturación de cada cliente (No se refiere a las facturas, sino a los datos que se van a incluir en las facturas, tales como razón social, CIF/NIF, etc.
                        </p>
                        
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Datos de facturación <i class='fa fa-chevron-right'></i>", Url::to(['//users/billing-data/index']), ["class"=>"btn btn-success"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">        
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Usuarios <span class="text-bold">Administradores</span></h4>                    
                </div>
                <div class="panel-body">
                    <div class="col-md-12 no-padding">
                        <p>
                            Gestiona los usuarios administradores del panel de control.<br><br>
                        </p>                        
                        <p style="text-align: right;">
                            <?= yii\helpers\Html::a("Ir a Usuarios Administradores <i class='fa fa-chevron-right'></i>", Url::to(['//users/admins/index']), ["class"=>"btn btn-success"]);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>  
