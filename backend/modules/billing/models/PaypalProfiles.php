<?php

namespace backend\modules\billing\models;

use Yii;

/**
 * This is the model class for table "paypal_profiles".
 *
 * @property integer $id
 * @property integer $user
 * @property integer $membership
 * @property string $pyp_profile_id
 * @property integer $plan
 * @property integer $state
 * @property string $created_at
 * @property string $start_date
 * @property string $end_date
 */
class PaypalProfiles extends \yii\db\ActiveRecord
{
    // 0: Created, 1: In use; 2: Canceled
    const STATE_CREATED = 0;
    const STATE_USED = 1;
    const STATE_CANCELED = 2;
    
    public static $STATES_ARRAY = [
        '0' => 'Creada', 
        '1' => 'En uso', 
        '2' => 'Cancelada', 
    ] ;
        
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paypal_profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'membership', 'pyp_profile_id', 'plan'], 'required'],
            [['user', 'membership', 'plan', 'state'], 'integer'],
            [['created_at', 'start_date', 'end_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user' => Yii::t('app', 'Usuario'),
            'membership' => Yii::t('app', 'Membresía'),
            'pyp_profile_id' => Yii::t('app', 'ID de Perfil'),
            'plan' => Yii::t('app', 'Plan'),
            'state' => Yii::t('app', 'Estado'),
            'created_at' => Yii::t('app', 'Creado'),
            'start_date' => Yii::t('app', 'Inicio Perfil'),
            'end_date' => Yii::t('app', 'Fin Perfil'),
        ];
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
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
               ],
               'value' => new \yii\db\Expression('NOW()'),
           ],
       ];
   } 
}
