<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\settings\SettingsModule;
use \backend\modules\settings\models\Settings;
use common\utils\MyUtils;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">

    <p>
        <?= Html::a(Yii::t('app', 'Nuevo parámetro'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'width' => '15%',
                'label'=>'Grupo',
                'attribute'=>'group_name',
                /*'value'=>function ($model, $key, $index, $widget) {
                    $user = User::findOne(["id"=>$model->owner]);
                    if(isset($user) && $user != NULL) {
                        return $user->getFullName();
                    } else {
                        return "(not set)";
                    }
                },*/
                'filterType'=>GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Cualquiera'],
                'filter'=>  yii\helpers\ArrayHelper::map(Settings::getDisctinctGroups(), 'group_name', 'group_name'), 
            ],
            [
                'attribute'=>'param_name',
                'label'=>'Nombre',
            ],
            
            'description',
            [
                'attribute'=>'param_type',
                'label'=>'Tipo',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->param_type == SettingsModule::TYPE_BOOLEAN) {
                        return "Si/No";
                    } else if ($model->param_type == SettingsModule::TYPE_INTEGER) {
                        return "Entero";
                    } else if ($model->param_type == SettingsModule::TYPE_TEXT) {
                        return "Texto";
                    } else if ($model->param_type == SettingsModule::TYPE_LONGTEXT) {
                        return "Texto largo";
                    } else {
                        return "Unknown";
                    }
                    
                },
            ],
            [
                'attribute'=>'param_int_value',
                'label'=>'Valor del parámetro',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->param_type == SettingsModule::TYPE_BOOLEAN || $model->param_type == SettingsModule::TYPE_INTEGER) {
                        return $model->param_int_value;
                    } else if ($model->param_type == SettingsModule::TYPE_TEXT) {
                        return MyUtils::cropName($model->param_varchar_value, 50);
                    } else if ($model->param_type == SettingsModule::TYPE_LONGTEXT) {
                        return MyUtils::cropName($model->param_long_value, 50);
                    } else {
                        return "Unknown";
                    }
                    
                },
            ],
            

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
