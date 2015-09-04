<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsLayoutSection */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Cms Layout Section',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms Layout Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

