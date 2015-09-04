<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active'": ""; ?>><a href="<?=Url::to(['//users/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Inicio </span></a></li>
                                                        
<li <?= (Yii::$app->controller->id === "clients")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-users"></i> <span
            class="title"> Clientes de Myprojectt </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <!--<a href="/myprojectt/backend/web/index.php?r=users%2Findex">-->
                    <a href="<?=Url::to(['//users/clients/index'])?>"> 
                        <span class="title"> Clientes </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//users/clients/create'])?>">
                            <span class="title"> Nuevo cliente </span>
                    </a>
            </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "membership")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-link"></i>
            <span class="title"> Membresías </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= ((Yii::$app->controller->action->id === "index")||(Yii::$app->controller->action->id === "update"))? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//users/membership/index'])?>">
                            <span class="title"> Consulta </span>
                    </a>
            </li>            
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "billing-data")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-briefcase"></i>
            <span class="title"> Datos de Facturación </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= ((Yii::$app->controller->action->id === "index")||(Yii::$app->controller->action->id === "update"))? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//users/billing-data/index'])?>">
                            <span class="title"> Consulta </span>
                    </a>
            </li>            
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "admins")? "class='active open'": ""; ?> style="position: absolute; bottom: 0px; width: 100%;">
    <a href="javascript:void(0)"><i class="fa fa-user-md"></i>
            <span class="title"> Usuarios Administradores </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= ((Yii::$app->controller->action->id === "index")||(Yii::$app->controller->action->id === "update"))? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//users/admins/index'])?>">
                            <span class="title"> Administradores </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//users/admins/create'])?>">
                            <span class="title"> Nuevo administrador </span>
                    </a>
            </li>
    </ul>
</li>