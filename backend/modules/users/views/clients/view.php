<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model usersbackend\modules\users\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-sm-12">
    <div class="panel">
        <div class="alert alert-info" style="margin-top: 20px;">
            <h2 style="margin-top: 10px;">Datos del cliente</h2>
            <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Estás seguro de que deseas borrar este Cliente?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
        </div>

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
                'updated_at',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
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
</div>


<div class="col-sm-12">
    <div class="panel">
        <div class="alert alert-warning" style="margin-top: 20px;">
                <h2 style="margin-top: 10px;">Datos de facturación</h2>
        </div>

        <?php 
        $billingDate = \usersbackend\modules\users\models\BillingData::findOne(["user_id" => $model->id]);
        
        if($billingDate != null) {
            echo DetailView::widget([
                'model' => $billingDate,
                'attributes' => [
                'id',
                'user_id',
                'razon_social',
                'nif',
                'address_line_1',
                'address_line_2',
                'zip_code',
                'city',
                'state',
                'country',
                'updated_at',
            ],
        ]);
        } else {
            echo "<p style='padding: 15px'>Este cliente no ha especificado datos de facturación.</p>";
        }
        ?>
    </div>
</div>


<div class="col-sm-12">
    <div class="panel">
        <div class="alert alert-warning" style="margin-top: 20px;">
                <h2 style="margin-top: 10px;">Membersia</h2>
        </div>


        <?php 
        $membership = usersbackend\modules\users\models\Membership::findOne(["user_id" => $model->id]);
            echo DetailView::widget([
            'model' => $membership,
            'attributes' => [
                'id',
                'user_id',
                'current_plan',            
                'next_payment',
                'free',
                'used_storage',
                'limit_storage',
                'used_projects',
                'limit_projects',            
                'state',
                'paypal_profile_id',
                'gateway_type',
                'alert_80',
                'alert_90',
                'alert_100',
                'created_at',
                'updated_at',
            ],
        ]);
        ?>
    </div>
</div>
