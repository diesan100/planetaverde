<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\modules\cms\models\CmsStates;
use common\modules\cms\models\CmsCategory;
use common\models\User;
use common\modules\cms\utils\CMSUtils;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CmsPostContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-post-content-index">

    <p>
     <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Post',
    ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bootstrap' => true,
        'hover' => true,
        'columns' => [
            //['class' => '\kartik\grid\SerialColumn'],
            /*['attribute'=>'ID',
                'width'=>'6%',
                'vAlign'=>'top',
            ],*/
            
            [
                'attribute'=>'TITLE',
                'vAlign'=>'top',
            ],
            [
                'attribute'=>'CONTENT',
                'value'=>function ($model, $key, $index, $widget) {
                    return CMSUtils::cropString(strip_tags($model->CONTENT), 100);
                },
                'format'=>'html',
            ],
            [
                'attribute'=>'STATE',
                'vAlign'=>'top',
                'value'=>function ($model, $key, $index, $widget) {
                    return CmsStates::findOne(["STATE"=>$model->STATE])->STATE_NAME;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  yii\helpers\ArrayHelper::map(CmsStates::find()->asArray()->all(), 'STATE', 'STATE_NAME'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any state'],
                
            ],
            [
                'attribute'=>'LAST_MODIFIED',
                'vAlign'=>'top',
                
            ],
            //'CREATION_DATE',

            [
                'vAlign'=>'top',
                'attribute'=>'CATEGORY',
                'value'=>function ($model, $key, $index, $widget) {
                    $category = CmsCategory::findOne(["ID"=>$model->CATEGORY]);
                    if($category != null)
                        return $category->TITLE;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any category'],
                'filter'=>  yii\helpers\ArrayHelper::map(CmsCategory::find()->asArray()->all(), 'ID', 'NAME'), 
            ],
                        
            [
                'vAlign'=>'top',
                'attribute'=>'OWNER',
                'value'=>function ($model, $key, $index, $widget) {
                    $user = User::findOne(["ID"=>$model->OWNER]);
                    if($user != null)
                        return $user->getFullName();
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any'],
                /** TODO: FILTRAR TIPO DE USUARIO **/
                'filter'=>  yii\helpers\ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name'), 
            ],

            // 'PERMALINK',
            
            // 'VERSION_ID',
            // 'FEATURED_IMG',
            // 'META_DATA',
            [
                'class'=>'kartik\grid\ActionColumn',
                'width'=>'8%'
            ],
        ],
    ]); ?>
</div>
