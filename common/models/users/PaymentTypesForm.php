<?php

namespace usersbackend\modules\users\models;

use Yii;

/**
 * This is the model class for table "membership".
 *
 */
class PaymentTypesForm extends \yii\base\Model
{
    const PAYMENT_METHOD_PAYPAL = 0;
    const PAYMENT_METHOD_REDSYS = 1;
    
    public $payment_type;
    public $legal_contitions;
    public $plan_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_type'], 'integer'],
            [['plan_id', 'legal_contitions'], 'required'],
            [['payment_type'], 'required', 'message' => Yii::t("app", 'Debe seleccionar un tipo de pago')],
            [['payment_type', 'plan_id', 'legal_contitions'], 'safe'],            
            ['legal_contitions', 'required', 'on' => ['payment'], 'requiredValue' => 1, 'message' => Yii::t("app", 'Debe aceptar las condiciones de uso')],  
        ];
    }
    
    public function init() {
        parent::init();
        //$this->payment_type = PaymentTypesForm::PAYMENT_METHOD_PAYPAL;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_type' => Yii::t('app', 'Tipo de pago'),
            'legal_contitions' => Yii::t('app', 'Acepto las condiciones de uso.'),
        ];
    }
    
}