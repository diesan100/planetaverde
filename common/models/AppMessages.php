<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "app_messages".
 *
 * @property string $identifier
 * @property string $message
 */
class AppMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identifier', 'message'], 'required'],
            [['identifier'], 'string', 'max' => 255],
            [['message'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => Yii::t('app', 'Identifier'),
            'message' => Yii::t('app', 'Message'),
        ];
    }
}
