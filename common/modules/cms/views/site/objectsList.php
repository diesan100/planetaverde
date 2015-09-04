<?php 
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$model = new \common\modules\cms\models\MockModel();
$form = ActiveForm::begin();
    if($case == "upper") {

        $dbData = ArrayHelper::merge([["-1"=>"NULL" , "TITLE"=>"None"]], $list);

        $items=ArrayHelper::map($dbData, 'ID', 'TITLE');
        echo $form->field($model, 'attribute')->dropDownList($items,['ID'=>'select-object-id']); 
    } else if($case == "lower") {

        $dbData = ArrayHelper::merge([["-1"=>"NULL" , "title"=>"None"]], $list);

        $items=ArrayHelper::map($dbData, 'id', 'title');
        echo $form->field($model, 'attribute')->dropDownList($items,['id'=>'select-object-id']); 
    }                    
ActiveForm::end();                
//yii\helpers\Html::a("Select", "#", ["options"=>["onclick:javascript:alert()"]]);

echo yii\helpers\Html::a("Select", "#",['class' => 'btn btn-success', "onclick"=>"javascript:selectObject();"]);

?>


