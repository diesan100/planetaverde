<?php

namespace frontend\modules\user\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class UserFinishedTripsController extends Controller {

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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'edit-profile'],
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

    

    /*
      public function actionAbout()
      {
      return $this->render('about');
      }
     */

    public function actionIndex() {
        $this->view->params['parent_current_item'] = null;
        $this->view->params['current_item'] = null;
        return $this->render('index');
    }

}
