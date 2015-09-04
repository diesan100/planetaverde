<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\Membership */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Membresía',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Memberships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="membership-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
