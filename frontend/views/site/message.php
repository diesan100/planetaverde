<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $title;
//print_r(get_class($this));
//var_dump();

?>

<div class="grey_bg">
    <div class="content container" id="main-content">
        <div class="row">
            <div id="main-content-container" style="margin-top: 90px;">
                <div class="centered">
                    <div class="imago-error">
                        <img src="<?= Yii::getAlias('@web')?>/images/imago-error.png">
                    </div>
                    <div class="error-separator"></div>
                    <div class="info-message">
                        <?= $message ?>
                    </div>
                    <div class="error-separator"></div>
                    <div class="logo-error">
                        <img src="<?= Yii::getAlias('@web')?>/images/logo.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>