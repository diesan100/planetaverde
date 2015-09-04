<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmsMenu */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Menu',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
