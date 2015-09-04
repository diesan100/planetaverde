<?php
namespace usersbackend\modules\users\models;

use Yii;


/**
 * User model
 *
 * @property integer $url_tpv
 * @property string $password
 * @property string $shop_name
 * @property string $shop_code
 * @property string $terminal
 * @property string $order
 * @property string $amount
 * @property string $urlMerchant
 * @property string $productDesc
 */
class RedSysPaymentForm extends \yii\base\Model
{

    const TRANSACTION_TYPE_INITIAL = 5;
    const TRANSACTION_TYPE_NEXT_PAYMENTS = 6;
    
    public $url_tpv;
    public $password;
    public $shop_name;
    public $shop_code;    
    public $terminal;
    public $order;
    public $amount = "978";
    public $urlMerchant;
    public $productDesc;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }
    
    
    
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [];
    }
    
   
}
