<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\billing\models\PaypalTxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transacciones de Paypal');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-tx-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--
    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Paypal Tx',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'txn_id',
            'txn_type',
            'payer_id',
            'recurring_payment_id',
            [
                'attribute' => 'created_at',
                //'width' => '5%',
                'label' => 'Creado',                
                'value'=>function ($model, $key, $index, $widget) { 
                    return \common\utils\MyprojecttUtils::getFormattedDate($model->created_at);
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
            
            [
                'attribute' => 'membership',
                'width' => '5%',
                'label' => 'Membresía',                                
            ],
                        
            [
                'attribute' => 'membership',
                'width' => '5%',
                'label' => 'Usuario',                
                'value'=>function ($model, $key, $index, $widget) { 
                    if($model->membership != null && $model->membership != "") {
                        $membership = \usersbackend\modules\users\models\Membership::findOne($model->membership);
                        if($membership != null) {
                            $user = common\models\User::findOne($membership->user_id);
                            if($user != null) {
                                return $user->getFullName();
                            } else {
                                return "Usuario no encontrado";
                            }
                        } else {
                             return "Membresía no encontrada";
                        }
                       
                    }
                },
            ],
                        
        ],
    ]); ?>

</div>
