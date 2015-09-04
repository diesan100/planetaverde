<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CmsPostContent */

$this->title = $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-post-content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'CONTENT',
            'STATE',
            'CREATION_DATE',
            'LAST_MODIFIED',
            'OWNER',
            'PERMALINK',
            'CATEGORY',
            'VERSION_ID',
            'TITLE',
            'FEATURED_IMG',
            'META_DATA',
        ],
    ]) ?>

</div>
