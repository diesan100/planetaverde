<?php

use yii\helpers\Html;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\cms\models\CmsLayoutSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Layout Sections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-layout-section-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Layout Section',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'ID',
            'NAME',
            [
                'attribute'=>'LAYOUT',
                'value'=>function ($model, $key, $index, $widget) {
                    return common\modules\cms\models\CmsLayout::findOne(["ID"=>$model->LAYOUT])->TITLE;
                },
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any Layout'],
                'filter'=>  yii\helpers\ArrayHelper::map(common\modules\cms\models\CmsLayout::find()->asArray()->all(), 'ID', 'TITLE'), 
            ],

            ['class' => '\kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
