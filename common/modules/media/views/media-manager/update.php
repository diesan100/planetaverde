<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CmsImages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cms Images',
]) . ' ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>