<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CmsPostContent */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Post Content',
]) . ' ' . $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TITLE, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
