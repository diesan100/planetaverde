<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\modules\cms\constants\CMSConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\destinations\models\LodgeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lodges');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lodge-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
            'modelClass' => 'Lodge',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                    'attribute'=>'area_id',
                    'value'=>function ($model, $key, $index, $widget) {
                        $area = \backend\modules\destinations\models\Area::findOne(["id"=>$model->area]);
                        if(isset($area) && $area != NULL) {
                            return $area->name;
                        } else {
                            return "(not set)";
                        }
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filterInputOptions'=>['placeholder'=>'Any Area'],
                    'filter'=>  yii\helpers\ArrayHelper::map(\common\modules\cms\models\CmsPage::find()->asArray()->all(), 'ID', 'TITLE'), 
                ], 
            'description',
            ['attribute'=>'state',
                    'value'=>function ($model, $key, $index, $widget) {
                        return CMSConstants::$CMS_CONTENTS_STATES[$model->state];                    
                    },
                    'width'=>'10%', 
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>  CMSConstants::$CMS_CONTENTS_STATES, 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any type'], 
                ],
            // 'notes',
            // 'img',
            // 'poll_rate',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
