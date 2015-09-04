<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsWidgetPosition */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Widget Position',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Widget Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-widget-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
