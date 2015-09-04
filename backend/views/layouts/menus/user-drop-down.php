<!-- start: USER DROPDOWN -->
<li class="dropdown current-user">
    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="false" href="#">

        <img id="profile-img-dropdown" src="<?= $profilePicUrl?>" class="img-circle" alt=""> 

        <span class="username hidden-xs"><?php if (!Yii::$app->user->isGuest) {echo  Yii::$app->user->identity->getFullName(); } ?></span> 
        <i class="fa fa-caret-down "></i>
    </a>
    <ul class="dropdown-menu dropdown-dark">
        <li>
            <a href="<?=  yii\helpers\Url::to(['//users/profile/edit']);?>">
                My Profile
            </a>
        </li>
        <li>
            <a href="<?= yii\helpers\Url::to(['//site/logout']); ?>" data-method="post">
                Log out
            </a>
        </li>
    </ul>
</li>
<!-- end: USER DROPDOWN -->
