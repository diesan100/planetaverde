<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\CmsMenu */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Modal::begin([
    'header'=>'<h4><strong>'.Yii::t('app', 'Menu Item').'</strong></h4>',
    'id'=>'menu-item-modal-form',
    'size'=>'modal-lg',
]); ?>

<div id="menu-item-modal-content"> 
    Loading...
</div>

<?php
Modal::end();
?>


<div class="col-sm-12">
    <div class="panel panel-white panel-tabs" id="tabs-menu">
        <div class="panel-heading">
                <h4 class="panel-title">invisible</h4>
        </div>
        <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <?php 
                    foreach ($all_menus as $menu) { ?>                        
                        <li class="<?=($menu->ID == $model->ID)?"active":"";?>">
                            <a href="<?= Url::to(['//cms/cms-menu/show',"id"=>$menu->ID]) ?>">
                                <?= $menu->NAME; ?>
                            </a>
                        </li>                        
                    <?php } ?> 
                    <li class="">
                        <a href="<?= Url::to(['//cms/cms-menu/create']) ?>">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="panel_tab_<?=$model->ID?>" class="tab-pane active">
                        <!-- START: TAB CONTENT -->
                        <div class="row">
                            <div class="col-sm-4">
                                
                                <?= $this->render('_form', [
                                    'model' => $model,
                                ]) ?>
                                
                                <?php if (!$model->isNewRecord) { ?>
                                <p>
                                <?= Html::a(Yii::t('app', 'Delete Menu'), ['delete', 'id' => $model->ID], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this menu?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                </p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-8">
                                <p>
                                <?=Html::button('Add Menu Item <i class="fa fa-plus-circle"></i>', ["value"=>  Url::to(['//cms/cms-menu-item/create-ajax',"MENU"=>$model->ID]), "id"=>"add-menu-item-button", "class"=>"btn btn-success"]); ?>
                                </p>                                
                                <div class="dd" id="nestable2">
                                    <ol class="dd-list">
                                    <?php 
                                    //var_dump($menu_items);
                                    foreach ($menu_items as $item) {?>
                                        <li class="dd-item" data-id="<?=$item->ID;?>">
                                            <div class="dd-handle level1">
                                                <?=$item->TITLE;?> 
                                                <span class="menu-item-controls">
                                                    <?=Html::button('<i class="fa fa-pencil-square-o"></i>', ["value"=>   Url::to(['//cms/cms-menu-item/update-ajax', 'id' => $item->ID]), "class"=>"edit-item-ajax"]); ?>
                                                    <?= Html::a('<i class="fa fa-trash-o"></i>', Url::to(['//cms/cms-menu/delete-item', 'id' => $item->ID]), [
                                                        'class' => '',
                                                        'data' => [
                                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>                                                    
                                                </span>
                                            </div>
                                            <?php
                                            if ($item->hasChildren()) {
                                                $subChildren = $item->getChildren();
                                                ?>
                                                <ol class="dd-list">
                                                <?php
                                                foreach ($subChildren as $sub_item) {?>
                                                    <li class="dd-item" data-id="<?=$sub_item->ID;?>">
                                                        <div class="dd-handle level2">
                                                            <?=$sub_item->TITLE;?>
                                                            <span class="menu-item-controls">
                                                                <?=Html::button('<i class="fa fa-pencil-square-o"></i>', ["value"=>   Url::to(['//cms/cms-menu-item/update-ajax', 'id' => $sub_item->ID]), "class"=>"edit-item-ajax"]); ?>
                                                                <?= Html::a('<i class="fa fa-trash-o"></i>', Url::to(['//cms/cms-menu/delete-item', 'id' => $sub_item->ID]), [
                                                                    'class' => '',
                                                                    'data' => [
                                                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                                        'method' => 'post',
                                                                    ],
                                                                ]) ?>                                                    
                                                            </span>
                                                        </div>
                                                        <?php
                                                        if ($sub_item->hasChildren()) {
                                                            $subSubChildren = $sub_item->getChildren();
                                                            ?>
                                                            <ol class="dd-list">
                                                            <?php
                                                            foreach ($subSubChildren as $sub_sub_item) {?>
                                                                <li class="dd-item" data-id="<?=$sub_sub_item->ID;?>">
                                                                    <div class="dd-handle level3">
                                                                        <?=$sub_sub_item->TITLE;?>
                                                                        <span class="menu-item-controls">
                                                                            <?=Html::button('<i class="fa fa-pencil-square-o"></i>', ["value"=>   Url::to(['//cms/cms-menu-item/update-ajax', 'id' => $sub_sub_item->ID]), "class"=>"edit-item-ajax"]); ?>
                                                                            <?= Html::a('<i class="fa fa-trash-o"></i>', Url::to(['//cms/cms-menu/delete-item', 'id' => $sub_sub_item->ID]), [
                                                                                'class' => '',
                                                                                'data' => [
                                                                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                                                    'method' => 'post',
                                                                                ],
                                                                            ]) ?>                                                    
                                                                        </span>                                                                        
                                                                    </div>
                                                                </li>
                                                            <?php
                                                            } ?>
                                                            </ol>
                                                        <?php }
                                                        ?>
                                                    </li>
                                                <?php
                                                } ?>
                                                </ol>
                                            <?php }
                                            ?>
                                        </li>
                                    <?php } ?>
                                    </ol>
                                </div>    
                            <!-- end: DRAGGABLE HANDLES 2 -->
                            </div>
                        </div>                                                
                        <!-- END: TAB CONTENT -->
                    </div>                    
                </div>
            </div>
        </div>
    </div> <!-- <div class="panel panel-white panel-tabs" id="tabs-menu"> -->
</div> <!-- <div class="col-sm-12"> -->


    
