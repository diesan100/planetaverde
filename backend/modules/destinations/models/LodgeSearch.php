<?php

namespace backend\modules\destinations\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\destinations\models\Lodge;

/**
 * LodgeSearch represents the model behind the search form about `backend\modules\destinations\models\Lodge`.
 */
class LodgeSearch extends Lodge
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'area', 'state', 'img'], 'integer'],
            [['name', 'description', 'notes'], 'safe'],
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
        $query = Lodge::find();

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
            'area' => $this->area,
            'state' => $this->state,
            'img' => $this->img,
            'poll_rate' => $this->poll_rate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
