<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\modules\cms\constants\CMSConstants;
use common\constants\PVConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\destinations\models\AreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Areas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Area',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

                'name',
                [
                    'attribute'=>'parent',
                    'value'=>function ($model, $key, $index, $widget) {
                        $parent = \backend\modules\destinations\models\Area::findOne(["id"=>$model->parent]);
                        if(isset($parent) && $parent != NULL) {
                            return $parent->name;
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
                ['attribute'=>'type',
                    'value'=>function ($model, $key, $index, $widget) {
                        return PVConstants::$AREA_TYPES[$model->type];                    
                    },
                    'width'=>'10%', 
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>  PVConstants::$AREA_TYPES, 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any type'], 
                ],
                ['attribute'=>'featured',
                    'value'=>function ($model, $key, $index, $widget) {
                        return PVConstants::$AREA_FEATURED[$model->featured];
                    },
                    'width'=>'10%', 
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>  PVConstants::$AREA_FEATURED, 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any type'], 
                ],
                // 'coords_in_parent',
                // 'map_image',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
