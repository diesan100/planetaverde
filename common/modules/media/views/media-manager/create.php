<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CmsImages */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Cms Images',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
