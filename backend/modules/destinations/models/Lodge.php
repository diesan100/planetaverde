<?php

namespace backend\modules\destinations\models;

use Yii;

/**
 * This is the model class for table "lodge".
 *
 * @property integer $id
 * @property integer $area
 * @property string $name
 * @property string $description
 * @property integer $state
 * @property string $notes
 * @property integer $img
 * @property string $poll_rate
 */
class Lodge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lodge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area', 'name'], 'required'],
            [['area', 'state', 'img'], 'integer'],
            [['poll_rate'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1200],
            [['notes'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'area' => Yii::t('app', 'Area'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'state' => Yii::t('app', 'State'),
            'notes' => Yii::t('app', 'Notes'),
            'img' => Yii::t('app', 'Featured Image'),
            'poll_rate' => Yii::t('app', 'Poll Rate'),
        ];
    }
}
