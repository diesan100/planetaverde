<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\DatePicker;

$form = ActiveForm::begin(); ?>
        <div class="row">
                <div class="col-md-12">
                        <h3>Información de la cuenta</h3>
                        <hr>
                </div>
                <div class="col-md-6">

                        <?= $form->field($model, 'name' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 255, 'class'=>'form-control bottom-border']) ?>
                        <?= $form->field($model, 'surname' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 255, 'class'=>'form-control bottom-border']) ?>
                        
                        <?= $form->field($model, 'email' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 150]) ?>
                    
                        <?= $form->field($model, 'telephone' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 20]) ?>

                   
                            <?php
                                echo $form->field($model, 'birthday')->widget(DatePicker::classname(), [
                                    'options' => ['placeholder' => 'Enter birth date ...'],
                                    'value' => "1970-01-01",
                                    'language' => 'en_us',
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'yyyy-mm-dd',
                                    ]
                                ]);
                                
                            ?>
                       
                    
                    
                        <div class="form-group">
                                <label class="control-label">
                                        Gender
                                </label>
                                <div>
                                        <label class="radio-inline">
                                                <input type="radio" class="grey" value="" name="gender" id="gender_female">
                                                Female
                                        </label>
                                        <label class="radio-inline">
                                                <input type="radio" class="grey" value="" name="gender"  id="gender_male" checked="checked">
                                                Male
                                        </label>
                                </div>
                        </div>
                    
                        <?= $form->field($model, 'studies' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 255]) ?>                    
                        <?= $form->field($model, 'about_me' , ['options'=>['class'=>'form-group']])->textArea(['maxlength' => 1000]) ?>
                </div>
                <div class="col-md-6">
                    
                    <?= $form->field($model, 'company' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 255]) ?>
                    
                    <?= $form->field($model, 'address' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 255]) ?>
                    <?= $form->field($model, 'province' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 255]) ?>

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'zip_code' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 30]) ?> 
                        </div>
                        <div class="col-md-8">
                            <?php echo $form->field($model, 'city' , ['options'=>['class'=>'form-group']])->textInput(['maxlength' => 30]) ?>
                        </div>
                    </div>                        
                </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div>
                    * Campos obligatorios
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">                
                <div class="col-md-4">
                        <?= Html::submitButton(Yii::t('app', 'Actualizar'). ' <i class="fa fa-arrow-circle-right"></i>', ['class' => 'btn btn-green btn-block']) ?>
                </div>
        </div>
<?php ActiveForm::end(); ?>

