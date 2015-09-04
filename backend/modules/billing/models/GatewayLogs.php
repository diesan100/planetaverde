<?php

namespace backend\modules\billing\models;

use Yii;
use common\mail\MyMailPagosAdmin;

/**
 * This is the model class for table "gateway_logs".
 *
 * @property integer $id
 * @property string $gateway
 * @property integer $type
 * @property string $message
 * @property string $timestamp
 * @property string $user_email
 */
class GatewayLogs extends \yii\db\ActiveRecord
{
    const LOG_TYPE_DEBUG                = "Debug";
    const LOG_TYPE_ERROR                = "Error";
    const LOG_TYPE_COMPLETED            = "Pago Recurrente Completado";
    const LOG_TYPE_PROCESSING           = "Procesando";
    const LOG_TYPE_IPN_RESPONSE         = "Respuesta IPN";
    const LOG_TYPE_IPN_RESPONSE_ERROR   = "Error Respuesta IPN";
    const LOG_TYPE_PROFILE_CREATION     = "Crear perfil";
    const LOG_TYPE_PROFILE_DELETION     = "Eliminar perfil";
    const LOG_TYPE_CALLING_GATEWAY      = "Llamando a Pasarela";
    const LOG_TYPE_PAYMENT_ISSUE        = "Incidencia con un pago";
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gateway_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['timestamp'], 'safe'],
            [['type'], 'string', 'max' => 255],
            [['gateway'], 'string', 'max' => 20],
            [['message'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gateway' => Yii::t('app', 'Gateway'),
            'type' => Yii::t('app', 'Type'),
            'message' => Yii::t('app', 'Message'),
            'timestamp' => Yii::t('app', 'Timestamp'),
        ];
    }
    
    
    /**
     * Logs a message from Paypal Gateway
     * 
     * @param type $type
     * @param type $message
     */
    public static function logPaypal($type, $message, $emailAdmin , $user_email = null) {
        $log = new GatewayLogs();
        $log->type = $type;
        $log->message = $message;
        $log->gateway = "Paypal";
        
        if(isset($user_email)) {
           $log->user_email = $user_email;
        }
        
        $log->save();
        
        if($emailAdmin) {
            if(isset($user_email)) {
                MyMailPagosAdmin::send("Paypal (" . $user_email . "): " . $type, $message);
            } else {
                MyMailPagosAdmin::send("Paypal: " . $type, $message);
            }
        }
    }
    
    /**
     * Logs a message from RedSys Gateway
     * @param type $type
     * @param type $message
     */
    public static function logRedSys($type, $message, $emailAdmin, $user_email = null) {
        $log = new GatewayLogs();
        $log->type = $type;
        $log->message = $message;
        $log->gateway = "RedSys";
        
        if(isset($user_email)) {
           $log->user_email = $user_email;
        }
           
        $log->save();
        
        if($emailAdmin) {
            if(isset($user_email)) {
                MyMailPagosAdmin::send("Redsys (" . $user_email . "): " . $type, $message);
            } else {
                MyMailPagosAdmin::send("Redsys: " . $type, $message);
            }
        }
    }
}
