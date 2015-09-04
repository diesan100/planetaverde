<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\AppMessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mensajes de la aplicación');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-messages-index">

    <p>
        <?= Html::a(Yii::t('app', 'Crear {modelClass}', [
    'modelClass' => 'Mensaje',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'identifier',
                'width' => '20%',
                'label' => 'Identificador',
            ],
            
            [
                'attribute' => 'message',
                'width' => '70%',
                'label' => 'Mensaje',
            ],
            
            
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '8%',
                
            ],
        ],
    ]); ?>

</div>
