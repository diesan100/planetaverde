<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsLayout */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cms Layout',
]) . ' ' . $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms Layouts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TITLE, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="cms-layout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
