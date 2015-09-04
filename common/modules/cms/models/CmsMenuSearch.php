<?php

namespace common\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * CmsMenuSearch represents the model behind the search form about `app\models\CmsMenu`.
 */
class CmsMenuSearch extends CmsMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TEMPLATE'], 'integer'],
            [['NAME', 'POSITION'], 'safe'],
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
        $query = CmsMenu::find();

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
            'ID' => $this->ID,
            'TEMPLATE' => $this->TEMPLATE,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'POSITION', $this->POSITION]);

        return $dataProvider;
    }
}
