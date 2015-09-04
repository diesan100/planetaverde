<?php

namespace common\modules\cms\controllers;

use Yii;
use common\modules\cms\models\CmsWidgetPosition;
use common\modules\cms\models\CmsWidgetPositionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CmsWidgetPositionController implements the CRUD actions for CmsWidgetPosition model.
 */
class CmsWidgetPositionController extends Controller
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
     * Lists all CmsWidgetPosition models.
     * @return mixed
     */
    public function actionIndex($msg=null)
    {
        $searchModel = new CmsWidgetPositionSearch();
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
     * Displays a single CmsWidgetPosition model.
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
     * Creates a new CmsWidgetPosition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsWidgetPosition();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Widget Position"]);
            return $this->redirect(['update', 'id' => $model->ID, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsWidgetPosition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $msg=null)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $this->view->params['notification_msg'] = Yii::t('app', '{className} successfully updated.', ["className"=>"Widget Position"]);
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        return $this->render('update', [
                'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CmsWidgetPosition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

         $notification_msg = Yii::t('app', '{className} successfully deleted.', ["className"=>"Widget Position"]);            
        
        return $this->redirect(['index', 'msg'=>$notification_msg]);
    }

    /**
     * Finds the CmsWidgetPosition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsWidgetPosition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsWidgetPosition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
