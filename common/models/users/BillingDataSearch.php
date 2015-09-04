<?php

namespace usersbackend\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use usersbackend\modules\users\models\BillingData;

/**
 * BillingDataSearch represents the model behind the search form about `usersbackend\modules\users\models\BillingData`.
 */
class BillingDataSearch extends BillingData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'zip_code', 'country'], 'integer'],
            [['razon_social', 'nif', 'address_line_1', 'address_line_2', 'city', 'state', 'updated_at'], 'safe'],
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
        $query = BillingData::find();

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
            'user_id' => $this->user_id,
            'zip_code' => $this->zip_code,
            'country' => $this->country,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'nif', $this->nif])
            ->andFilterWhere(['like', 'address_line_1', $this->address_line_1])
            ->andFilterWhere(['like', 'address_line_2', $this->address_line_2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
