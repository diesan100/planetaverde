<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\GroupTrip */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Group Trip',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Trips'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-trip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
