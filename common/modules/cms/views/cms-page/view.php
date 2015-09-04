<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsPage */

$this->title = $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-page-view">


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
            'CONTENT_ID',
            'TYPE',
            'ORDER',
            'URL:url',
            'CONTROLLER',
            'METHOD',
            'TITLE',
            'LAYOUT',
            'IS_HOME',
            'STATE',
            'POST_CATEGORY',
            'POST_ID',
            'HEADER_IMAGE',
            'HEADER_TEXT',
            'SHOW_BREAD_CRUMBS',
            'INTRO_TEXT',
            'INTRO_IMAGE',
            'HEADER_MASK',
            'PARENT_PAGE',
            'WRAP_CONTENT',
        ],
    ]) ?>

</div>
