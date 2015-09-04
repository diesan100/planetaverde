<?php

namespace common\modules\cms\controllers;

use Yii;
use common\modules\cms\models\CmsMenuItem;
use common\modules\cms\models\CmsMenuItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CmsMenuItemController implements the CRUD actions for CmsMenuItem model.
 */
class CmsMenuItemController extends Controller
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
     * Lists all CmsMenuItem models.
     * @return mixed
     */
    public function actionIndex($msg=null)
    {
        $searchModel = new CmsMenuItemSearch();
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
     * Displays a single CmsMenuItem model.
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
     * Creates a new CmsMenuItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsMenuItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Menu Item"]);
            return $this->redirect(['update', 'id' => $model->ID, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Creates a new CmsMenuItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateAjax()
    {
        $model = new CmsMenuItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Menu Item"]);
            return $this->redirect(['//cms/cms-menu/show', 'id' => $model->MENU, 'msg'=>$notification_msg]);
        } else {
            
            $menu = Yii::$app->getRequest()->getQueryParam('MENU');
            if($menu!=null) {
                $model->MENU = $menu;
            }
            
            $parent = Yii::$app->getRequest()->getQueryParam('PARENT_MENU');
            if($parent!=null) {
                $model->PARENT_MENU = $parent;
            }
            
            if($menu!=null) {
                $model->ORDER = CmsMenuItem::getNextOrder($menu, $parent);
            }
                    
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsMenuItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $msg=null)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $this->view->params['notification_msg'] = Yii::t('app', '{className} successfully updated.', ["className"=>"Menu Item"]);
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        return $this->render('update', [
                'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing CmsMenuItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateAjax($id, $msg=null)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $notification_msg = Yii::t('app', '{className} successfully updated.', ["className"=>"Menu Item"]);            
            return $this->redirect(['//cms/cms-menu/show', 'id' => $model->MENU, 'msg'=>$notification_msg]);
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        return $this->renderAjax('update', [
                'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CmsMenuItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

         $notification_msg = Yii::t('app', '{className} successfully deleted.', ["className"=>"Menu Item"]);            
        
        return $this->redirect(['index', 'msg'=>$notification_msg]);
    }

    /**
     * Finds the CmsMenuItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsMenuItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsMenuItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
