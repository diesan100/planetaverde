<?php
use yii\helpers\Url;
?>
<ul class="sub_red_navi">
    <li <?= (Yii::$app->controller->id=="user-profile")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-profile/index"]);?>">My profile</a></li>
    <li <?= (Yii::$app->controller->id=="user-budgets")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-budgets/index"]);?>">My budgets</a></li>
    <li <?= (Yii::$app->controller->id=="user-planned-trips")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-planned-trips/index"]);?>">Planned trips </a></li>
    <li <?= (Yii::$app->controller->id=="user-finished-trips")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-finished-trips/index"]);?>">Finished Trips </a></li>
    <li <?= (Yii::$app->controller->id=="user-my-pictures")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-my-pictures/index"]);?>">My pictures</a></li>
    <li <?= (Yii::$app->controller->id=="user-friends")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-friends/index"]);?>">Friends</a></li>
    <li <?= (Yii::$app->controller->id=="user-messages")?"class='activa'":""?>><a href="<?=Url::to(["/user/user-messages/index"]);?>">Messages</a></li>
</ul>
