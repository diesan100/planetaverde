<?php
use yii\helpers\Url;
?>
<ul class="nav navbar-nav">
    <?php
    $module_id = "";
    try {
        $module_id = Yii::$app->controller->module->id;
        //var_dump($module_id);
    } catch (Exception $ex) {}                                    
    ?>
    <li <?=($module_id=="dashboard" || $module_id=="myprojectt-app-backend")?'class="active"':''?>><a href="<?=Url::to(['/site/index'])?>"> <?=Yii::t("backend", "Dashboard");?> </a></li>
    <li <?=($module_id=="destinations")?'class="active"':''?>><a href="<?=Url::to(['/destinations/site/index'])?>"> <?=Yii::t("backend", "Destinations");?> </a></li>
    <li <?=($module_id=="trips")?'class="active"':''?>><a href="<?=Url::to(['/trips/site/index'])?>"> <?=Yii::t("backend", "Trips");?> </a></li>
    <li <?=($module_id=="users")?'class="active"':''?>><a href="<?=Url::to(['/users/site/index'])?>"> <?=Yii::t("backend", "Users");?> </a></li>
    <li <?=($module_id=="cms")?'class="active"':''?>><a href="<?=Url::to(['/cms/site/index'])?>"> Front End CMS </a></li>
    <li <?=($module_id=="settings")?'class="active"':''?>><a href="<?=Url::to(['/settings/site/index'])?>"> Settings </a></li>    
</ul>

