<?php

namespace backend\modules\settings\models;

use Yii;
use backend\modules\settings\SettingsModule;

/**
 * This is the model class for table "settings".
 *
 * @property string $group_name
 * @property string $description
 * @property string $param_name
 * @property integer $param_type
 * @property integer $param_int_value
 * @property string $param_varchar_value
 * @property string $param_long_value
 */
class Settings extends \yii\db\ActiveRecord
{
    // TODO: IMPLEMENTAR UNA CACHE
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_name', 'param_name', 'param_type'], 'required'],
            [['param_type', 'param_int_value'], 'integer'],
            [['group_name', 'param_name', 'param_varchar_value'], 'string', 'max' => 255],
            [['param_long_value', 'description'], 'string', 'max' => 1020]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        /*
        return [
            'group_name' => Yii::t('app', 'Group'),
            'param_name' => Yii::t('app', 'Name'),
            'param_type' => Yii::t('app', 'Type'),
            'param_int_value' => Yii::t('app', 'Int Value'),
            'param_varchar_value' => Yii::t('app', 'Text Value'),
            'param_long_value' => Yii::t('app', 'Long Text Value'),
            'description' => Yii::t('app', 'Description'),
        ];*/
        
        return [
            'group_name' => Yii::t('app', 'Group Name'),
            'param_name' => Yii::t('app', 'Param Name'),
            'param_type' => Yii::t('app', 'Param Type'),
            'param_int_value' => Yii::t('app', 'Param Int Value'),
            'param_varchar_value' => Yii::t('app', 'Param Varchar Value'),
            'param_long_value' => Yii::t('app', 'Param Long Value'),
            'description' => Yii::t('app', 'Description'),
        ];
        
    }
    
    public function getValue() {
        if($this->param_type == SettingsModule::TYPE_BOOLEAN) {
            if($this->param_int_value == 1) {
                return true;
            } else {
                return false;
            }
        } else if($this->param_type == SettingsModule::TYPE_INTEGER) {
            return $this->param_int_value;
        } else if($this->param_type == SettingsModule::TYPE_TEXT) {
            return $this->param_varchar_value;
        } else if($this->param_type == SettingsModule::TYPE_LONGTEXT) {
            return $this->param_long_value;
        } else {
            return "Unknown";
        }
    }
    
    /**
     * Returns the param name
     * 
     * @param type $group_name
     * @param type $param_name
     * @return type
     */
    public static function getParamValue($group_name, $param_name, $default_value = null) {
        $param = Settings::findOne(["group_name"=>$group_name, "param_name"=>$param_name]);
        if($param != null) {
            return $param->getValue();          
        } else {
            if(isset($default_value)) {
                return $default_value;
            } else {
                return "";
            }
        }
    }
    
    
    
    /**
     * Gets a list of all groups
     * @return type
     */
    public static function getDisctinctGroups() {
        return Settings::find()->distinct("group_name")->select("group_name")->all();
    }
}
