<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active'": ""; ?>><a href="<?=Url::to(['//destinations/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Start </span></a></li>
                                                        
<!-- APP SETTINGS -->
<li <?= (Yii::$app->controller->id === "area")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-globe"></i> <span
            class="title"> Areas </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//destinations/area/index'])?>"> 
                        <span class="title"> Areas List </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//destinations/area/create'])?>"> 
                        <span class="title"> New Area </span>
                    </a>
            </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "lodge")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-bed"></i> <span
            class="title"> Lodges </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//destinations/lodge/index'])?>"> 
                        <span class="title"> Lodges List </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//destinations/lodge/create'])?>"> 
                        <span class="title"> New lodge </span>
                    </a>
            </li>
    </ul>
</li>