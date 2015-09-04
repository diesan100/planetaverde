<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\billing\models\PaypalTx */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Paypal Tx',
]) . ' ' . $model->tx_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paypal Txes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tx_id, 'url' => ['view', 'id' => $model->tx_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="paypal-tx-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
