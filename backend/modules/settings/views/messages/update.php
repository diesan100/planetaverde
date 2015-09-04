<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AppMessages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'App Messages',
]) . ' ' . $model->identifier;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'App Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->identifier, 'url' => ['view', 'id' => $model->identifier]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="app-messages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
