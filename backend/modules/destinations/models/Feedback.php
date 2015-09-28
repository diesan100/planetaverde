<?php

namespace backend\modules\destinations\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $lotype
 * @property integer $loid
 * @property string $rate
 * @property string $comment
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'lotype', 'loid'], 'integer'],
            [['loid', 'comment'], 'required'],
            [['rate'], 'number'],
            [['comment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'lotype' => Yii::t('app', '1: lodge, 2: group-trip'),
            'loid' => Yii::t('app', 'id of lodge or gt'),
            'rate' => Yii::t('app', 'Rate'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }
}
