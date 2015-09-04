<?php

namespace common\modules\media\controllers;

use Yii;
use common\modules\media\models\CmsImages;
use common\modules\media\models\CmsImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CmsImagesController implements the CRUD actions for CmsImages model.
 */
class MediaUploadContentController extends Controller {
    // TODO: Por supuesto todo temas de validaciones de permisos, más adelante añadir cosas para que cada
    // usuario pueda tener su propia galeria, añadiendo el id de usuario y cosas así.
    
    public function actionUpload() {
        
        $this->enableCsrfValidation = false;
        
        $fileName = 'file';
        $uploadPath = Yii::getAlias("@frontend") . "/web/uploads";

        if (isset($_FILES[$fileName])) {
            $file = \common\modules\media\models\MyUploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database
                $image = new CmsImages();
                $image->NAME = $file->name;
                $image->MIME = $file->type;
                
                list($w, $h) = getimagesize($uploadPath . '/' . $file->name);
            
                $image->WIDTH = $w;
                $image->HEIGHT = $h;
                $image->URL = 'uploads/' . $file->name;
            
                $image->save();
                //var_dump($file);
                //->{$attr};
                //$file->{'image-id'} = $image->ID;
                //var_dump($image);
                //$image->__set("image-id", $image->ID);
                
                $file->id = $image->ID;  
                $file->url = Yii::getAlias("@frontend_web") . '/uploads/' . $file->name;

                echo \yii\helpers\Json::encode($file);
            }
        }
    }
}
