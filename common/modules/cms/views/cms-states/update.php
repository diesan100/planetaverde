<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsStates */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cms States',
]) . ' ' . $model->STATE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STATE, 'url' => ['view', 'id' => $model->STATE]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="cms-states-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
