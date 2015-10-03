<?php

namespace backend\modules\trips\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\trips\models\GroupTrip;

/**
 * GroupTripSearch represents the model behind the search form about `backend\modules\trips\models\GroupTrip`.
 */
class GroupTripSearch extends GroupTrip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'area_id', 'image', 'state'], 'integer'],
            [['trip_type', 'title', 'subtitle', 'description', 'itinerary', 'dateprice', 'flight_arrival', 'flight_return', 'created_at', 'updated_at'], 'safe'],
            [['poll_rate'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GroupTrip::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'area_id' => $this->area_id,
            'poll_rate' => $this->poll_rate,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'state' => $this->state,
        ]);

        $query->andFilterWhere(['like', 'trip_type', $this->trip_type])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'itinerary', $this->itinerary])
            ->andFilterWhere(['like', 'dateprice', $this->dateprice])
            ->andFilterWhere(['like', 'flight_arrival', $this->flight_arrival])
            ->andFilterWhere(['like', 'flight_return', $this->flight_return]);

        return $dataProvider;
    }
}
