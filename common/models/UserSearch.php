<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/*
* User model
* @property string $free
*/      
/**
 * UserSearch represents the model behind the search form about `usersbackend\modules\users\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state', 'status'], 'integer'],
            [['email', 'name', 'surname', 'password', 'creation_date', 'last_acces', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'telephone', 'skype', 'address', 'province', 'zip_code', 'employment', 'job_position', 'birthday', 'studies', 'professional_experience', 'about_me', 'picture_url', 'company'], 'safe'],
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
    public function search($params, $type = null)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['creation_date'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(isset($type) && $type!= null) {
            $query->andFilterWhere([
                'id' => $this->id,
                'state' => $this->state,
                //'creation_date' => $this->creation_date,
                'last_acces' => $this->last_acces,
                'status' => $this->status,
                //'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'birthday' => $this->birthday,
                'type' => $type,
            ]);
        } else {
            $query->andFilterWhere([
                'id' => $this->id,
                'state' => $this->state,
                //'creation_date' => $this->creation_date,
                'last_acces' => $this->last_acces,
                'status' => $this->status,
                //'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'birthday' => $this->birthday,
            ]);
        }

        if(isset($this->creation_date) && $this->creation_date!=''){
            $date_explode = explode("a", $this->creation_date);
            $date1 = trim($date_explode[0]);
            $date2= trim($date_explode[1]);
            //$query->andFilterWhere(['between', 'created_at', $date1,$date2]);
            $query->andFilterWhere(['>=', 'DATE(creation_date)', $date1]);
            $query->andFilterWhere(['<=', 'DATE(creation_date)', $date2]);
        }
        
        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'employment', $this->employment])
            ->andFilterWhere(['like', 'job_position', $this->job_position])
            ->andFilterWhere(['like', 'studies', $this->studies])
            ->andFilterWhere(['like', 'professional_experience', $this->professional_experience])
            ->andFilterWhere(['like', 'about_me', $this->about_me])
            ->andFilterWhere(['like', 'picture_url', $this->picture_url])
            ->andFilterWhere(['like', 'company', $this->company]);
            //->andFilterWhere(['equals','type', $this->type]);

        return $dataProvider;
    }
}
