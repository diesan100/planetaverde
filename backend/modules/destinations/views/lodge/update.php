<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\Lodge */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Lodge',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lodges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lodge-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
