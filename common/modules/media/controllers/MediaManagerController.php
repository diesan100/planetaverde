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
class MediaManagerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CmsImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CmsImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmsImages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CmsImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::trace("Creating new image in repository");
                
        $model = new CmsImages();

        if ($model->load(Yii::$app->request->post())) {
            // Manage image
            
            Yii::trace("Form validation passed");
            
            $img = \yii\web\UploadedFile::getInstance($model, 'URL');
            
            // Builds image URL / Path
            $image_url = "uploads/". $img->name;

            // Save the image
            $img->saveAs($image_url);
            

            // Set up properties in model
            $model->NAME = $img->name;
            $model->MIME = $img->type;
            
            list($w, $h) = getimagesize($image_url);
            
            $model->WIDTH = $w;
            $model->HEIGHT = $h;
            $model->URL = $image_url;
            
            
            // Save file in disk
            // TODO: Add user name as a folder
            
            
            //var_dump($url);
            
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        } else {
            Yii::trace("Form validation not passed");
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CmsImages model.
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
     * Finds the CmsImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionAjaxImageList() {
        
        $this->enableCsrfValidation = false;
        
        $searchModel = new CmsImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('ajaxImageList', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionLoadImageData($id) {
        
        $this->enableCsrfValidation = false;
        
        $json = array();
        $json['error'] = false;
        $json['name'] = "name";
        $json['url'] = "url";
        
        $image = CmsImages::findOne($id);
        
        return $this->renderAjax("imageDetails", ["image" =>$image]);
    }
}
