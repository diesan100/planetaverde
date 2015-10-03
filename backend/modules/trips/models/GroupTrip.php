<?php

namespace backend\modules\trips\models;

use Yii;
use backend\modules\destinations\models\Area;
use backend\modules\destinations\models\Feedback;

/**
 * This is the model class for table "group_trip".
 *
 * @property integer $id
 * @property integer $area_id
 * @property string $trip_type
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $itinerary
 * @property string $dateprice
 * @property string $poll_rate
 * @property integer $image
 * @property string $flight_arrival
 * @property string $flight_return
 * @property string $created_at
 * @property string $updated_at
 * @property integer $state
 *
 * @property Area $area
 * @property GroupTripItem[] $tripItems
 * @property Feedback[] $feedbacks;
 */

class GroupTrip extends \yii\db\ActiveRecord
{
	public static $TRIP_TYPE_COMFORT = 'C';
	public static $TRIP_TYPE_ADVENTURE = 'A';
	public static $TRIP_TYPE_EXTREME = 'E';
	
	public static $TRIP_TYPES = [
			'C' => 'Comfort',
			'A' => 'Adventure',
			'E' => 'Extreme',
	];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_trip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area_id', 'title', 'subtitle', 'description', 'image'], 'required'],
            [['area_id', 'image', 'state'], 'integer'],
            [['description', 'itinerary', 'dateprice'], 'string'],
            [['poll_rate'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['trip_type'], 'string', 'max' => 1],
            [['title'], 'string', 'max' => 50],
            [['subtitle'], 'string', 'max' => 150],
            [['flight_arrival', 'flight_return'], 'string', 'max' => 200]
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
            'trip_type' => Yii::t('app', 'Trip Type'),
            'title' => Yii::t('app', 'Title'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'description' => Yii::t('app', 'Description'),
            'itinerary' => Yii::t('app', 'Itinerary'),
            'dateprice' => Yii::t('app', 'Date and Price'),
            'poll_rate' => Yii::t('app', 'Poll Rate'),
            'image' => Yii::t('app', 'Featured Image'),
            'flight_arrival' => Yii::t('app', 'Flight Arrival'),
            'flight_return' => Yii::t('app', 'Flight Return'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'state' => Yii::t('app', 'State'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTripItems()
    {
        return $this->hasMany(GroupTripItem::className(), ['trip_id' => 'id']);
    }
    
    public function getFeedbacks() {
    	return $this->hasMany(Feedback::className(), ['loid'=>'id'])->where('lotype=2');
    }
}
