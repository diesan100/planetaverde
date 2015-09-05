<?php

namespace app\modules\destinations\controllers;

use Yii;
use backend\modules\destinations\models\Lodge;
use backend\modules\destinations\models\LodgeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LodgeController implements the CRUD actions for Lodge model.
 */
class LodgeController extends Controller
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
     * Lists all Lodge models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LodgeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lodge model.
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
     * Creates a new Lodge model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['no_wrapp'] = true;
        
        $model = new Lodge();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Lodge"]);
            return $this->redirect(['update', 'id' => $model->id, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Lodge model.
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
                    
            $this->view->params['notification_msg'] = Yii::t('app', '{className} successfully updated.', ["className"=>"Lodge"]);
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        
        return $this->render('update', [
                'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lodge model.
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
     * Finds the Lodge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lodge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lodge::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
