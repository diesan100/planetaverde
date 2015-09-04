<?php

namespace common\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\cms\models\CmsMenuItemSearch;

/**
 * CmsMenuItemSearch represents the model behind the search form about `common\models\CmsMenuItem`.
 */
class CmsMenuItemSearch extends CmsMenuItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MENU', 'STATE', 'ID', 'PAGE', 'ORDER', 'PARENT_MENU', 'TYPE'], 'integer'],
            [['TITLE', 'URL'], 'safe'],
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
        $query = CmsMenuItem::find();

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
            'MENU' => $this->MENU,
            'STATE' => $this->STATE,
            'ID' => $this->ID,
            'PAGE' => $this->PAGE,
            'ORDER' => $this->ORDER,
            'PARENT_MENU' => $this->PARENT_MENU,
            'TYPE' => $this->TYPE,
        ]);

        $query->andFilterWhere(['like', 'TITLE', $this->TITLE])
            ->andFilterWhere(['like', 'URL', $this->URL]);

        return $dataProvider;
    }
}
