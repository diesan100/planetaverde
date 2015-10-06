<?php
namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsPostContent;
use \yii\web\HttpException;
use backend\modules\destinations\models\Area;
use backend\modules\destinations\models\Lodge;
use backend\modules\trips\models\GroupTrip;
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
    public function actionIndex2($area=NULL)
    {
        $content = "";
        $title = "";
        $this->view->params['parent_current_item'] = "Destinations";
        $this->view->params['current_item'] = "Destinations";
        
        if(isset($_GET['areaName']) && $_GET['areaName'] !== ''){
            $areaName = $_GET['areaName'];
        }
        
        if(!isset($area) || $area == null) { // If area is NULL, get world map,
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
    
   	/**
   	 * Renders destination area
   	 * @param integer $area_id
   	 */
	public function actionIndex($area_name = null)
	{
		$area = null;
		if(!isset($area_name)) 
		{
			$area_id = \backend\modules\settings\models\Settings::getParamValue("areas-settings", "area-worldmap-id", 1); // get world map id 
			$area = Area::findOne($area_id);
		}
		else {
			$area = Area::findOne(['name'=>$area_name]);
		}
		if($area == null)
		{
			throw new HttpException('404', Yii::t('app', "AREA NOT FOUND"));
			return;
		}
		
		$this->view->params['parent_current_item'] = "Destinations";
		$this->view->params['current_item'] = $area->name;
		
		if(!isset($area_name)) // world map, index of destinations
		{
			$areaListing = Area::findAll(["featured"=>1]);
				
			return $this->render("contentHome", [
					'area'=>$area,
					'areaListing'=>$areaListing,
					'news'=>$area->getNews(),
			]);
		}

		if(isset($_GET['pid']) && isset($_GET['ptype'])) 
		{
			$ptype = $_GET['ptype']; // page type
			$pid = $_GET['pid'];
			if ($ptype == 'news') {  // renders news page
				$post = CmsPostContent::findOne([$pid]);
				if($post)
				{
					return $this->render("contentPost", [
						'area'=>$area,	
						'post'=>$post,
					]);
				}
			}
			else if($ptype == 'gt')
			{
				$trip = GroupTrip::findOne([$pid]);
				if($trip)
				{
					return $this->render("contentGroupTrip", [
							'area'=>$area,
							'trip'=>$trip,
							'feedbacks'=>$trip->feedbacks,
					]);
				}
			}
			else if($ptype == 'lodge')
			{
				$lodge = Lodge::findOne([$pid]);
				if($lodge)
				{
					return $this->render("contentLodge", [
						'area'=>$area,
						'lodge'=>$lodge,
						'news'=>$area->getNews(),
						'feedbacks'=>$lodge->feedbacks,
					]);
				}
			}
		}
		
			
		return $this->render("contentArea", [
				'area'=>$area,
				'news'=>$area->getNews(),
				'trips'=>$area->groupTrips,
				'lodges'=>$area->lodges,
				'feedbacks'=>null,
		]);
	}
    
}
