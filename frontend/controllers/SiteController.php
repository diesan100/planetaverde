<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use common\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\modules\cms\models\CmsPage;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsPostContent;
use \yii\web\HttpException;
use \usersbackend\modules\users\models\Membership;
use common\modules\cms\models\CmsMenuItem;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
              ], */
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

    /**
     * Shows a category´s post list
     * @param type $category
     */
    public function actionCategory($category = NULL) {
        
    }

    /**
     * Shows a post
     * @param type $post
     */
    public function actionPost($post = NULL) {
        
    }

    /**
     * Shows a CMS page
     * 
     * NOTE: THere is a few places where 404 is thrown, this should never happen
     * 
     * @param type $id
     * @return type
     */
    public function actionPage($itemParent = NULL, $itemTitle = NULL) {

        $logger = \common\utils\MyLogger::getInstance("cms.log");
        $logger->logInfo("actionPage!!!, itemTitle = " . $itemTitle . " itemParent = " . $itemParent);


        $this->view->params['parent_current_item'] = NULL;
        $this->view->params['current_item'] = NULL;
        $title = "No title";
        //var_dump(Yii::t('app', Yii::$app->request->url));
        // 1. Get page
        // If there is no page we search for the home page
        if (!isset($itemTitle) || $itemTitle == NULL) {
            $page = CmsPage::findOne(['is_home' => 1]);

            //throw new HttpException('404', Yii::t('app', "Vamos a la home porque no hay título de página"));
        } else {
            // Get page id by menu item title
            $itemTitle = str_replace("-", " ", $itemTitle);
            $this->view->params['current_item'] = $itemTitle;

            $menuItem = CmsMenuItem::findOne(['title' => $itemTitle]);

            if (!isset($menuItem) || $menuItem == null) {
                //$this -> render( 'error', array( 'error' => "CONTENT NOT FOUND" ) );
                throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND__"));
            }

            //$page = CmsPage::findOne(['is_home'=>1]);
            $page = CmsPage::findOne(['id' => $menuItem->PAGE]);

            if (!isset($page) || $page == null) {
                throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND=="));
            }

            // If there is parent item we pass it to the main layout to be treate within menu
            if (isset($itemParent) || $itemParent != NULL) {
                $this->view->params['parent_current_item'] = $itemParent;
            }
        }

        if ($page == null) {
            throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND**"));
        } else {

            $title = $page->TITLE;
            if ($page->TYPE == CMSConstants::$CMS_PAGE_HOME) {

                $this->view->title = $page->TITLE;

                $post = CmsPostContent::findOne(['ID' => $page->CONTENT_ID]);

                if (isset($post)) {
                    $logger->logInfo("content = " . $post->ID);
                    $content = $this->renderPartial("contentHome", ["content" => $post->CONTENT, "title" => $post->TITLE]);
                } else {
                    throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND. Content Id = " . $page->ID));
                }

                $this->view->params['cms_page'] = $page;
            } else if ($page->TYPE == CMSConstants::$CMS_PAGE_DESTINATION) {
                
            } else if ($page->TYPE == CMSConstants::$CMS_PAGE_POST || $page->IS_HOME) {

                $this->view->title = $page->TITLE;

                $post = CmsPostContent::findOne(['ID' => $page->CONTENT_ID]);

                if (isset($post)) {
                    $logger->logInfo("content = " . $post->ID);
                    $content = $this->renderPartial("contentPage", ["content" => $post->CONTENT]);
                } else {
                    throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND. Content Id = " . $page->ID));
                }

                $this->view->params['cms_page'] = $page;

                /* if($page->IS_HOME) {
                  return $this->actionHome();
                  } */
            } else if ($page->TYPE == CMSConstants::$FRONT_SIGNUP_PAGE) {

                $action_type = Yii::$app->request->post('action_type');

                if (isset($action_type) && $action_type === "login") {
                    return $this->actionLogin(true);
                } else {
                    return $this->actionSignup();
                }
            } else {
                throw new HttpException('404', Yii::t('app', "CONTENT NOT FOUND++" . $page->TYPE));
            }
        }

        return $this->render('index', array(
                    'content' => $content,
                    'title' => $title,
        ));
    }

    /**
     * Students Login into e-campus
     * 
     * @param type $returnSignup It´s true if has to come back to signup page in case of
     * failed sign in
     * @return type
     */
    public function actionLogin($returnSignup = NULL) {
        $this->view->params['parent_current_item'] = NULL;
        $this->view->params['current_item'] = NULL;

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(\yii\helpers\Url::to(["/user/idnex"]));
        } else {
            if (isset($returnSignup) && $returnSignup) {
                return $this->render('signup', [
                            'signup_model' => new SignupForm(),
                            'model' => $model
                ]);
            } else {
                return $this->render('login', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * 
     * @param type $plan_id
     * @return type
     */
    public function actionSignup($plan_id = null) {

        // Si ya está logado, se redirige al usersbackend
        if (!Yii::$app->user->isGuest) {
            //$this->redirect(\yii\helpers\Url::to(["site/index"]));
            return $this->redirect("/planetaverde/frontend/web/");
        }

        $this->view->params['parent_current_item'] = NULL;
        $this->view->params['current_item'] = NULL;
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                Yii::$app->mailer->compose()
                        ->setFrom('demo.narola@gmail.com')
                        ->setTo($user->email)
                        ->setSubject('Planetaverde SignUP!!')
                        ->setHtmlBody($_SERVER['DOCUMENT_ROOT'] . '<h1>Thank you for SignUP!!!</h1>')
                        ->send();
                if (Yii::$app->getUser()->login($user)) {
                    //  $this->redirect('/planetaverde/frontend/web/');
                    return $this->redirect(Yii::getAlias("@usersbackend_web") . "/planetaverde/frontend/web/");
                }
                /* if (Yii::$app->getUser()->login($user)) {
                  if (Yii::$app->user->identity->membership->state == Membership::STATUS_SIGNING_UP_NOT_FREE) {
                  return $this->redirect(Yii::getAlias("@usersbackend_web") . "/users/subscription/payment");
                  } else {
                  return $this->redirect(Yii::getAlias("@usersbackend_web") . "/projects/site/index?modal=new_project");
                  }
                  } */
            }
        }

        return $this->render('signup', [
                    'title' => Yii::t('app', 'Signup'),
                    'signup_model' => $model,
                    'login_model' => new LoginForm()
        ]);
    }

    /**
     * Logout
     * @return type
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Contact, ¿En uso?
     * 
     * @return type
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Request password reset
     * 
     * @return type
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Action reset password
     * 
     * @param type $token
     * @return type
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    /**
     * Obsolet code, just redirection
     * 
     * @return type
     */
    public function actionIndex(/* $page=NULL */) {
        return $this->redirect('site/page', 1);
    }

    /**
     * Customized error
     * 
     * @return type
     */
    public function actionCustomerror() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception, 'texto' => "texto"]);
        }
    }

    /*
      public function actionAbout()
      {
      return $this->render('about');
      }
     */

    public function actionHome() {
        return $this->render('home');
    }

}
