<?php

namespace common\modules\media\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\media\models\CmsImages;

/**
 * CmsImagesSearch represents the model behind the search form about `common\models\CmsImages`.
 */
class CmsImagesSearch extends CmsImages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'WIDTH', 'HEIGHT', 'OWNER'], 'integer'],
            [['NAME', 'MIME', 'URL', 'META', 'DESCRIPTION'], 'safe'],
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
        $query = CmsImages::find();

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
            'WIDTH' => $this->WIDTH,
            'HEIGHT' => $this->HEIGHT,
            'OWNER' => $this->OWNER,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'MIME', $this->MIME])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'META', $this->META])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION]);

        return $dataProvider;
    }
}
