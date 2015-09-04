<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmsCategory */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

