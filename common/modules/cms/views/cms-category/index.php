<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\modules\cms\models\CmsCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CmsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-category-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Category',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'ID',
                'width'=>'7%',
            ],
            'TITLE',
            
            [
                'attribute'=>'PARENT_CATEGORY',
                'value'=>function ($model, $key, $index, $widget) {
                    $parent = CmsCategory::findOne(["ID"=>$model->PARENT_CATEGORY]);
                    if(isset($parent)) {
                        return $parent->TITLE;
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any'],
                'filter'=> ArrayHelper::map(CmsCategory::find()->asArray()->all(), 'ID', 'NAME'),
            ],
                        
                        

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
