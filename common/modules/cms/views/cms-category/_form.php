<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\cms\models\CmsCategory;

/* @var $this yii\web\View */
/* @var $model app\models\CmsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TITLE')->textInput(['maxlength' => 50]) ?>
        
    <?php 
        $dbData = CmsCategory::find()->asArray()->all();
        $dbData = ArrayHelper::merge([["-1"=>"NULL" , "TITLE"=>"None"]], $dbData);
        $data=ArrayHelper::map($dbData, 'ID', 'TITLE');
        echo $form->field($model, 'PARENT_CATEGORY', ['labelOptions'=>['label' => 'Parent Category']])->dropDownList($data,['ID'=>'TITLE']);
    ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
