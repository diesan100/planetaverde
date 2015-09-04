<?php

namespace common\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\cms\models\CmsWidgetPosition;

/**
 * CmsWidgetPositionSearch represents the model behind the search form about `common\models\CmsWidgetPosition`.
 */
class CmsWidgetPositionSearch extends CmsWidgetPosition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WIDGET_ID', 'ORDER', 'LAYOUT_SECTION', 'ID', 'PAGE'], 'integer'],
            [['TYPE'], 'safe'],
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
        $query = CmsWidgetPosition::find();

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
            'WIDGET_ID' => $this->WIDGET_ID,
            'ORDER' => $this->ORDER,
            'LAYOUT_SECTION' => $this->LAYOUT_SECTION,
            'ID' => $this->ID,
            'PAGE' => $this->PAGE,
        ]);

        $query->andFilterWhere(['like', 'TYPE', $this->TYPE]);

        return $dataProvider;
    }
}
