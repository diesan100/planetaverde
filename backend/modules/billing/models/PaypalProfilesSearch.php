<?php

namespace backend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\billing\models\PaypalProfiles;

/**
 * PaypalProfilesSearch represents the model behind the search form about `backend\modules\billing\models\PaypalProfiles`.
 */
class PaypalProfilesSearch extends PaypalProfiles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user', 'membership', 'plan', 'state'], 'integer'],
            //[['pyp_profile_id'], 'integer'],
            [['created_at', 'start_date', 'end_date'], 'safe']
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
        $query = PaypalProfiles::find();

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

        $query->andFilterWhere([
            'id' => $this->id,
            'user' => $this->user,
            'membership' => $this->membership,
            'pyp_profile_id' => $this->pyp_profile_id,
            'plan' => $this->plan,
            'state' => $this->state,            
        ]);
        
        
        if(isset($this->created_at) && $this->created_at!=''){
            $date_explode = explode("a", $this->created_at);
            $date1 = trim($date_explode[0]);
            $date2= trim($date_explode[1]);
            //$query->andFilterWhere(['between', 'created_at', $date1,$date2]);
            $query->andFilterWhere(['>=', 'DATE(created_at)', $date1]);
            $query->andFilterWhere(['<=', 'DATE(created_at)', $date2]);
        }

        return $dataProvider;
    }
    
    
    public static function getLastNonCancelled($membershipId) {
        $profile = PaypalProfiles::find()
                ->where("state != ". PaypalProfiles::STATE_CANCELED)
                ->andWhere("membership = " . $membershipId)
                ->andWhere("DATE(created_at) < DATE_SUB(CURDATE(), INTERVAL 2 DAY)")
                ->orderBy("created_at DESC")
                ->one();
        
        return $profile;
    }
}
