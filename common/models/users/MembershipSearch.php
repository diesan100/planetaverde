<?php

namespace usersbackend\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use usersbackend\modules\users\models\Membership;

/**
 * MembershipSearch represents the model behind the search form about `usersbackend\modules\users\models\Membership`.
 */
class MembershipSearch extends Membership
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'current_plan', 'free', 'used_storage', 'limit_storage', 'used_projects', 'limit_projects', 'user_id', 'state', 'alert_80', 'alert_90', 'alert_100', 'promo_used_months', 'promo_code'], 'integer'],
            [['created_at', 'updated_at', 'next_payment', 'paypal_profile_id', 'gateway_type'], 'safe'],
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
        $query = Membership::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'current_plan' => $this->current_plan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'next_payment' => $this->next_payment,
            'free' => $this->free,
            'used_storage' => $this->used_storage,
            'limit_storage' => $this->limit_storage,
            'used_projects' => $this->used_projects,
            'limit_projects' => $this->limit_projects,
            'user_id' => $this->user_id,
            'state' => $this->state,
            'alert_80' => $this->alert_80,
            'alert_90' => $this->alert_90,
            'alert_100' => $this->alert_100,
        ]);

        $query->andFilterWhere(['like', 'paypal_profile_id', $this->paypal_profile_id])
            ->andFilterWhere(['like', 'gateway_type', $this->gateway_type]);

        return $dataProvider;
    }
}
