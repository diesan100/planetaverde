<?php

namespace backend\modules\destinations\models;

use Yii;
/**
 * This is the model class for table "lodge".
 *
 * @property integer $id
 * @property integer $area_id
 * @property string $name
 * @property string $description
 * @property integer $state
 * @property string $notes
 * @property integer $img
 * @property string $poll_rate
 * 
 * @property Area $area
 * @property Feedback[] $feedbacks;
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
            [['area_id', 'name'], 'required'],
            [['area_id', 'state', 'img'], 'integer'],
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
            'area_id' => Yii::t('app', 'Area'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'state' => Yii::t('app', 'State'),
            'notes' => Yii::t('app', 'Notes'),
            'img' => Yii::t('app', 'Featured Image'),
            'poll_rate' => Yii::t('app', 'Poll Rate'),
        ];
    }
    
    public function getArea()
    {
    	return $this->hasOne(Area::className(), ['id'=>'area_id']);
    }
    
    public function getFeedbacks() {
    	return $this->hasMany(Feedback::className(), ['loid'=>'id'])->where('lotype=1');
    }
}
