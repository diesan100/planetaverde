<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\Membership */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Membresias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-view">

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'current_plan',
            'created_at',
            'updated_at',
            'next_payment',
            'free',
            'used_storage',
            'limit_storage',
            'used_projects',
            'limit_projects',
            'user_id',
            'state',
            'paypal_profile_id',
            'gateway_type',
            'alert_80',
            'alert_90',
            'alert_100',
        ],
    ]) ?>

</div>
