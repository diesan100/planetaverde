<?php

namespace backend\modules\trips\models;

use Yii;
use backend\modules\destinations\models\Lodge;

/**
 * This is the model class for table "group_trip_item".
 *
 * @property integer $id
 * @property integer $trip_id
 * @property integer $day_order
 * @property integer $lodge_id
 * @property integer $nights
 * @property string $note
 *
 * @property GroupTrip $trip
 * @property Lodge	$lodge
 */
class GroupTripItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_trip_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trip_id', 'lodge_id'], 'required'],
            [['trip_id', 'day_order', 'lodge_id', 'nights'], 'integer'],
            [['note'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'trip_id' => Yii::t('app', 'Group-trip ID'),
            'day_order' => Yii::t('app', 'Day Order'),
            'lodge_id' => Yii::t('app', 'Lodge ID'),
            'nights' => Yii::t('app', 'staying nights at lodge'),
            'note' => Yii::t('app', 'Note'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(GroupTrip::className(), ['id' => 'trip_id']);
    }
    
    public function getLodge()
    {
    	return $this->hasOne(Lodge::className(), ['id'=>'lodge_id']);
    }
}
