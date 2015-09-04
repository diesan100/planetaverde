<?php

namespace backend\modules\destinations\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\destinations\models\Area;

/**
 * AreaSearch represents the model behind the search form about `backend\modules\destinations\models\Area`.
 */
class AreaSearch extends Area
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'state', 'type', 'map_image'], 'integer'],
            [['name', 'description', 'coords_in_parent'], 'safe'],
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
        $query = Area::find();

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
            'parent' => $this->parent,
            'state' => $this->state,
            'type' => $this->type,
            'map_image' => $this->map_image,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'coords_in_parent', $this->coords_in_parent]);

        return $dataProvider;
    }
}
