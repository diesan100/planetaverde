<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active'": ""; ?>><a href="<?=Url::to(['//trips/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Start </span></a></li>
                                                        
<!-- APP SETTINGS -->
<li <?= (Yii::$app->controller->id === "area")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-globe"></i> <span
            class="title"> Group-trips </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//trips/grouptrip/index'])?>"> 
                        <span class="title"> Group-trip List </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//trips/grouptrip/create'])?>"> 
                        <span class="title"> New Group-trip </span>
                    </a>
            </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "lodge")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-bed"></i> <span
            class="title"> Custom-trips </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//destinations/lodge/index'])?>"> 
                        <span class="title"> Custom-trip List </span>
                    </a>
            </li>
    </ul>
</li>