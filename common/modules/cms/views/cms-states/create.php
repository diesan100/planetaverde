<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsStates */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Cms States',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-states-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
