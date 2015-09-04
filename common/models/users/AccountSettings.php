<?php

namespace usersbackend\modules\users\models;

use Yii;

/**
 * This is the model class for table "account_settings".
 *
 * @property integer $user_id
 * @property integer $admin_upload
 * @property integer $admin_delete
 * @property integer $admin_folders
 * @property integer $admin_period
 * @property integer $member_upload
 * @property integer $member_period
 * @property integer $guest_upload
 * @property integer $guest_period
 */
class AccountSettings extends \yii\db\ActiveRecord
{
    const PERIODICITY_INSTANTLY = 0;
    const PERIODICITY_DAILY = 1;
    

    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        
        return 'account_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_upload', 'admin_delete', 'admin_folders', 'admin_period', 'member_upload', 'member_period', 'guest_upload', 'guest_period'], 'integer'],
        ];
    }
    
    public function init() {
        parent::init();
        
        $this->admin_upload = true;
        $this->admin_delete = true;
        $this->admin_folders = true;
        $this->admin_period = AccountSettings::PERIODICITY_INSTANTLY;
        $this->member_upload = true;
        $this->member_period = AccountSettings::PERIODICITY_INSTANTLY;
        $this->guest_upload = true;
        $this->guest_period = AccountSettings::PERIODICITY_INSTANTLY;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'admin_upload' => Yii::t('app', 'Se suban archivos o revisiones nuevas'),
            'admin_delete' => Yii::t('app', 'Se eliminen archivos'),
            'admin_folders' => Yii::t('app', 'Se creen o eliminen carpetas'),
            'admin_period' => Yii::t('app', 'Periodicidad'),
            'member_upload' => Yii::t('app', 'Se suban archivos o revisiones nuevas'),
            'member_period' => Yii::t('app', 'Periodicidad'),
            'guest_upload' => Yii::t('app', 'Se suban archivos o revisiones nuevas'),
            'guest_period' => Yii::t('app', 'Periodicidad'),
        ];
    }
   
}
