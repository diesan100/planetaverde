<?php

namespace common\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\cms\models\CmsPage;

/**
 * CmsPageSearch represents the model behind the search form about `common\models\CmsPage`.
 */
class CmsPageSearch extends CmsPage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'CONTENT_ID', 'TYPE', 'ORDER', 'LAYOUT', 'IS_HOME', 'STATE', 'POST_CATEGORY', 'POST_ID', 'HEADER_IMAGE', 'SHOW_BREAD_CRUMBS', 'INTRO_IMAGE', 'HEADER_MASK', 'PARENT_PAGE', 'WRAP_CONTENT'], 'integer'],
            [['URL', 'CONTROLLER', 'METHOD', 'TITLE', 'HEADER_TEXT', 'INTRO_TEXT'], 'safe'],
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
        $query = CmsPage::find();

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
            'CONTENT_ID' => $this->CONTENT_ID,
            'TYPE' => $this->TYPE,
            'ORDER' => $this->ORDER,
            'LAYOUT' => $this->LAYOUT,
            'IS_HOME' => $this->IS_HOME,
            'STATE' => $this->STATE,
            'POST_CATEGORY' => $this->POST_CATEGORY,
            'POST_ID' => $this->POST_ID,
            'HEADER_IMAGE' => $this->HEADER_IMAGE,
            'SHOW_BREAD_CRUMBS' => $this->SHOW_BREAD_CRUMBS,
            'INTRO_IMAGE' => $this->INTRO_IMAGE,
            'HEADER_MASK' => $this->HEADER_MASK,
            'PARENT_PAGE' => $this->PARENT_PAGE,
            'WRAP_CONTENT' => $this->WRAP_CONTENT,
        ]);

        $query->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'CONTROLLER', $this->CONTROLLER])
            ->andFilterWhere(['like', 'METHOD', $this->METHOD])
            ->andFilterWhere(['like', 'TITLE', $this->TITLE])
            ->andFilterWhere(['like', 'HEADER_TEXT', $this->HEADER_TEXT])
            ->andFilterWhere(['like', 'INTRO_TEXT', $this->INTRO_TEXT]);

        return $dataProvider;
    }
}
