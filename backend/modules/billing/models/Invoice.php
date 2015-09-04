<?php

namespace backend\modules\billing\models;

//require_once('fpdf.php');
//require_once('fpdi.php');
        
use Yii;
use \yii\db\BaseActiveRecord;
use \yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use \yii\helpers\Html;
use \yii\helpers\Url;
use common\models\User;
use \common\utils\MyprojecttUtils;

/**
 * This is the model class for table "invoice".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property integer $state
 * @property string $net_amount
 * @property string $total_amount
 * @property string $taxes
 * @property string $discount
 * @property string $date_to
 * @property string $date_from
 * @property string $created_at
 * @property string $updated_at
 * @property string $error
 * @property string $pyp_profile_id
 * @property string $pyp_payer_id
 * @property string $pyp_token
 * @property string $description
 * @property string $gateway_type
 * @property string $plan_name
 * @property string $number
 * @property string $promo_code
 * @property string $user_name
 * @property string $user_surname
 * @property string $user_email
 * @property string $razon_social
 * @property string $nif
 * @property string $address_line_1
 * @property string $address_line_2
 * @property integer $zip_code
 * @property string $city
 * @property string $province
 * @property integer $country
 * @property integer $from_billing_d
 * 
 */
class Invoice extends \yii\db\ActiveRecord
{
    
    const INVOICE_STATE_STARTED = 0;
    const INVOICE_STATE_PROCESSING = 1;
    const INVOICE_STATE_COMPLETED = 2;
    const INVOICE_STATE_COMPLETED_FREE = 3;
    const INVOICE_STATE_ERROR = 5;
    
    public static $INVOICE_STATES_ARRAY = [
        0=>"Iniciado",
        1=>"Procesando",
        2=>"Completado",
        3=>"Completado gratis",
        5=>"Error",
    ];
    
    //public $plan_name;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    public function init() {
        parent::init();
        //$this->state = Invoice::INVOICE_STATE_CREATED;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [            
            [['id', 'user_id', 'plan_id', 'state', 'zip_code', 'country', 'from_billing_d'], 'integer'],
            [['net_amount', 'taxes', 'total_amount'], 'number'],
            [['date_to', 'date_from', 'created_at', 'updated_at', 'number', 'promo_code', 'discount', 'user_id'], 'safe'],
            [['error', 'description'], 'string', 'max' => 500],
            [['pyp_profile_id', 'pyp_payer_id', 'pyp_token', 'gateway_type', 'number', 'razon_social', 'address_line_1', 'address_line_2', 'city', 'province', 'user_name', 'user_surname', 'user_email', 'plan_name'], 'string', 'max' => 255],
            [['nif'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Usuario'),
            'plan_id' => Yii::t('app', 'Plan'),
            'state' => Yii::t('app', 'Estado'),
            'net_amount' => Yii::t('app', 'Cantidad neta'),
            'taxes' => Yii::t('app', 'Impuestos'),
            'total_amount' => Yii::t('app', 'Importe total'),
            'date_to' => Yii::t('app', 'Fecha hasta'),
            'date_from' => Yii::t('app', 'Fecha desde'),
            'created_at' => Yii::t('app', 'Fecha'),
            'updated_at' => Yii::t('app', 'Actualizado'),
            'error' => Yii::t('app', 'Error'),
            'pyp_profile_id' => Yii::t('app', 'Id de profile de Paypal'),
            'pyp_payer_id' => Yii::t('app', 'Id de pagador de Paypal'),
            'pyp_token' => Yii::t('app', 'Token de Paypal'),
            'description' => Yii::t('app', 'Description'),
            'gateway_type' => Yii::t('app', 'Forma de pago'),
            'number' => Yii::t('app', 'Número de factura'),
            'promo_code' => Yii::t('app', 'Código promocional'),
            'discount' => Yii::t('app', 'Descuento'),
            'razon_social' => Yii::t('app', 'Razon Social'),
            'nif' => Yii::t('app', 'CIF/NIF'),
            'address_line_1' => Yii::t('app', 'Primera linea de dirección'),
            'address_line_2' => Yii::t('app', 'Segunda linea de dirección'),
            'zip_code' => Yii::t('app', 'Código Postal'),
            'city' => Yii::t('app', 'Localidad'),
            'province' => Yii::t('app', 'Provincia'),
            'country' => Yii::t('app', 'País'),
            'from_billing_d' => Yii::t('app', 'Ya copiado desde datos de facturación'),            
            'user_name' => Yii::t('app', 'Nombre'),
            'user_surname' => Yii::t('app', 'Apellidos'),
            'user_email' => Yii::t('app', 'Email'),
            'plan_name' => Yii::t('app', 'Nombre del plan'),
        ];
        
        /*
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'plan_id' => Yii::t('app', 'Plan ID'),
            'state' => Yii::t('app', 'State'),
            'net_amount' => Yii::t('app', 'Net Amount'),
            'taxes' => Yii::t('app', 'Taxes'),
            'date_to' => Yii::t('app', 'Date To'),
            'date_from' => Yii::t('app', 'Date From'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'error' => Yii::t('app', 'Error'),
            'pyp_profile_id' => Yii::t('app', 'Pyp Profile ID'),
            'pyp_payer_id' => Yii::t('app', 'Pyp Payer ID'),
            'pyp_token' => Yii::t('app', 'Pyp Token'),
            'description' => Yii::t('app', 'Description'),
        ];*/
    }
    
