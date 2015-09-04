<?php
use yii\helpers\Url;
use common\utils\MyprojecttUtils;
?>

        <li class="dropdown user-profile" style="margin-top: -3px;">
         <?php
        $profilePicUrl = Yii::$app->user->identity->picture_url;
        if($profilePicUrl == null || $profilePicUrl == "") {
            $profilePicUrl = Yii::getAlias('@usersbackend_web') . "/images/user-4.png";
        } else {
            $profilePicUrl = Yii::getAlias("@usersbackend_web") . $profilePicUrl . "?" . rand(10,100);
        }
        ?>

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform: none;">
            <img id="header-user-profile" src="<?=$profilePicUrl?>" alt="user-image" class="img-circle img-inline userpic-32" height="28px" width="28px" />
                <span>
                        <?= MyprojecttUtils::cropName(Yii::$app->user->identity->getFullName(), 45); ?>
                        <i class="fa fa-angle-down"></i>
                </span>
        </a>

        <ul class="dropdown-menu user-profile-menu list-unstyled" style="margin-top: 5px;">
            <li>
                <div class="user-menu-upper">
                    <span class="green-hover"><?= Yii::$app->user->identity->email;?></span>
                    <span class="green-hover"><?= Yii::$app->user->identity->membership->used_projects?> <?= (Yii::$app->user->identity->membership->used_projects>1)?Yii::t('app', 'proyectos'):Yii::t('app', 'proyecto');?></span>
                    <span class="green-hover"><?=Yii::$app->user->identity->membership->getPercentUsedStorage()?>% <?=Yii::t('app', 'espacio utilizado');?>
                </div>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManagerBackendEnd->createUrl("/dashboard"); ?>">
                        <?=Yii::t('app','Inicio')?>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManagerBackendEnd->createUrl("/projects"); ?>">
                        <?=Yii::t('app','Mis proyectos')?>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManagerBackendEnd->createUrl("/users/profile/edit"); ?>">
                        <?=Yii::t('app','Mi perfil')?>
                </a>
            </li>            
            <li>
                <a href="<?= Yii::$app->urlManagerBackendEnd->createUrl("/users/subscription/index"); ?>">
                        <?=Yii::t('app','Mi suscripción')?>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManagerBackendEnd->createUrl("/users/profile/settings"); ?>">
                        <?=Yii::t('app','Mi configuración')?>
                </a>
            </li>
            <li class="last">
                <a href="<?= yii\helpers\Url::to(['//site/logout']); ?>" data-method="post">
                        <?=Yii::t('app','Salir')?>
                </a>
            </li>
        </ul>
    </li>


<!--
        <li class="dropdown user-profile">
        <?php
        $profilePicUrl = Yii::$app->user->identity->picture_url;
        if($profilePicUrl == null || $profilePicUrl == "") {
            $profilePicUrl = Yii::getAlias('@usersbackend_web') . "/images/user-4.png";
        } else {
            $profilePicUrl = Yii::getAlias("@usersbackend_web") . $profilePicUrl . "?" . rand(10,100);
        }
        ?>

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform: none;">
            <img id="header-user-profile" src="<?=$profilePicUrl?>" alt="user-image" class="img-circle img-inline userpic-32" height="28px" width="28px" />
                <span>
                        <?= Yii::$app->user->identity->name . " " . Yii::$app->user->identity->surname ; ?>
                        <i class="fa fa-angle-down"></i>
                </span>
        </a>

        <ul class="dropdown-menu user-profile-menu list-unstyled">
            
            <li>
                <a href="<?= Url::to(Yii::getAlias("@usersbackend_web")); ?>">
                        <?=Yii::t('app','Mi panel de control')?>
                </a>
            </li>
            
            <li class="last">
                <a href="<?= yii\helpers\Url::to(['site/logout']); ?>" data-method="post">
                        <?=Yii::t('app','Salir')?>
                </a>
            </li>
        </ul>
    </li>
    -->