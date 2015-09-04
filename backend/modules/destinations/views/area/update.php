<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\Area */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Area',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="area-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>