    /**
    * @inheritdoc
    */
   public function behaviors()
   {
       return [
           'timestamp' => [
               'class' => TimestampBehavior::className(),
               'attributes' => [
                   BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                   BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
               ],
               'value' => new Expression('NOW()'),
           ],
       ];
   } 
   
   /**
     * Devuelve las acciones del listado dependiendo de los permisos del usuario
     * @return type
     */    
    public function getDropdownActions() {
        
        return $this->getPrintBillButton();
        
    }
    
     /**
     * Generates dropdown edit button
     * @return type
     */
    private function getPrintBillButton() {

        if($this->state == Invoice::INVOICE_STATE_COMPLETED) {
            $label = Yii::t('app', 'Descargar');
            
            $options = [];
            $options['tabindex'] = '-1';
            $options['data-pjax'] = '0';
            $options['class'] = "btn btn-verde green-download-action-button";
            $billingData = \usersbackend\modules\users\models\BillingData::findOne(["user_id"=>Yii::$app->user->identity->id]);
            if($this->from_billing_d) {
                // los datos ya se han copiado de los datos de facturación
                $url = Url::to(["//users/subscription/download-bill", "id"=>$this->id]);
                return Html::a($label, $url , $options) . PHP_EOL;
            } else if($billingData == null) {
                $options['onclick'] = 'avisoBillingData()';
                return Html::button($label, $options) . PHP_EOL;
            } else {
                $url = Url::to(["//users/subscription/download-bill", "id"=>$this->id]);
                return Html::a($label, $url , $options) . PHP_EOL;
                //$options['onclick'] = 'printBill()';
            }

            
            
        } else {
            return "";
        }
            
    }
    
    
    /**
     * Generates dropdown edit button
     * @return type
     */
    public function getBackendPrintBillButton() {

        if($this->state == Invoice::INVOICE_STATE_COMPLETED) {
            $label = Yii::t('app', 'Descargar');
            
            $options = [];
            //$options['tabindex'] = '-1';
            //$options['data-pjax'] = '0';
            //$options['class'] = "btn btn-verde green-download-action-button";
            $billingData = \usersbackend\modules\users\models\BillingData::findOne(["user_id"=>$this->user_id]);
            if($billingData == null) {
                $label = Yii::t('app', 'N.D.');
                $options['onclick'] = 'alert("No se han introducido los datos de facturación.")';
                return Html::button($label, $options) . PHP_EOL;
            } else {
                $url = Url::to(["//billing/invoice/download-bill", "id"=>$this->id]);
                return Html::a($label, $url , $options) . PHP_EOL;
                //$options['onclick'] = 'printBill()';
            }

            
            
        } else {
            return "";
        }
            
    }
    
    public function getDownloadAbsolutePath() {
        $usersDirectory = User::getUserFolder(Yii::$app->user->identity->id);
        
        $invoicesPath = $usersDirectory.DIRECTORY_SEPARATOR."invoices";
        
        if(!file_exists($invoicesPath)) {
            \yii\helpers\BaseFileHelper::createDirectory($invoicesPath);
        }
        
        if($this->number == null || $this->number =="") {            
           $this->generateNumeration();
        }
        
        
        return $invoicesPath . DIRECTORY_SEPARATOR . $this->number . ".pdf";
    }
    
    /**
     * Generates the numeration for this invoice: 
     * yy_xxxid
     */
    public function generateNumeration() {
        $_this_id = "" . $this->id;
        $number = date("y") . "_";
               
        if(strlen($_this_id)<5) {

            for ($x = 0; $x <= (5-strlen($_this_id)); $x++) {
                $number .= "0";
            }
            $number .= $this->id;
        }
       $this->number = $number;
       $this->save();
    }
    
