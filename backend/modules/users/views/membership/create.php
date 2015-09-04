<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\Membership */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Membership',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Memberships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
