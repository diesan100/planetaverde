<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */

$this->title = Yii::t('app', 'My profile');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'My profile');


$url = Url::to(['//users/profile/profileimageupload']);
$csrfToken = Yii::$app->getRequest()->csrfToken;
        
$this->registerJs("var csrfValue = '".$csrfToken."'", 1);
$this->registerJs("var profileImageUploaderUrl = '".$url."'", 1);


?>

<section class="profile-env">
   <div class="row">
      <div class="col-sm-3">
         <div class="user-info-sidebar">
             <a href="#" onclick="javascript:$('#profilefileupload input').click();" class="user-img" style="z-index: 99999">
                    <span class="upload_picture"><?=Yii::t('app','Subir fotografía')?></span>
                </a>
                          
            <div class="image-upload-container">
                <?php
                    if($model->picture_url == null) {
                    ?>
                    <img id="user-profile-image" src="<?=Yii::getAlias("@web")?>/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                    <?php } else { ?>
                    <img id="user-profile-image" src="<?=Yii::getAlias("@web").$model->picture_url?>" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                    <?php } ?>

                <form class="fileupload" id="profilefileupload" action="" method="POST" enctype="multipart/form-data"
                          style="position: absolute; top: 0; left: 0; opacity: 0; width: 100%; height: 100%;">
                        <input type="file" name="UploadProfileImageForm[file]">
                </form>

                <div class="image-upload-loader" id="profile-image-upload-loader" style="padding-top: 45px">
                    <div class="progress image-upload-progess-bar" id="profile-image-upload-bar">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="00"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 0%;">
                        </div>
                    </div>
                </div>
            </div>
            <span class="user-profile-name">
            <?= Yii::$app->user->identity->name . " " . Yii::$app->user->identity->surname ; ?>
            </span>
            <span class="user-title">
            <?= $model->job_position ?>
            </span> 
         </div>
          

      </div>
      <div class="col-sm-9">
          <div class="panel paco">
            <?= $this->render('profile_form', [
                'model' => $model,
            ]) ?>
          </div>
      </div>
   </div>
</section>