    public function generatePDF($billingData) {
        
        Yii::$classMap['FPDI'] = Yii::getAlias("@vendor").'/fpdf/fpdi.php';
        Yii::$classMap['FPDF'] = Yii::getAlias("@vendor").'/fpdf/fpdf.php';
        //Yii::$classMap['Class2'] = 'path/to/Class2.php';

        $pdfAbsolutePath = $this->getDownloadAbsolutePath();

        //Yii::import('application.vendors.fpdf.*');
        
        // BILL PARAMETERS
        $bill_number = str_replace("_" , "/", $this->number);
        $billing_date = MyprojecttUtils::getFormattedDate($this->date_from, true);
        $billing_period =  MyprojecttUtils::getFormattedDate($this->date_from, true) . " - " . MyprojecttUtils::getFormattedDate($this->date_to, true);
        $client_line_1 = utf8_decode($billingData->razon_social);
        $client_line_2 = "CIF/NIF " .utf8_decode($billingData->nif);
        $client_line_3 = utf8_decode($billingData->address_line_1);
        $client_line_4 = utf8_decode($billingData->address_line_2);
        $client_line_5 = $billingData->zip_code . " - " . utf8_decode($billingData->city);
        $client_line_6 = utf8_decode($billingData->state);
        $plan_name = utf8_decode($this->plan_name);
        $net_price = $this->net_amount;
        $taxes = $this->taxes;
        $total_amount = $this->total_amount;
        //$next_payment_date = "11/11/2010";

        // initiate FPDI
        $pdf = new \FPDI();

        // add a page
        $pdf->AddPage();

        // set the source file
        $pdf->setSourceFile(__DIR__ . "/bill_template.pdf");

        // import page 1
        $tplIdx = $pdf->importPage(1);

        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplIdx);

        // now write some text above the imported page
        $pdf->SetFont('Helvetica');


        /******* Place bill number ******/
        $pdf->SetTextColor(33, 25, 1);
        $pdf->SetFontSize(18);
        $pdf->SetXY(50, 43);
        $pdf->Write(0, $bill_number);

        /******* Set billing date ******/
        $pdf->SetFontSize(10);
        $pdf->SetXY(150, 41);
        $pdf->SetTextColor(56, 169, 98);
        $pdf->Write(0, "Fecha de factura: " . $billing_date);


        /******* set Billing period ******/
        $pdf->SetFontSize(10);
        $pdf->SetXY(128, 46);
        $pdf->SetTextColor(33, 25, 1);
        $pdf->Write(0, "Periodo facturado: " . $billing_period);


        /******* Set client lines ******/
        $pdf->SetFontSize(11);

        // Line 1: Nombre
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(20, 105);
        $pdf->Write(0, $client_line_1);

        // Line 2
        $pdf->SetFontSize(10);
        $pdf->SetTextColor(33, 25, 1);
        $pdf->SetXY(20, 110);
        $pdf->Write(0, $client_line_2);

        // Line 3
        $pdf->SetXY(20, 115);
        $pdf->Write(0, $client_line_3);

        // Line 4
        $pdf->SetXY(20, 120);
        $pdf->Write(0, $client_line_4);

        // Line 5
        $pdf->SetXY(20, 125);
        $pdf->Write(0, $client_line_5);

        // Line 6
        $pdf->SetXY(20, 130);
        $pdf->Write(0, $client_line_6);

        /**** Set plan name ******/
        $pdf->SetFontSize(35);
        $pdf->SetXY(20, 160);
        $pdf->SetTextColor(56, 169, 98);
        $pdf->Write(0, $plan_name);


        /**** Set amounts *****/
        // Set net amount
        $pdf->SetFontSize(15);
        $pdf->SetXY(179, 178);
        $pdf->SetTextColor(56, 169, 98);
        $pdf->Write(0, $net_price . iconv("UTF-8", "CP1250//TRANSLIT", "€"));


        // Set taxes
        $pdf->SetXY(181, 187.5);
        $pdf->Write(0, $taxes . iconv("UTF-8", "CP1250//TRANSLIT", "€"));

        // Set Total amount
        $pdf->SetXY(179, 197);
        $pdf->Write(0, $total_amount . iconv("UTF-8", "CP1250//TRANSLIT", "€"));



        /***** Set Next expected date *****/



        /** Write output PDF ***/
        $pdf->Output($pdfAbsolutePath);
    }

}