<?php

namespace app\modules\trips\controllers;

use Yii;
use backend\modules\trips\models\GroupTrip;
use backend\modules\trips\models\GroupTripSearch;
use backend\modules\trips\models\GroupTripItem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GrouptripController implements the CRUD actions for GroupTrip model.
 */
class GrouptripController extends Controller
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
     * Lists all GroupTrip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupTripSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupTrip model.
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
     * Creates a new GroupTrip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GroupTrip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$notification_msg = Yii::t('app', '{className} successfully created. Please add accommodations.', ["className"=>"GroupTrip"]);
        	return $this->redirect(['update', 'id' => $model->id, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GroupTrip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $msg = null)
    {
    	$this->view->params['no_wrapp'] = true;
    	
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	$model->save();
        
        	$this->view->params['notification_msg'] = Yii::t('app', '{className} successfully updated.', ["className"=>"GroupTrip"]);
        } else if($msg!=null) {
        	$this->view->params['notification_msg'] = $msg;
        }
        
        return $this->render('update', [
        		'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GroupTrip model.
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
     * Finds the GroupTrip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupTrip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GroupTrip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /* GroupTrip Item Control */
    
    public function actionAdd_item()
    {
    	$item = new GroupTripItem;
    	
    	if ($item->load(Yii::$app->request->post()) && $item->save()) {
    		echo 'success';
    	} else {
    		echo json_encode($item->getErrors());
    	}
    }
    
    public function actionDelete_item($id)
    {
    	$item = GroupTripItem::findOne($id);
    	if($item && $item->delete())
    		echo 'success';
    	else
    		echo 'failure';
    }
}
