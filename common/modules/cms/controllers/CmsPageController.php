<?php

namespace common\modules\cms\controllers;

use Yii;
use common\modules\cms\models\CmsPage;
use common\modules\cms\models\CmsPageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CmsPageController implements the CRUD actions for CmsPage model.
 */
class CmsPageController extends Controller
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
     * Lists all CmsPage models.
     * @return mixed
     */
    public function actionIndex($msg=null)
    {
        $searchModel = new CmsPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmsPage model.
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
     * Creates a new CmsPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['no_wrapp'] = true;
        
        $model = new CmsPage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Page"]);
            return $this->redirect(['update', 'id' => $model->ID, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $msg=null)
    {
        $this->view->params['no_wrapp'] = true;
        
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $this->view->params['notification_msg'] = Yii::t('app', '{className} successfully updated.', ["className"=>"Page"]);
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        return $this->render('update', [
                'model' => $model,
        ]); 
    }

    /**
     * Deletes an existing CmsPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $notification_msg = Yii::t('app', '{className} successfully deleted.', ["className"=>"Page"]);            
        
        return $this->redirect(['index', 'msg'=>$notification_msg]);
    }

    /**
     * Finds the CmsPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsPage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
