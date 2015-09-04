<?php

namespace app\modules\users\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\UploadedFile;
use common\models\users\UploadProfileImageForm;
use yii\filters\AccessControl;

/**
 * ClientsController implements the CRUD actions for User model.
 */
class ProfileController extends Controller
{
    public $enableCsrfValidation = false;
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'edit', 'profileimageupload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],            
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
                
        $params_array = Yii::$app->request->queryParams;
        
        $dataProvider = $searchModel->search($params_array, common\modules\cms\constants\CMSConstants::$USER_TYPE_CLIENT);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionSettings() {
        $user_id =  Yii::$app->user->id;
        
        $account_settings = \usersbackend\modules\users\models\AccountSettings::findOne($user_id);
        
        // Si el usuario no tiene settings (No debería ocurrir nunca pues se crean al resgistrarse el usuario)
        if($account_settings == null) {
            $account_settings = new \usersbackend\modules\users\models\AccountSettings();
            $account_settings->user_id = Yii::$app->user->identity->id;
            $account_settings->save();
        }
        
        if ($account_settings->load(Yii::$app->request->post()) && $account_settings->save()) {

            $this->view->params['notification_msg'] = Yii::t('app', 'Tus preferencias se han guardado con éxito.');
            
            return $this->render('settings', [
                'model' => $account_settings
            ]);
        } else {
           return $this->render('settings', [
                'model' => $account_settings,
            ]);
        }
        
        
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        $user_id =  Yii::$app->user->identity->id;
        
        return $this->render('profile', [
            'model' => $this->findModel($user_id),
        ]);
    }

    

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEdit()
    {
        $user_id =  Yii::$app->user->id;
        
        $model = $this->findModel($user_id);
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           
            //print_r("<br><br><br>::::::::::::::::::::"  .$model->birthday);
            //print_r("<br><br><br>::::::::::::::::::::"  .date("Y-m-d", strtotime( $model->birthday)));
                
//            date("d-m-Y", strtotime($lastPayment->date_to)
            
            //$date = new DateTime($model->birthday);
            //echo $date->format('d.m.Y'); // 31.07.2012
            //echo $date->format('m-d-Y'); // 31-07-2012

           $model->birthday = "" . date("Y-m-d", strtotime( $model->birthday));//date("Y-d-m"); 
            
           $model->save();
                    
           $this->view->params['notification_msg'] = Yii::t('app', 'Tu perfil se ha guardado con éxito.');
           return $this->render('profile', [
               'model' => $model,
               'editting' => true,
               'delform1' => $model->birthday,
               'delform2' => date("Y-m-d", strtotime( $model->birthday)),
            ]);
        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
        
        
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Handle the banner image upload
     */
    public function actionProfileimageupload()
    {

        $json = array();
        
        $model = new UploadProfileImageForm();

        if (Yii::$app->request->isPost) {
            
            /***********
            ob_start();
            var_dump(Yii::$app->getRequest());
            $result = ob_get_clean();

            $json['dump'] = $result;
            return \yii\helpers\Json::encode($json);    
            
            ********/
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {
                
                // Check/create directory
                $uploadsAbsolutePath = Yii::getAlias("@frontend") . "/web/uploads";
                $usersDirectory = $uploadsAbsolutePath . '/' . Yii::$app->user->identity->id;
                if (!file_exists($usersDirectory)) {
                    \yii\helpers\BaseFileHelper::createDirectory($usersDirectory);
                }
                
                $uploadedFilePath = Yii::getAlias('@frontend_web') . '/uploads/'. Yii::$app->user->identity->id ."/" . Yii::$app->user->identity->username . '.' . $model->file->extension;
                
                // Upload file
                $model->file->saveAs($usersDirectory . "/" . Yii::$app->user->identity->username . '.' . $model->file->extension);
                
                $this->jpegImgCrop($usersDirectory . "/" . Yii::$app->user->identity->username . '.' . $model->file->extension);
                
                // Update users model
                $user = UserSearch::findOne(Yii::$app->user->identity->id);
                $user->picture_url = '/uploads/'. Yii::$app->user->identity->id ."/" . Yii::$app->user->identity->username . '.' . $model->file->extension;
                $user->save();
                
                
                // Build json response
                $json['error'] = false;
                $json['name'] = $model->file->name;
                $json['url'] = $uploadedFilePath;
                $json['size'] = $model->file->size;
                $json['deleteUrl'] = "";
                $json['deleteType'] = "";
                
            }
        }

        return \yii\helpers\Json::encode($json);    
       
    }
    
    
    public function jpegImgCrop($target_url) {//support

        $image = imagecreatefromjpeg($target_url);
        $filename = $target_url;
        $width = imagesx($image);
        $height = imagesy($image);
        //$image_type = imagetypes($image); //IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP | IMG_XPM

        if($width==$height) {

         $thumb_width = $width;
         $thumb_height = $height;

        } elseif($width<$height) {

         $thumb_width = $width;
         $thumb_height = $width;

        } elseif($width>$height) {

         $thumb_width = $height;
         $thumb_height = $height;

        } else {
         $thumb_width = 150;
         $thumb_height = 150;
        }

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ( $original_aspect >= $thumb_aspect ) {

           // If image is wider than thumbnail (in aspect ratio sense)
           $new_height = $thumb_height;
           $new_width = $width / ($height / $thumb_height);

        }
        else {
           // If the thumbnail is wider than the image
           $new_width = $thumb_width;
           $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

        // Resize and crop
        imagecopyresampled($thumb,
               $image,
               0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
               0 - ($new_height - $thumb_height) / 2, // Center the image vertically
               0, 0,
               $new_width, $new_height,
               $width, $height);
        imagejpeg($thumb, $filename, 80);

       }
 
 
}




