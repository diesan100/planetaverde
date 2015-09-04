<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active'": ""; ?>><a href="<?=Url::to(['//billing/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Inicio </span></a></li>

                                                        
<li <?= (Yii::$app->controller->id === "invoice")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-eur"></i> <span
            class="title"> Facturación </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//billing/invoice/index'])?>">
                            <span class="title"> Facturas </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//billing/invoice/create'])?>">
                            <span class="title"> Crear factura </span>
                    </a>
            </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "paypal-tx" || Yii::$app->controller->id === "paypal-profiles")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-paypal"></i> <span
            class="title"> Transacciones de Paypal </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index" && Yii::$app->controller->id === "paypal-tx")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//billing/paypal-tx/index'])?>">
                            <span class="title"> Transacciones </span>
                    </a>
            </li> 
            <li <?= (Yii::$app->controller->action->id === "index" && Yii::$app->controller->id === "paypal-profiles")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//billing/paypal-profiles/index'])?>">
                            <span class="title"> Perfiles de Pago Recurrente </span>
                    </a>
            </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "gateway-logs")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-clock-o"></i> <span
            class="title"> Logs de pasarelas </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//billing/gateway-logs/index'])?>">
                            <span class="title"> Ver logs </span>
                    </a>
            </li>            
    </ul>
</li>