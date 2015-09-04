<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\billing\models\PaypalProfiles */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Paypal Profiles',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paypal Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-profiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
