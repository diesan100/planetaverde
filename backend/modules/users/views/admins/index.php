<?php

use yii\helpers\Html;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel usersbackend\modules\users\models\Usersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administradores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'User',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [ 'attribute' =>'id',
                'width' => "5%" ],
            'email:email',
            'name',
            'surname',
            //'password',
            // 'state',
            'creation_date',
            'last_acces',
            // 'status',
            // 'username',
            // 'created_at',
            // 'updated_at',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'telephone',
            // 'skype',
            // 'address',
            // 'province',
            // 'zip_code',
            // 'employment',
            // 'job_position',
            // 'birthday',
            // 'studies',
            // 'professional_experience',
            // 'about_me',
            // 'picture_url:url',
            // 'company',
            
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
