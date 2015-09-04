<?php

namespace common\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * CmsPostContentSearch represents the model behind the search form about `app\models\CmsPostContent`.
 */
class CmsPostContentSearch extends CmsPostContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATE', 'OWNER', 'CATEGORY', 'VERSION_ID'], 'integer'],
            [['CONTENT', 'CREATION_DATE', 'LAST_MODIFIED', 'PERMALINK', 'TITLE', 'FEATURED_IMG', 'META_DATA'], 'safe'],
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
        $query = CmsPostContent::find();

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
            'STATE' => $this->STATE,
            'CREATION_DATE' => $this->CREATION_DATE,
            'LAST_MODIFIED' => $this->LAST_MODIFIED,
            'OWNER' => $this->OWNER,
            'CATEGORY' => $this->CATEGORY,
            'VERSION_ID' => $this->VERSION_ID,
        ]);

        $query->andFilterWhere(['like', 'CONTENT', $this->CONTENT])
            ->andFilterWhere(['like', 'PERMALINK', $this->PERMALINK])
            ->andFilterWhere(['like', 'TITLE', $this->TITLE])
            ->andFilterWhere(['like', 'FEATURED_IMG', $this->FEATURED_IMG])
            ->andFilterWhere(['like', 'META_DATA', $this->META_DATA]);

        return $dataProvider;
    }
}
