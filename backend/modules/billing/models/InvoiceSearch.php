<?php

namespace backend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\billing\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `common\models\payments\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'plan_id', 'state'], 'integer'],
            [['net_amount', 'taxes', 'discount'], 'number'],
            [['date_to', 'date_from', 'created_at', 'updated_at', 'error', 'pyp_profile_id', 'pyp_payer_id', 'pyp_token', 'number', 'user_id'], 'safe'],
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
        
        
        $query = Invoice::find();

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
            'user_id' => $this->user_id,
            'plan_id' => $this->plan_id,
            'state' => $this->state,
            'net_amount' => $this->net_amount,
            'taxes' => $this->taxes,
            'date_to' => $this->date_to,
            'date_from' => $this->date_from,
            'discount' => $this->discount,
            //'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if(isset($this->created_at) && $this->created_at!=''){
            $date_explode = explode("a", $this->created_at);
            $date1 = trim($date_explode[0]);
            $date2= trim($date_explode[1]);
            //$query->andFilterWhere(['between', 'created_at', $date1,$date2]);
            $query->andFilterWhere(['>=', 'DATE(created_at)', $date1]);
            $query->andFilterWhere(['<=', 'DATE(created_at)', $date2]);
        }
        
        $query->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'pyp_profile_id', $this->pyp_profile_id])
            ->andFilterWhere(['like', 'pyp_payer_id', $this->pyp_payer_id])
            ->andFilterWhere(['like', 'pyp_token', $this->pyp_token]);

        return $dataProvider;
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchOwn($params, $user_id)
    {
        $query = Invoice::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['date_to'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $user_id,
            'plan_id' => $this->plan_id,
            'state' => $this->state,
            'net_amount' => $this->net_amount,
            'taxes' => $this->taxes,
            'date_to' => $this->date_to,
            'date_from' => $this->date_from,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'pyp_profile_id', $this->pyp_profile_id])
            ->andFilterWhere(['like', 'pyp_payer_id', $this->pyp_payer_id])
            ->andFilterWhere(['like', 'pyp_token', $this->pyp_token]);

        return $dataProvider;
    }
    
    /**
     * Get last user´s payment
     * @param type $user_id
     */
    public static function getLastCompletedPayment($user_id) {
        $lastPayment = Invoice::find()->where(['state' => Invoice::INVOICE_STATE_COMPLETED, 'user_id'=>$user_id])
                            ->orderBy('date_from DESC')
                            /*->limit(5)*/
                            ->one();
       return $lastPayment;
    }
    
    /**
     * Search for the next upcoming payment that maight exist in a processing state,
     * this sould occur if the user has changed the plan so the next payment invoice has been already
     * scheduled with the new plan parameters.
     * 
     * @param type $user_id
     */
    public static function getUpcomingPayment($lastPayment, $user_id) {
        $upcomingPayment = Invoice::find()->where(['state' => Invoice::INVOICE_STATE_PROCESSING, 'user_id'=>$user_id])
                ->andWhere([">", "date_from", $lastPayment->date_from])
                            ->orderBy('date_from')
                            /*->limit(5)*/
                            ->one();
       return $upcomingPayment;
    }
    
    
    
    /**
     * Devuelve true si hay una transacción pendiente para el período actual
     * @param type $user_id
     */
    public static function isCurrentProcessingTransaction($user_id) {
        
        $result = (new \yii\db\Query())
            //->select(['id'])
            ->from('invoice')
            ->andWhere(['<=' ,'date_from', date("Y-m-d")])
            ->andWhere(['>=' ,'date_to', date("Y-m-d")])
            ->andWhere(['user_id' => $user_id])
            ->andWhere(['state' => Invoice::INVOICE_STATE_PROCESSING])
            ->one();
        
        return $result;
    }
}
