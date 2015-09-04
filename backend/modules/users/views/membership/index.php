<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\planes\models\Plan;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel usersbackend\modules\users\models\MembershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Membresías');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-index">

    
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Membership',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label'=>'Usuario',
                'attribute'=>'user_id',
                'format'=>'html',        
                'value'=>function ($model, $key, $index, $widget) {
                    $user = User::findOne(["id"=>$model->user_id]);
                    if(isset($user) && $user != NULL) {
                        return $user->getFullName() . "<br>" . $user->email . "<br>ID = " . $user->id;
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Cualquiera'],
                'filter'=>  yii\helpers\ArrayHelper::map(User::find()->asArray()->all(), 'id', 'email'), 
            ],
            [
                'label'=>'Plan actual',
                'attribute'=>'current_plan',
                'value'=>function ($model, $key, $index, $widget) {
                    $plan = Plan::findOne(["id"=>$model->current_plan]);
                    if(isset($plan) && $plan != NULL) {
                        return $plan->admin_name;
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Cualquiera'],
                'filter'=>  yii\helpers\ArrayHelper::map(Plan::find()->asArray()->all(), 'id', 'admin_name'), 
            ],
            ['attribute'=>'free',
                'label'=>'Gratuito',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Si', 
                'falseLabel' => 'No'
            ],          
            ['attribute'=>'non_payment',
                'label'=>'Impago',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Si', 
                'falseLabel' => 'No'
            ],
            ['attribute'=>'frozen',
                'label'=>'Congelado',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Si', 
                'falseLabel' => 'No'
            ],
            [
                'label'=>'Almacenamiento asignado',
                'attribute'=>'current_plan',
                'value'=>function ($model, $key, $index, $widget) {
                    $plan = Plan::findOne(["id"=>$model->current_plan]);
                    if(isset($plan) && $plan != NULL) {
                        return $plan->storage . "Gb";
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Cualquiera'],
                'filter'=>  yii\helpers\ArrayHelper::map(Plan::find()->asArray()->all(), 'id', 'admin_name'), 
            ],
                        
            [
                'attribute' => 'used_storage',
                'label'=>'Almacenamiento usado',
                'value'=>function ($model, $key, $index, $widget) {
                    return \common\utils\MyprojecttUtils::getNormalizedUsedStorage($model->used_storage);
                },
            ],
                        
            
            [
                'label'=>'Proyectos asignados',
                'attribute'=>'limit_projects',                
            ],
            [
                'attribute' => 'used_projects',
                'label'=>'Proyectos usados',
            ],
                        
            
            [
                'attribute' => 'next_payment',
                'label'=>'Próximo pago',
                'value'=>function ($model, $key, $index, $widget) {
                    return \common\utils\MyprojecttUtils::getFormattedDate($model->next_payment, true);
                },
            ],
            // 'limit_projects',
            // 'user_id',
            //'state',
            // 'paypal_profile_id',
                        
            'gateway_type',
            [
                'attribute' => 'promo_code',
                'label'=>'Cod. Promocional',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->promo_code != null && $model->promo_code!="NULL") {
                        return $model->promo_code; 
                    } else {
                        return "N.A.";
                    }
                },
            ],
            'promo_used_months',
            // 'alert_80',
            // 'alert_90',
            // 'alert_100',

            [
                'attribute' => 'updated_at',
                'label'=>'Actualizado',
                'value'=>function ($model, $key, $index, $widget) {
                    return \common\utils\MyprojecttUtils::getFormattedDate($model->updated_at, true); 
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
