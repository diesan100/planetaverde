<?php
use yii\helpers\Url;
?>
<!-- IMAGES REPOSITORY -->
<li <?= (Yii::$app->controller->id === "site")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-desktop"></i> <span
            class="title"> Dashboard </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                    <!--<a href="/myprojectt/backend/web/index.php?r=users%2Findex">-->
                    <a href="<?=Url::to(['//site/index'])?>"> 
                        <span class="title"> <?= Yii::t("backend", "Start");?> </span>
                    </a>
            </li>
    </ul>
</li>