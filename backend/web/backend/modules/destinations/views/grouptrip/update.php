<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\GroupTrip */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Group Trip',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Trips'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-trip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
