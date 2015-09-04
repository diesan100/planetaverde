<?php

namespace backend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\billing\models\PaypalTx;

/**
 * PaypalTxSearch represents the model behind the search form about `backend\modules\billing\models\PaypalTx`.
 */
class PaypalTxSearch extends PaypalTx
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txn_id', 'txn_type', 'payer_id', 'recurring_payment_id', 'created_at', 'membership'], 'safe'],
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
        $query = PaypalTx::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(isset($this->created_at) && $this->created_at!=''){
            $date_explode = explode("a", $this->created_at);
            $date1 = trim($date_explode[0]);
            $date2= trim($date_explode[1]);
            //$query->andFilterWhere(['between', 'created_at', $date1,$date2]);
            $query->andFilterWhere(['>=', 'DATE(created_at)', $date1]);
            $query->andFilterWhere(['<=', 'DATE(created_at)', $date2]);
        }

        $query->andFilterWhere(['like', 'txn_id', $this->txn_id])
            ->andFilterWhere(['like', 'txn_type', $this->txn_type])
            ->andFilterWhere(['like', 'membership', $this->membership])
            ->andFilterWhere(['like', 'payer_id', $this->payer_id])
            ->andFilterWhere(['like', 'recurring_payment_id', $this->recurring_payment_id]);

        return $dataProvider;
    }
}
