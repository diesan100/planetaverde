<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmsPostContent */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Post Content',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
