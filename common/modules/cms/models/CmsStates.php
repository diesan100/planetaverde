<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_states".
 *
 * @property integer $STATE
 * @property string $STATE_NAME
 */
class CmsStates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATE'], 'required'],
            [['STATE'], 'integer'],
            [['STATE_NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATE' => Yii::t('app', 'State'),
            'STATE_NAME' => Yii::t('app', 'State  Name'),
        ];
    }
}
