<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\billing\models\PaypalTx */

$this->title = $model->tx_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paypal Txes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-tx-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->tx_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->tx_id], [
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
            'tx_id',
            'txn_type',
            'payer_id',
            'recurring_payment_id',
            'created_at',
        ],
    ]) ?>

</div>
