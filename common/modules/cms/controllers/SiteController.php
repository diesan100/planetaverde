<?php
namespace common\modules\cms\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsPostContent;
use common\modules\cms\models\CmsCategory;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'objects-list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'login';
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        $this->layout = 'login';
        
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionObjectsList()
    {
        $type = Yii::$app->request->post()['type'];
        $case = null;
        $list = null;
        switch ($type):
            case 0: // Single post
                $list = CmsPostContent::findAll(["STATE"=>  CMSConstants::$CMS_CONTENT_STATE_PUBLISHED]);
                $case = "upper";
                break;
            case 1: // Post category
                $list = CmsCategory::find()->all();
                $case = "upper";
                break;
            case 2: // Frontsite Signup                
                break;
            case 3: // Frontsite login                
                break;
            //case 4: // Course list
            //    $list = EcProgram::findAll(["state"=>  CMSConstants::$CMS_CONTENT_STATE_PUBLISHED]);
            //    $case = "lower";
            //    break;
            //case 5: // Course detail   
            //    $list = EcCourse::findAll(["state"=>  CMSConstants::$CMS_CONTENT_STATE_PUBLISHED]);
            //    $case = "lower";
            //    break;
            //case 6: // Colleges list                
            //    break;
            //case 7: // College detail   
            //    $list = EcCollege::findAll(["state"=>  CMSConstants::$CMS_CONTENT_STATE_PUBLISHED]);
            //    $case = "lower";
            //    break;
        endswitch;
       
        
        return $this->renderAjax('objectsList', ["list"=>$list, "case"=>$case]);
    }
}
