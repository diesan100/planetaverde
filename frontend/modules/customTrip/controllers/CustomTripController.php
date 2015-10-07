<?php

namespace frontend\modules\customTrip\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class CustomTripController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [                    
                    [
                        'actions' => ['index', 'add-extension'],
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
    public function actions() {
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

    

    public function actionIndex() {
        $this->view->params['parent_current_item'] = null;
        $this->view->params['current_item'] = null;
        return $this->render('configurator');
    }
    
    
    public function actionAddExtension() {
        $this->view->params['parent_current_item'] = null;
        $this->view->params['current_item'] = null;
        return $this->render('addExtension');
    }
    
}
