<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel usersbackend\modules\users\models\BillingDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Datos de facturación');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billing-data-index">
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Billing Data',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'id', 'width'=>'1%'],
            'user_id',
            'razon_social',
            'nif',
            //'address_line_1',
            // 'address_line_2',
            'zip_code',
            'city',
            // 'state',
            // 'country',
            ['attribute'=>'updated_at', 'label'=>'Actualizado'],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
