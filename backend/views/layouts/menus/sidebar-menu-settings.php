<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active'": ""; ?>><a href="<?=Url::to(['//settings/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Inicio </span></a></li>
                                                        
<!-- APP SETTINGS -->
<li <?= (Yii::$app->controller->id === "settings")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span
            class="title"> Configuración </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/settings/index'])?>"> 
                        <span class="title"> Parámetros </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/settings/create'])?>"> 
                        <span class="title"> Nuevo parámetro </span>
                    </a>
            </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "messages")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-comment-o"></i> <span
            class="title"> Mensajes de ayuda </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">           
            <li <?= (Yii::$app->controller->id === "messages")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/messages/index'])?>">
                            <span class="title"> Mensajes </span>
                    </a>
            </li>
    </ul>
</li>