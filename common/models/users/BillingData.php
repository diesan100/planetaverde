<?php

namespace usersbackend\modules\users\models;

use Yii;

/**
 * This is the model class for table "billing_data".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $razon_social
 * @property string $nif
 * @property string $address_line_1
 * @property string $address_line_2
 * @property integer $zip_code
 * @property string $city
 * @property string $state
 * @property integer $country
 * @property string $updated_at
 */
class BillingData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'razon_social', 'nif'], 'required'],
            [['user_id', 'zip_code', 'country'], 'integer'],
            [['updated_at'], 'safe'],
            [['razon_social', 'address_line_1', 'address_line_2', 'city', 'state'], 'string', 'max' => 255],
            [['nif'], 'string', 'max' => 20],
            [['user_id'], 'unique']
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
            'razon_social' => Yii::t('app', 'Razon Social'),
            'nif' => Yii::t('app', 'CIF/NIF'),
            'address_line_1' => Yii::t('app', 'Primera linea de dirección'),
            'address_line_2' => Yii::t('app', 'Segunda linea de dirección'),
            'zip_code' => Yii::t('app', 'Código Postal'),
            'city' => Yii::t('app', 'Localidad'),
            'state' => Yii::t('app', 'Provincia'),
            'country' => Yii::t('app', 'País'),
            'updated_at' => Yii::t('app', 'Actualizado'),
        ];
        
        /**
         *  return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'razon_social' => Yii::t('app', 'Razon Social'),
            'nif' => Yii::t('app', 'Nif'),
            'address_line_1' => Yii::t('app', 'Address Line 1'),
            'address_line_2' => Yii::t('app', 'Address Line 2'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
         */
    }
    
    /**
    * @inheritdoc
    */
   public function behaviors()
   {
       return [
           'timestamp' => [
               'class' => \yii\behaviors\TimestampBehavior::className(),
               'attributes' => [
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['updated_at'],
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
               ],
               'value' => new \yii\db\Expression('NOW()'),
           ],
           
       ];
   } 
}
