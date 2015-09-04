<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CmsImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\common\modules\media\MediaManagerModuleAsset::register($this);

$this->title = Yii::t('app', 'Media');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-images-index">

<?= Html::a(Yii::t('app', 'Upload new', [
    'modelClass' => 'Image',
]), ['create'], ['class' => 'btn btn-success']) ?>
    
    <br></br>
    
    <!--
    <div class="media-list-type">
        <ul>
            <li class="list active">
                <a href=""><i class="fa fa-list fa-2x"></i></a>
            </li>
            <li class="grid">
                <a href=""><i class="fa fa-th fa-2x"></i></a>
            </li>
        </ul>
    </div>
    -->
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => false,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'URL',
                'mergeHeader'=>true,
                'label' => 'Image',
                'value'=>function ($model, $key, $index, $widget) {
                    return "<div class='gallery-thumbnail small'><img src='".Yii::getAlias('@frontend_web')."/" . $model->URL . "'></div>";
                },
                'format'=>'html',           
            ], 
                        
            [
                'attribute'=>'NAME',
                //'width'=>'10%',
                'vAlign'=>'top',
            ],
            
            
            
            
            //'WIDTH',
            // 'HEIGHT',
            // 'META',
            
            [
                'attribute'=>'OWNER',
                'vAlign'=>'top',
            ],
                        
            [
                'attribute'=>'DESCRIPTION',
                'vAlign'=>'top',
            ],
            [
                'class'=>'kartik\grid\ActionColumn',
                'vAlign'=>'top',
            ],
        ],
    ]); ?>

</div>
