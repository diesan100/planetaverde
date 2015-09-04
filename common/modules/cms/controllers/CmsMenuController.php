<?php

namespace common\modules\cms\controllers;

use Yii;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\modules\cms\models\CmsMenu;
use common\modules\cms\models\CmsMenuSearch;

/**
 * CmsMenuController implements the CRUD actions for CmsMenu model.
 */
class CmsMenuController extends Controller
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
     * Lists all CmsMenu models.
     * @return mixed
     */
    public function actionIndex($msg=null)
    {
        $searchModel = new CmsMenuSearch();        
        
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
     * Shows the advanced menu page
     * 
     * @param type $id
     * @param type $msg
     * @return type
     */
    public function actionShow($id = null, $msg=null) {
        
        // Layout
        $this->view->params['no_wrapp'] = true;
        
            /*$id = Yii::$app->getRequest()->get("id");

        $msg = Yii::$app->getRequest()->get("msg");*/
        
        if($id == null) {
            $selected_menu = CmsMenu::find()->orderBy('ID ASC')->one();            
        } else {
            $selected_menu = CmsMenu::findOne($id);
        }            
        
        // Get data for view
        $menu_items = \common\modules\cms\models\CmsMenuItemSearch::getAllChildren($selected_menu->ID);                
        $all_menus = CmsMenu::find()->orderBy('ID ASC')->all();
        
        // Notification message
        if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        
        // Render view
        return $this->render('view', [
            'model' => $selected_menu,
            'menu_items' => $menu_items,
            "all_menus"=>$all_menus,
        ]); 
    }
    
    /**
     * Deletes an existing CmsMenuItem model.
     * If deletion is successful, the browser will be redirected to the 'show menus' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteItem($id)
    {
        // Get menu item and ID
        $menuItem =  \common\modules\cms\models\CmsMenuItem::findOne($id);        
        $menuId = $menuItem->MENU;
        
        // Delete menu and menu items
        $menuItem->delete();

        // Render view
        $notification_msg = Yii::t('app', '{className} successfully deleted.', ["className"=>"Menu Item"]);        
        return $this->redirect(['//cms/cms-menu/show', 'id' => $menuId, 'msg'=>$notification_msg]);
    }

    /**
     * Displays a single CmsMenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $menu_items = \common\modules\cms\models\CmsMenuItemSearch::getAllChildren($id);
        
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'menu_items' => $menu_items,
        ]);
    }

    /**
     * Creates a new CmsMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            $notification_msg = Yii::t('app', '{className} successfully created.', ["className"=>"Menu"]);
            //return $this->redirect(['update', 'id' => $model->ID, 'msg'=>$notification_msg]);
            return $this->redirect(['//cms/cms-menu/show', 'id' => $model->ID, 'msg'=>$notification_msg]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $msg=null, $origin=null)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $msg = Yii::t('app', '{className} successfully updated.', ["className"=>"Menu"]);
            $this->view->params['notification_msg'] = $msg;
        } else if($msg!=null) {
            $this->view->params['notification_msg'] = $msg;
        }
        
        if($origin != null && $origin == "show") {
            return $this->redirect(['//cms/cms-menu/show', 'id' => $id, 'msg'=>$msg]);
        } else {
            return $this->render('update', [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CmsMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

         $notification_msg = Yii::t('app', '{className} successfully deleted.', ["className"=>"Menu"]);            
        
        return $this->redirect(['index', 'msg'=>$notification_msg]);
    }

    /**
     * Finds the CmsMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
