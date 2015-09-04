<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;
use backend\modules\billing\models\Invoice;
use \backend\modules\planes\models\PlanSearch;

/* @var $this yii\web\View */
/* @var $searchModel common\models\payments\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Facturas');
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
            ['content'=>
            Html::a(Yii::t('app', 'Crear Factura'), ['create'], ['class' => 'btn btn-success'])
        ],
            '{export}',
            '{toggleData}',
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
            //['class' => 'yii\grid\SerialColumn'],
                'id',
                //'user_id',
            
            [
                'attribute'=>'user_id',
                'value'=>function ($model, $key, $index, $widget) {
                    $user = User::findOne(["id"=>$model->user_id]);
                    if(isset($user)) {
                        return $user->email;
                    }
                },
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any'],
                'filter'=> ArrayHelper::map(User::find()->asArray()->all(), 'id', 'email'),
            ],
            [
                //'attribute'=>'user_id',
                'label'=>'Nombre',
                'value'=>function ($model, $key, $index, $widget) {
                    $user = User::findOne(["id"=>$model->user_id]);
                    if(isset($user)) {
                        return $user->getFullName();
                    }
                },                
            ],
                        
            [
                'attribute'=>'plan_id',
                'value'=>function ($model, $key, $index, $widget) {
                    $plan = PlanSearch::findOne(["id"=>$model->plan_id]);
                    if(isset($plan)) {
                        return $plan->comercial_name;
                    } else {
                        return "(not set)";
                    }
                },
                'filterType'=>  GridView::FILTER_SELECT2,
                'filterInputOptions'=>['placeholder'=>'Any'],
                'filter'=> ArrayHelper::map(PlanSearch::find()->asArray()->all(), 'id', 'comercial_name'),
            ],
                        
            [
                'attribute'=>'state',
                'value'=>function ($model, $key, $index, $widget) {
                    if($model->state == Invoice::INVOICE_STATE_STARTED) {
                        return "Iniciado";
                    } else if($model->state == Invoice::INVOICE_STATE_PROCESSING) {
                        return "Procesando";
                    } else if($model->state == Invoice::INVOICE_STATE_COMPLETED) {
                        return "Completado";
                    } else if($model->state == Invoice::INVOICE_STATE_ERROR) {
                        return "Error";
                    }
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>  Invoice::$INVOICE_STATES_ARRAY, 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any state'],
                
            ],
            [
                'attribute'=>'net_amount',
                /*'value'=>function ($model, $key, $index, $widget) {
                    return $model->net_amount
                }*/
               'format'=>['decimal', 2],
            ],

            [
                'attribute'=>'taxes',
                /*'value'=>function ($model, $key, $index, $widget) {
                    return $model->net_amount
                }*/
               'format'=>['decimal', 2],
            ], 
            [
                'attribute'=>'discount',
                /*'value'=>function ($model, $key, $index, $widget) {
                    return $model->net_amount
                }*/
               'format'=>['decimal', 2],
            ],
            [
                'attribute'=>'total_amount',                
               'format'=>['decimal', 2],
            ],
            /*[
                'class'=>'kartik\grid\FormulaColumn', 
                'header'=>'Importe total', 
                'vAlign'=>'middle',
                'value'=>function ($model, $key, $index, $widget) { 
                    $p = compact('model', 'key', 'index');
                    return $widget->col(5, $p) + $widget->col(6, $p);
                },
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'hAlign'=>'right', 
                'width'=>'7%',
                'format'=>['decimal', 2],
                'mergeHeader'=>true,
                'pageSummary'=>true,
                'footer'=>true
            ],*/
            
            
                        
              
                // 'date_to',
                // 'date_from',
            [
                'attribute' => 'created_at',
                //'width' => '15%',
                'label' => 'Creado',
                //'format'=>'date',
                
                'value'=>function ($model, $key, $index, $widget) {               
                    return \common\utils\MyprojecttUtils::getFormattedDate($model->created_at, true);                
                },
                'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
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
                // 'updated_at',
                // 'error',
            'pyp_profile_id',
                // 'pyp_payer_id',
                // 'pyp_token',
                        
            [
                'label'=>'PDF',
                'value'=>function ($model, $key, $index, $widget) {
                    return $model->getBackendPrintBillButton();
                },
                'format'=>'raw',
             ],
            [
                //'width' => '15%',
                'class' => 'kartik\grid\ActionColumn',
                /*'template' => '{view}{update}{delete}{invoice}',
                'buttons' => [
                    'invoice' => function ($url, $model) {
                        return $model->getBackendPrintBillButton();
                    }
                ],*/
            ],
                        
                        
        ],
    ]); ?>


