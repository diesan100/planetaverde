<?php
namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use common\modules\cms\models\CmsPage;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsPostContent;
use \yii\web\HttpException;


/**
 * Site controller
 */
class DestinationsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [/*
            'access' => [
                
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

   
    
   
    
    /**
     * Obsolet code, just redirection
     * 
     * @return type
     */
    public function actionIndex($area=NULL)
    {
        $content = "";
        $title = "";
        $this->view->params['parent_current_item'] = "Destinations";
        $this->view->params['current_item'] = "Destinations";
        
        if(isset($_GET['areaName']) && $_GET['areaName'] !== ''){
            $areaName = $_GET['areaName'];
        }
        
        if(!isset($area) || $area == null) {
            
            $area = \backend\modules\destinations\models\Area::findOne([\backend\modules\settings\models\Settings::getParamValue("areas-settings", "area-worldmap-id", 1)]);
                        
            $page = CmsPage::findOne(["TYPE"=>  CMSConstants::$CMS_PAGE_HOME , "STATE"=>  CMSConstants::$CMS_CONTENT_STATE_PUBLISHED]);
            
            $post = CmsPostContent::findOne(['ID'=>$page->CONTENT_ID]);

            if($post!=NULL) {
                $content = $post->CONTENT;
                $title = $post->TITLE;              
            } else {
                throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND. Content Id = " . $page->ID));
            }

            $this->view->params['cms_page'] = $page;
        }
        $areaListing = \backend\modules\destinations\models\Area::findAll(["parent"=>1,"featured"=>1]);
        
        /*  if(isset($areaName) && $areaName != ''){
            $area = \backend\modules\destinations\models\Area::findOne([\backend\modules\settings\models\Settings::getParamValue("areas-settings", 5, 1)]);
                        
            $page = CmsPage::findOne(["TYPE"=>  CMSConstants::$CMS_PAGE_DESTINATION , "STATE"=>  CMSConstants::$CMS_CONTENT_STATE_PUBLISHED]);
            
            $post = CmsPostContent::findOne(['ID'=>$page->CONTENT_ID]);

            if($post!=NULL) {
                $content = $post->CONTENT;
                $title = $post->TITLE;              
            } else {
                throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND. Content Id = " . $page->ID));
            }

            $this->view->params['cms_page'] = $page;
            $areaListing = \backend\modules\destinations\models\Area::findAll(["parent"=>5,"featured"=>1]);

        }*/
        
        //$content = $this->renderPartial("contentHome", ["content"=>$post->CONTENT, "title"=>$post->TITLE]);
        
        return $this->render("contentArea", [
                                            "content"=>$post->CONTENT, 
                                            "title"=>$post->TITLE, 
                                            'area'=>$area,
                                            'areaListing'=>$areaListing,
                                ]);
        
        //return $this->redirect('site/page',1);
    }
    
   

    
}
