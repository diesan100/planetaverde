<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\billing\models\PaypalProfiles;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\billing\models\PaypalProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perfiles de pago recurrente');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-profiles-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'user',
            'membership',
            'pyp_profile_id',
            'plan',
            [
                'attribute'=>'state',
                'label'=>'Estado',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->state == PaypalProfiles::STATE_CREATED) {
                        return "Creado";
                    } else if($model->state == PaypalProfiles::STATE_USED) {
                        return "En uso";
                    } else if($model->state == PaypalProfiles::STATE_CANCELED) {
                        return "Cancelado";
                    } else {
                        return "Desconocido";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  PaypalProfiles::$STATES_ARRAY, 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Cualquiera'],
                
            ],
            [           
                'attribute'=>'start_date',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->start_date != null)
                        return common\utils\MyprojecttUtils::getFormattedDate($model->start_date, true);
                },
            ],
            [           
                'attribute'=>'end_date',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->end_date != null)
                        return common\utils\MyprojecttUtils::getFormattedDate($model->end_date, true);
                },
            ],                        

            [
                'attribute' => 'created_at',
                //'width' => '5%',
                'label' => 'Creado',                
                'value'=>function ($model, $key, $index, $widget) { 
                    return \common\utils\MyprojecttUtils::getFormattedDate($model->created_at, true);
                },
                'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
                'filterWidgetOptions' => [
                'presetDropdown' => true,
                'pluginOptions' => [
                    'format' => 'YYYY-MM-DD',
                    'separator' => ' a ',
                    'opens'=>'left',
                                ] ,
                'pluginEvents' => [
                    //"apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
                                ] 
                ],
            ],
        ],
    ]); ?>

</div>
