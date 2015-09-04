<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\modules\cms\models\CmsMenu;
use common\modules\cms\models\CmsPage;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsMenuItem;

/* @var $this yii\web\View */
/* @var $model app\models\CmsMenuItem */
/* @var $form yii\widgets\ActiveForm */

// TODO: ARREGLAR ESTO, AHORA ESTÁ HARDCODED EN EL ASSETS PRINCIPAL
/*\common\modules\cms\CmsModuleAsset::register($this);*/

?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    
       <div class="col-lg-8 col-md-7">

            <?= $form->field($model, 'TITLE')->textInput(['maxlength' => 255]) ?>

            <?php 
                $dataMenu=ArrayHelper::map(CmsMenu::find()->asArray()->all(), 'ID', 'NAME');
                echo $form->field($model, 'MENU')->dropDownList($dataMenu,['ID'=>'NAME']);
            ?>

            <?php 
                $dbData = CmsMenuItem::find()->asArray()->all();                
                $data = [];
                $data["NULL"] = "None";                                
                if($dbData!=null){
                    foreach ($dbData as $menu_item) {          
                        $menu = CmsMenu::findOne($menu_item['MENU']);
                        //var_dump($menu_item['MENU']);
                        $data[$menu_item['ID']] = $menu_item['TITLE'] . " (" . $menu['NAME'] . ")";
                    }
                }                
                
                //$data=ArrayHelper::map($dbData, 'ID', 'TITLE');
                echo $form->field($model, 'PARENT_MENU', ['labelOptions'=>['label' => 'Parent Menu Item']])->dropDownList($data,['ID'=>'TITLE']);
            ?>

            <?= $form->field($model, 'URL')->textInput(['maxlength' => 255]) ?>

            <?php 
                $data=ArrayHelper::map(CmsPage::find()->asArray()->all(), 'ID', 'TITLE');
                echo $form->field($model, 'PAGE')->dropDownList($data,['ID'=>'TITLE']);
            ?>
                     
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            

        </div>
    
        <div class="col-lg-4 col-md-5">
            <?php //$form->field($model, 'ORDER')->textInput() ;
                echo $form->field($model, 'ORDER')->widget(kartik\widgets\TouchSpin::classname(), [
                'options'=>['placeholder'=>'Select an order', 'width' => '200px'],
                'pluginOptions' => [
                    'verticalbuttons' => true,
                    'verticalupclass' => 'glyphicon glyphicon-plus',
                    'verticaldownclass' => 'glyphicon glyphicon-minus',
                ]
            ]);
            ?>
            
            <?php 
                $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_CONTENTS_STATES , 'ID', 'VALUE');
                echo $form->field($model, 'STATE')->dropDownList($dataCat,['ID'=>'VALUE']);
            ?>
            
            <?php 
                $dataCat=ArrayHelper::toArray(CMSConstants::$CMS_MENU_ITEM_TYPES , 'ID', 'VALUE');
                echo $form->field($model, 'TYPE')->dropDownList($dataCat,['ID'=>'VALUE']);
            ?>
            
            <?php
                echo $form->field($model, 'IS_HOME')->checkbox();
            ?>
        </div>
    
    <?php ActiveForm::end(); ?>
</div>