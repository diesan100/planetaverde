<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsPostContent;
use common\modules\cms\models\CmsCategory;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\cms\models\CmsPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-page-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Page',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
/*
            ['attribute'=>'ID',
                'width'=>'6%',
            ],*/
            
            'TITLE',
            [
                'attribute'=>'CONTENT_ID',
                'value'=>function ($model, $key, $index, $widget) {
                    //return CmsPostContent::findOne(["ID"=>$model->CONTENT_ID])->TITLE;
                    $value = common\modules\cms\utils\CMSUtils::getObjectTitle($model->TYPE, $model->CONTENT_ID);
                    if($value!="") {
                        return $value;
                    } else {
                        return "(not set)";
                    }
                    
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any content'],
                'filter'=>  yii\helpers\ArrayHelper::map(CmsPostContent::find()->asArray()->all(), 'ID', 'TITLE'), 
            ],
                        
            ['attribute'=>'TYPE',
                'value'=>function ($model, $key, $index, $widget) {
                    return CMSConstants::$CMS_PAGE_TYPES[$model->TYPE];                    
                },
                'width'=>'10%', 
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  CMSConstants::$CMS_PAGE_TYPES, 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any type'], 
            ],
            
                      
            [
                'attribute'=>'POST_CATEGORY',
                'value'=>function ($model, $key, $index, $widget) {
                    $cat = CmsCategory::findOne(["ID"=>$model->POST_CATEGORY]);
                    if(isset($cat) && $cat != NULL) {
                        return $cat->NAME;
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any Category'],
                'filter'=>  yii\helpers\ArrayHelper::map(CmsCategory::find()->asArray()->all(), 'ID', 'NAME'), 
            ], 
                        
            [
                'attribute'=>'PARENT_PAGE',
                'value'=>function ($model, $key, $index, $widget) {
                    $page = \common\modules\cms\models\CmsPage::findOne(["ID"=>$model->PARENT_PAGE]);
                    if(isset($page) && $page != NULL) {
                        return $page->TITLE;
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any Page'],
                'filter'=>  yii\helpers\ArrayHelper::map(\common\modules\cms\models\CmsPage::find()->asArray()->all(), 'ID', 'TITLE'), 
            ], 
                        
                        
            //'ORDER',
            //'URL:url',
            // 'CONTROLLER',
            // 'METHOD',
            
            // 'LAYOUT',
            // 'IS_HOME',
            // 'STATE',
            // 'POST_CATEGORY',
            // 'POST_ID',
            // 'HEADER_IMAGE',
            // 'HEADER_TEXT',
            // 'SHOW_BREAD_CRUMBS',
            // 'INTRO_TEXT',
            // 'INTRO_IMAGE',
            // 'HEADER_MASK',
            // 'PARENT_PAGE',
            // 'WRAP_CONTENT',

            [
                'class'=>'kartik\grid\ActionColumn',
                'width'=>'8%'
            ],
        ],
    ]); ?>

</div>
