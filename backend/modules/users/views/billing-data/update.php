<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\BillingData */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Billing Data',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Billing Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="billing-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
