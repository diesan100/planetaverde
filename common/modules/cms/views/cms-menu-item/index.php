<?php

use \yii\helpers\Html;
use \kartik\grid\GridView;
use common\modules\cms\models\CmsStates;
use common\modules\cms\models\CmsPage;
use common\modules\cms\models\CmsMenu;
use common\modules\cms\models\CmsMenuItem;
use common\modules\cms\constants\CMSConstants;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\cms\models\CmsMenuItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menu Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-menu-item-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Menu Item',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            /*['attribute'=>'ID',
                'width'=>'6%',
            ],*/
            'TITLE',
            [
                'attribute'=>'STATE',
                'value'=>function ($model, $key, $index, $widget) {
                    return CmsStates::findOne(["STATE"=>$model->STATE])->STATE_NAME;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  yii\helpers\ArrayHelper::map(CmsStates::find()->asArray()->all(), 'STATE', 'STATE_NAME'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any'],
                
            ],
                        
            [
            'attribute'=>'PARENT_MENU',
                'value'=>function ($model, $key, $index, $widget) {
                    if( !isset($model->PARENT_MENU)) {
                        return "(Not set)";
                    }
                    return CmsMenuItem::findOne(["ID"=>$model->PARENT_MENU])->TITLE;
                },
                        
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  yii\helpers\ArrayHelper::map(CmsMenuItem::find()->asArray()->all(), 'ID', 'TITLE'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any'],         
            ],
                        
            [
            'attribute'=>'MENU',
                'value'=>function ($model, $key, $index, $widget) {
                    return CmsMenu::findOne(["ID"=>$model->MENU])->NAME;
                },
                        
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  yii\helpers\ArrayHelper::map(CmsMenu::find()->asArray()->all(), 'ID', 'NAME'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any'],
                         
            ],              
            
            [
            'attribute'=>'TYPE',
                'value'=>function ($model, $key, $index, $widget) {
                    if ($model->TYPE == "0") {
                        return "Internal Page";
                    } else if ($model->TYPE == "1") {
                        return "URL";
                    } else if ($model->TYPE == "2") {
                        return "Courses list";
                    } else if ($model->TYPE == "3") {
                        return "Course detail";
                    } else if ($model->TYPE == "4") {
                        return "Colleges list";
                    } else if ($model->TYPE == "5") {
                        return "College detail";
                    } else {
                        return "Unknown" . $model->TYPE;
                    }
                },
                'width'=>'10%',  
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  CMSConstants::$CMS_MENU_ITEM_TYPES, 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any'],
            ],
            
            [
            'attribute'=>'PAGE',
                'value'=>function ($model, $key, $index, $widget) {
                    $page = CmsPage::findOne(["ID"=>$model->PAGE]);
                    if($page!=null)
                        return $page->TITLE;
                },
                        
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  yii\helpers\ArrayHelper::map(CmsPage::find()->asArray()->all(), 'ID', 'TITLE'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any'],         
            ],  
                       
            [
                'attribute'=>'PAGE TYPE',
                'label'=>'Page type',
                'value'=>function ($model, $key, $index, $widget) {
                    $page = CmsPage::findOne(["ID"=>$model->PAGE]);
                    if($page!=null) {
                        return CMSConstants::$CMS_PAGE_TYPES[$page->TYPE];
                    }
                },
                     /*   
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=> CMSConstants::$CMS_PAGE_TYPES, 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any'],  */       
            ],
            
             
                        
            ['attribute'=>'ORDER',
                'width'=>'6%',
            ],
            [
                'class'=>'kartik\grid\ActionColumn',
                //'width'=>'8%'
            ],
        ],
    ]); ?>

</div>
