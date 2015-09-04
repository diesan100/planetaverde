<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsMenuItem */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Menu Item',
]) . ' ' . $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TITLE, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


