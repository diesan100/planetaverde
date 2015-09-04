<?php

use yii\helpers\Html;
use \kartik\grid\GridView;
use common\models\User;
use common\utils\MyprojecttUtils;

/* @var $this yii\web\View */
/* @var $searchModel usersbackend\modules\users\models\Usersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = $this->title;

$isFa = true;
$pdfHeader = "";
$pdfFooter = "";
$title = "titulo";

$exportConfig = [
    GridView::HTML => [
        'label' => Yii::t('app', 'HTML'),
        'icon' => $isFa ? 'file-text' : 'floppy-saved',
        'iconOptions' => ['class' => 'text-info'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('app', 'grid-export'),
        'alertMsg' => Yii::t('app', 'The HTML export file will be generated for download.'),
        'options' => ['title' => Yii::t('app', 'Hyper Text Markup Language')],
        'mime' => 'text/html',
        'config' => [
            'cssFile' => 'http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css'
        ]
    ],
    GridView::CSV => [
        'label' => Yii::t('app', 'CSV'),
        'icon' => $isFa ? 'file-code-o' : 'floppy-open', 
        'iconOptions' => ['class' => 'text-primary'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('app', 'grid-export'),
        'alertMsg' => Yii::t('app', 'The CSV export file will be generated for download.'),
        'options' => ['title' => Yii::t('app', 'Comma Separated Values')],
        'mime' => 'application/csv',
        'config' => [
            'colDelimiter' => ",",
            'rowDelimiter' => "\r\n",
        ]
    ],
    GridView::TEXT => [
        'label' => Yii::t('app', 'Text'),
        'icon' => $isFa ? 'file-text-o' : 'floppy-save',
        'iconOptions' => ['class' => 'text-muted'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('app', 'grid-export'),
        'alertMsg' => Yii::t('app', 'The TEXT export file will be generated for download.'),
        'options' => ['title' => Yii::t('app', 'Tab Delimited Text')],
        'mime' => 'text/plain',
        'config' => [
            'colDelimiter' => "\t",
            'rowDelimiter' => "\r\n",
        ]
    ],
    GridView::EXCEL => [
        'label' => Yii::t('app', 'Excel'),
        'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('app', 'grid-export'),
        'alertMsg' => Yii::t('app', 'The EXCEL export file will be generated for download.'),
        'options' => ['title' => Yii::t('app', 'Microsoft Excel 95+')],
        'mime' => 'application/vnd.ms-excel',
        'config' => [
            'worksheet' => Yii::t('app', 'ExportWorksheet'),
            'cssFile' => ''
        ]
    ],
    GridView::PDF => [
        'label' => Yii::t('app', 'PDF'),
        'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('app', 'grid-export'),
        'alertMsg' => Yii::t('app', 'The PDF export file will be generated for download.'),
        'options' => ['title' => Yii::t('app', 'Portable Document Format')],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'c',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods' => [
                'SetHeader' => [
                    ['odd' => $pdfHeader, 'even' => $pdfHeader]
                ],
                'SetFooter' => [
                    ['odd' => $pdfFooter, 'even' => $pdfFooter]
                ],
            ],
            'options' => [
                'title' => $title,
                'subject' => Yii::t('app', 'PDF export generated by kartik-v/yii2-grid extension'),
                'keywords' => Yii::t('app', 'krajee, grid, export, yii2-grid, pdf')
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],
    GridView::JSON => [
        'label' => Yii::t('app', 'JSON'),
        'icon' => $isFa ? 'file-code-o' : 'floppy-open',
        'iconOptions' => ['class' => 'text-warning'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('app', 'grid-export'),
        'alertMsg' => Yii::t('app', 'The JSON export file will be generated for download.'),
        'options' => ['title' => Yii::t('app', 'JavaScript Object Notation')],
        'mime' => 'application/json',
        'config' => [
            'colHeads' => [],
            'slugColHeads' => false,
            'jsonReplacer' => null,
            'indentSpace' => 4
        ]
    ],
];

?>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'exportConfig'=>$exportConfig,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            //'heading'=>$heading,
        ],
        'toolbar'=> [    
            'content' => Html::a(Yii::t('app', 'Crear Usuario'), ['create'], ['class' => 'btn btn-success']),
            '{export}',
        ],
       // set export properties
        'export'=>[
            'fontAwesome'=>true
        ],
        
        'exportConfig' => [
            GridView::EXCEL => ['label' => 'Guardar como Excel'],
            GridView::PDF => ['label' => 'Guardar como PDF'],
            GridView::CSV => ['label' => 'Guardar como CSV'],
            GridView::HTML => ['label' => 'Guardar como HTML'],
            GridView::TEXT => ['label' => 'Guardar como Texto'],
        ],
        
        
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            [ 'attribute' =>'id',
                'width' => "1%" ],
            'email:email',
            'name',
            'surname',
            'company',
            //'password',
            // 'state',
            
            
            [
                'attribute' => 'creation_date',
                //'width' => '15%',
                'label' => 'Fecha Registro',
                //'format'=>'date',
                'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
                'value'=>function ($model, $key, $index, $widget) {               
                    return \common\utils\MyprojecttUtils::getFormattedDate($model->creation_date, true);                
                },
                'filterWidgetOptions' => [
                'presetDropdown' => true,
                'pluginOptions' => [
                    'format' => 'YYYY-MM-DD',
                    'separator' => ' a ',
                    'opens'=>'left',
                                ] ,
                'pluginEvents' => [
                    //"apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
                                ] 
                ],
                
            ],
            [
                'attribute'=>'last_acces',
                //'label'=>'Estado',
                'value'=>function ($model, $key, $index, $widget) {
                    return MyprojecttUtils::getFormattedDate($model->last_acces, true) . " " . 
                        MyprojecttUtils::getFormattedTime($model->last_acces);
                }
            ],
            [
                'attribute'=>'status',
                'label'=>'Estado',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->state == User::STATUS_ACTIVE) {
                        return "Activo";
                    } else if($model->state == User::STATUS_DELETED) {
                        return "Eliminado";
                    } else {
                        return "Desconocido";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  User::$STATUS_ARRAY, 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Cualquiera'],
                
            ],
            [
                'attribute' => 'free',
                'label' => 'Gratuito',
                'format' => 'html',
                'hAlign' => 'center',
                'value'=>function ($model, $key, $index, $widget) {
                    $membership = usersbackend\modules\users\models\Membership::findOne(["user_id"=>$model->id]);
                    if($membership != null) {
                        if ($membership->free) {
                            return '<span class="glyphicon glyphicon-ok text-success"></span>';
                        } else {
                            return '<span class="glyphicon glyphicon-remove text-danger"></span>';                            
                        }
                    }
                },
            ],
            [
                'attribute' => 'plan',
                'label' => 'Plan',
                'value'=>function ($model, $key, $index, $widget) {
                    $membership = usersbackend\modules\users\models\Membership::findOne(["user_id"=>$model->id]);
                    if($membership != null) {
                        $plan = backend\modules\planes\models\Plan::findOne(["id"=>$membership->current_plan]);
                        if($plan != null) {
                            return $plan->admin_name;
                        }
                    }
                    
                },
            ],
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
            
            
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

