<?php

namespace app\modules\billing\controllers;

use Yii;
use backend\modules\billing\models\Invoice;
use backend\modules\billing\models\InvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\utils\paypal\PaypalFuncions;

/**
 * InvoiceController implements the CRUD actions for Invoice model.
 */
class InvoiceController extends Controller
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
     * Lists all Invoice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->params['no_wrapp'] = true;
        
        $searchModel = new InvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //var_dump(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDownloadBill($id) {
        
        $invoice = Invoice::findOne($id);
        //var_dump($invoice->plan_name);
        if($invoice == null) {
            throw new \yii\web\HttpException(404, Yii::t("No encontrado"));
        }
        
        // Check if Invoice has already been generated
        $invoicePath = $invoice->getDownloadAbsolutePath();
        
        $billingData = \usersbackend\modules\users\models\BillingData::findOne(["user_id"=>Yii::$app->user->identity->id]);
        if($billingData == null) {
            return $this->redirect(\yii\helpers\Url::to(['//users/profile/billing-data']));
        } 
        
        if(!file_exists($invoicePath)) {
            $invoice->generatePDF($billingData);
            // Generate PDF           
        }
        
        if($invoice->from_billing_d == false) {
            // We do this only one time
            $invoice->razon_social = $billingData->razon_social;
            $invoice->address_line_1 = $billingData->address_line_1;
            $invoice->address_line_2 = $billingData->address_line_2;
            $invoice->nif = $billingData->nif;
            $invoice->zip_code = $billingData->zip_code;
            $invoice->city = $billingData->city;
            $invoice->country = $billingData->country;
            $invoice->province = $billingData->state;
            $invoice->from_billing_d = true;
            
            $invoice->save();
        }
        //var_dump($invoice->plan_name);
        Yii::$app->getResponse()->sendFile($invoicePath);
    }
    
    /**
     * Displays a single Invoice model.
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
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['no_wrapp'] = true;
                
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Invoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->view->params['no_wrapp'] = true;
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Consulta el estado del profile en Paypal
     * @param type $id
     */
    public function actionPaypalProfileState($id) {
        //$id = Yii::$app->request->get("id");
        $paypal = new PaypalFuncions();
        $response = $paypal->GetRecurringPaymentsProfileDetails($id);
        return $this->renderAjax("paypalPaymentsProfileDetails", ["response" => $response]);
    }

    /**
     * Deletes an existing Invoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
