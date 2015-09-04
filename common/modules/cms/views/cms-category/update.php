<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CmsCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category',
]) . ' ' . $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TITLE, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="cms-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
