<?php

namespace common\modules\cms\controllers;

use Yii;
use common\modules\cms\controllers\CmsPostContentController;
use common\modules\cms\models\CmsPostContent;
use common\modules\cms\models\CmsPostContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CmsPostContentController implements the CRUD actions for CmsPostContent model.
 */
class CmsPostContentController extends Controller
{
    /*
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
     * */
     
    
    public function behaviors()
    {
        return [
            /*
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => false,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
             * */
             
        ];
    }


    /**
     * Lists all CmsPostContent models.
     * @return mixed
     */
    public function actionIndex($msg=null)
    {
        $searchModel = new CmsPostContentSearch();
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
     * Displays a single CmsPostContent model.
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
     * Creates a new CmsPostContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['no_wrapp'] = true;        
        $model = new CmsPostContent();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Post"]);
            return $this->redirect(['update', 'id' => $model->ID, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsPostContent model.
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
            $this->view->params['notification_msg'] = Yii::t('app', '{className} successfully updated.', ["className"=>"Post"]);
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        return $this->render('update', [
                'model' => $model,
        ]);   
    }

    /**
     * Deletes an existing CmsPostContent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $notification_msg = Yii::t('app', '{className} successfully deleted.', ["className"=>"Category"]);            
        
        return $this->redirect(['index', 'msg'=>$notification_msg]);
    }

    /**
     * Finds the CmsPostContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsPostContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsPostContent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
