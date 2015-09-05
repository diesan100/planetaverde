<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\helpers\Url;

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
                        'actions' => ['logout', 'index'],
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
         $logger =         \common\utils\MyLogger::getInstance("login.log");
        
        $logger->logInfo("index!!!!!");
        
        $this->view->params['no_wrapp'] = true;
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'login';
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        
        //var_dump($model);
        
        $logger =         \common\utils\MyLogger::getInstance("login.log");
        
        $logger->logInfo("actionLogin");
                
        if ($model->load(Yii::$app->request->post())) {
            
            $logger->logInfo("model loaded");
            $logger->logInfo($model->username);
            $logger->logInfo($model->password);
            
            if($model->login()) {
                $logger->logInfo(Yii::$app->user->isGuest);
                
                $logger->logInfo("this->redirect(['/site/index']");
                return $this->redirect('index');
            } else {
                //var_dump("1");
                return $this->render('login', [
                    'model' => $model,
                ]);
            }            
        } else {
            $logger->logInfo("model NOT loaded");
            $logger->logInfo($model->getErrors());
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
}
