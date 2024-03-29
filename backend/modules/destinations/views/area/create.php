<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\Area */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Area',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
