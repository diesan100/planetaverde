<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\destinations\models\GroupTripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Group Trips');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-trip-index">

    <h1><?= Html::encode($this->title) ?></h1>
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

            'id',
            'area_id',
            'trip_type',
            'title',
            'subtitle',
            // 'description:ntext',
            // 'itinerary:ntext',
            // 'dateprice:ntext',
            // 'poll_rate',
            // 'image',
            // 'flight_arrival',
            // 'flight_return',
            // 'created_at',
            // 'updated_at',
            // 'state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
