<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\BillingData */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Billing Data',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Billing Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billing-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
