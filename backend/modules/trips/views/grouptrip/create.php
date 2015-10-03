<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\trips\models\GroupTrip */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Group Trip',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Trips'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="group-trip-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
