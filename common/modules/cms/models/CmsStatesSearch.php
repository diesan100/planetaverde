<?php

namespace common\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CmsStates;

/**
 * CmsStatesSearch represents the model behind the search form about `common\models\CmsStates`.
 */
class CmsStatesSearch extends CmsStates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATE'], 'integer'],
            [['STATE_NAME'], 'safe'],
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
        $query = CmsStates::find();

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
            'STATE' => $this->STATE,
        ]);

        $query->andFilterWhere(['like', 'STATE_NAME', $this->STATE_NAME]);

        return $dataProvider;
    }
}
