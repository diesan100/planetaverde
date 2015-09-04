<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\payments\Invoice */

$this->title = Yii::t('app', 'Actualizar factura: ') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Facturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


