<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\billing\models\PaypalTx */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Paypal Tx',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paypal Txes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-tx-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
