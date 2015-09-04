<?php
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-sm-5 col-md-4">
        <div class="user-left">
            <div class="center">
                <h4><?=Yii::$app->user->identity->name;?> <?=Yii::$app->user->identity->surname;?></h4>
                <div class="fileupload fileupload-new">
                    <div class="user-image">
                        <div class="fileupload-new thumbnail">
                            
                            <div class="image-upload-container">
                                <?php
                                    if($model->picture_url == null) {
                                    ?>
                                    <img id="user-profile-image" src="<?=$assetUrl;?>/images/anonymous.jpg" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                                    <?php } else { ?>
                                    <img id="user-profile-image" src="<?=Yii::getAlias("@frontend_web").$model->picture_url?>" alt="user-img" class="img-cirlce img-responsive img-thumbnail">
                                    <?php } ?>

                                <form class="fileupload" id="profileImageUpload" action="" method="POST" enctype="multipart/form-data"
                                          style="position: absolute; top: 0; left: 0; opacity: 0; width: 100%; height: 100%;">
                                        <input type="file" name="UploadProfileImageForm[file]">
                                </form>

                                <div id="image-uploader-buttons">
                                    <span class="helper"></span>
                                    <img src="<?=$assetUrl;?>/images/upload_img.png" id="upload-image-button">
                                    <!--
                                    <?= Html::button("Subir imagen", ['class' => 'btn btn-primary', 'id'=>'upload-image-button']); ?>
                                    -->
                                </div>

                                <div class="image-upload-loader" id="profile-image-upload-loader" style="padding-top: 45px">
                                    <div class="progress image-upload-progess-bar" id="profile-image-upload-bar">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="00"
                                             aria-valuemin="0"
                                             aria-valuemax="100" style="width: 0%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <hr>
                
                
            </div>
            <table class="table table-condensed table-hover">
                    <thead>
                            <tr>
                                    <th colspan="3">Información de contacto</th>
                            </tr>
                    </thead>
                    <tbody>                            
                            <tr>
                                    <td>email:</td>
                                    <td>
                                    <a href="">
                                            <?=$model->email;?>
                                    </a></td>
                                    <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                            </tr>
                            <?php if($model->telephone!=null && $model->telephone !="") { ?>
                            <tr>
                                    <td>phone:</td>
                                    <td><?=$model->telephone?></td>
                                    <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                            </tr>
                            <?php } ?>
                            <?php if($model->skype!=null && $model->skype !="") { ?>
                            <tr>
                                    <td>skype</td>
                                    <td>
                                    <a href="">
                                            <?=$model->skype?>
                                    </a></td>
                                    <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                            </tr>
                             <?php } ?>
                    </tbody>
            </table>            
        </div>
    </div>
    <div class="col-sm-7 col-md-8">
            <!-- sin uso -->
    </div>
</div>

