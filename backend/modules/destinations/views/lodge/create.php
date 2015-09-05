<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\destinations\models\Lodge */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Lodge',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lodges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lodge-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
