<?php

namespace usersbackend\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use usersbackend\modules\users\models\AccountSettings;

/**
 * AccountSettingsSearch represents the model behind the search form about `usersbackend\modules\users\models\AccountSettings`.
 */
class AccountSettingsSearch extends AccountSettings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'admin_upload', 'admin_delete', 'admin_folders', 'admin_period', 'member_upload', 'member_period', 'guest_upload', 'guest_period'], 'integer'],
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
        $query = AccountSettings::find();

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
            'user_id' => $this->user_id,
            'admin_upload' => $this->admin_upload,
            'admin_delete' => $this->admin_delete,
            'admin_folders' => $this->admin_folders,
            'admin_period' => $this->admin_period,
            'member_upload' => $this->member_upload,
            'member_period' => $this->member_period,
            'guest_upload' => $this->guest_upload,
            'guest_period' => $this->guest_period,
        ]);

        return $dataProvider;
    }
}
