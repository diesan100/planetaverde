<?php

use yii\helpers\Html;
use \kartik\grid\GridView;
use \common\modules\cms\constants\CMSConstants;
use yii\helpers\ArrayHelper;
use common\modules\cms\models\CmsLayoutSection;
use common\modules\cms\models\CmsMenu;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\cms\models\CmsWidgetPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Widget Positions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-widget-position-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Widget Position',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'ID',
                'width'=>'6%',
            ],
            [
                'attribute'=>'WIDGET_ID',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->TYPE == CMSConstants::$MENU_WIDGET_TYPE) {
                        return CmsMenu::findOne(["ID"=>$model->WIDGET_ID])->NAME;
                    } else {
                        return "slider";
                    }
                },
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any widget'],
                'filter'=>  ArrayHelper::map(CmsMenu::find()->asArray()->all(), 'ID', 'NAME'), 
            ],
            
            
            'ORDER',
            [
            'attribute'=>'TYPE',
                'value'=>function ($model, $key, $index, $widget) {
                    if ($model->TYPE == CMSConstants::$MENU_WIDGET_TYPE) {
                        return "Menu";
                    } else if ($model->TYPE == CMSConstants::$SLIDER_WIDGET_TYPE) {
                        return "Slider";
                    } else {
                        return "Unknown: " . $model->TYPE;
                    }
                },
                'width'=>'10%',        
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any type'],
                'filter'=>  CMSConstants::$WIDGET_TYPES, 
            ],
            
            [
                'attribute'=>'LAYOUT_SECTION',
                'value'=>function ($model, $key, $index, $widget) {
                    return CmsLayoutSection::findOne(["ID"=>$model->LAYOUT_SECTION])->NAME;
                },
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any section'],
                'filter'=>  ArrayHelper::map(CmsLayoutSection::find()->asArray()->all(), 'ID', 'NAME'), 
            ],
                        
                        
           
            // 'PAGE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
