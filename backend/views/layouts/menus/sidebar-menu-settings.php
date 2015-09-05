<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active'": ""; ?>><a href="<?=Url::to(['//settings/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Start </span></a></li>
                                                        
<!-- APP SETTINGS -->
<li <?= (Yii::$app->controller->id === "settings")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span
            class="title"> Configuration </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/settings/index'])?>"> 
                        <span class="title"> Parameters </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/settings/create'])?>"> 
                        <span class="title"> New Parameter </span>
                    </a>
            </li>
    </ul>
</li>


<li <?= (Yii::$app->controller->id === "messages")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-picture-o"></i> <span
            class="title"> Background images </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">           
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/settings/index'])?>"> 
                        <span class="title"> Images </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//settings/settings/create'])?>"> 
                        <span class="title"> New Image </span>
                    </a>
            </li>
    </ul>
</li>