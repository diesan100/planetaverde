<?php

namespace backend\modules\billing\models;

use Yii;

/**
 * This is the model class for table "paypal_tx".
 *
 * @property string $txn_id
 * @property string $txn_type
 * @property string $payer_id
 * @property string $recurring_payment_id
 * @property integer $membership
 * @property string $created_at
 */
class PaypalTx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paypal_tx';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txn_id', 'txn_type', 'payer_id', 'recurring_payment_id'], 'required'],
            [['membership'], 'integer'],
            [['created_at', 'membership'], 'safe'],
            [['txn_id'], 'string', 'max' => 255],
            [['txn_type', 'payer_id', 'recurring_payment_id'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'txn_id' => Yii::t('app', 'Tx ID'),
            'txn_type' => Yii::t('app', 'Txn Type'),
            'payer_id' => Yii::t('app', 'Payer ID'),
            'recurring_payment_id' => Yii::t('app', 'Recurring Payment ID'),
            'created_at' => Yii::t('app', 'Creado'),
            'membership' => Yii::t('app', 'Membresía'),
        ];
    }
}
