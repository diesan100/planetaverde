<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\cms\models\CmsPage;
use common\modules\cms\models\CmsLayoutSection;
use common\modules\cms\models\CmsLayout;
use yii\helpers\ArrayHelper;
use common\modules\cms\models\CmsMenu;
use common\modules\cms\constants\CMSConstants;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\CmsWidgetPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-widget-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
  		// We compount layout name with layout section name
    	$sections = CmsLayoutSection::find()->asArray()->all();
    	$array = array();
    	foreach ($sections as $section) {
    		$layout_name = CmsLayout::findOne(['id'=>$section['LAYOUT']]);
    		$array[$section['ID']] = $layout_name['TITLE'] . " - " . $section['NAME'];
    	}
    	echo $form->field($model, 'LAYOUT_SECTION')->dropDownList($array,['ID'=>'NAME']);
    ?>
    
    <?php 
        $dataCat=ArrayHelper::map(CmsMenu::find()->asArray()->all(), 'ID', 'NAME');
    	echo $form->field($model, 'WIDGET_ID')->dropDownList($dataCat,['ID'=>'NAME']);
    ?>

    	<?php 
        $dataCat=ArrayHelper::map(CmsPage::find()->asArray()->all(), 'ID', 'TITLE');
    	echo $form->field($model, 'PAGE')->dropDownList($dataCat,['ID'=>'TITLE']);
    ?>
    
    <?= $form->field($model, 'ORDER')->textInput() ?>
    
    <?php 
        $dataCat=ArrayHelper::toArray(CMSConstants::$WIDGET_TYPES , 'ID', 'VALUE');
    	echo $form->field($model, 'TYPE')->dropDownList($dataCat,['ID'=>'VALUE']);
    ?>

    


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
