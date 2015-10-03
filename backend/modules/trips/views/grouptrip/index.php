<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\modules\trips\models\GroupTrip;
use common\modules\cms\constants\CMSConstants;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\trips\models\GroupTripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Group Trips');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-trip-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Group Trip',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'area_id',            
            'title',
            'subtitle',
        	[
        		'attribute'=>'trip_type',
        		'filter'=>GroupTrip::$TRIP_TYPES,
        		'value'=>function ($model, $key, $index, $widget) {
                        return GroupTrip::$TRIP_TYPES[$model->trip_type];                    
                    },
        	],
            // 'description:ntext',
            // 'itinerary:ntext',
            // 'dateprice:ntext',
            // 'poll_rate',
            // 'image',
            // 'flight_arrival',
            // 'flight_return',
            // 'created_at',
            // 'updated_at',
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

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
