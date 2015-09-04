<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
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
            'id',
            'email:email',
            'name',
            'surname',
            'password',
            'state',
            'creation_date',
            'last_acces',
            'status',
            'username',
            'created_at',
            'updated_at',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'telephone',
            'skype',
            'address',
            'province',
            'zip_code',
            'employment',
            'job_position',
            'birthday',
            'studies',
            'professional_experience',
            'about_me',
            'picture_url:url',
            'company',
        ],
    ]) ?>

</div>
