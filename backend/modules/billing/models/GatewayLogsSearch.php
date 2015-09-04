<?php

namespace backend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\billing\models\GatewayLogs;

/**
 * GatewayLogsSearch represents the model behind the search form about `backend\modules\billing\models\GatewayLogs`.
 */
class GatewayLogsSearch extends GatewayLogs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
           [['gateway', 'message', 'timestamp'], 'safe'],
           [['gateway', 'type', 'message', 'timestamp', 'user_email'], 'safe'],
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
        $query = GatewayLogs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'user_email'=>  $this->user_email,
            //'timestamp' => $this->timestamp,
        ]);

        if(isset($this->timestamp) && $this->timestamp!=''){
            $date_explode = explode("a", $this->timestamp);
            $date1 = trim($date_explode[0]);
            $date2= trim($date_explode[1]);
            $query->andFilterWhere(['between', 'timestamp', $date1,$date2]);
        }
        
        $query->andFilterWhere(['like', 'gateway', $this->gateway])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
