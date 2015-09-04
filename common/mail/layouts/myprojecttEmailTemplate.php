<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <style type="text/css">
        body {
            background-color: #ffffff;
            background-image: url(<?=Yii::getAlias("@frontend_web");?>/images/veladura.png);
            background-repeat: no-repeat;
            background-position: left center;
            padding: 30px;
            width: 100%;
        }
        
        a {
            border: none;
            text-decoration: none;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
    
    <?php $this->beginBody() ?>
    <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" background="<?=Yii::getAlias("@frontend_web");?>/images/veladura.png" style="background-repeat:no-repeat;">
            
			<tr width="700px">
                <td border="0" cellpadding="0" cellspacing="0" align="center" colspan="3">
                    <img src="<?=Yii::getAlias("@frontend_web");?>/images/logo.png" style="margin-top: 30px; margin-bottom: 20px;"></img>
                </td>
            </tr>
			<tr width="700px" height="20px">
                <td border="0" cellpadding="0" cellspacing="0" colspan="3">
                    &nbsp;
                </td>
            </tr>
            <tr width="700px">
				<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
                <td border="0" cellpadding="0" cellspacing="0" width="70%">
                    <?= $content ?>
                </td>
				<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
            </tr>
			<tr width="700px" height="20px">
                <td border="0" cellpadding="0" cellspacing="0" colspan="3">
                    &nbsp;
                </td>
            </tr>
			
            <tr width="700px" height="10px">
				<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
                <td border="0" cellpadding="0" cellspacing="0"  bgcolor="#38a962"  align="center" width="70%">&nbsp;</td>
				<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
            </tr>
			
			
            <tr width="700px">
		<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
                <td border="0" cellpadding="0" cellspacing="0"  bgcolor="#38a962"  align="center" width="70%">
                    <a style="width: 700px; border-color: transparent; padding: 30px; border: 0px; margin-top: 20px; margin-bottom: 20px;" href="<?=$buttonUrl?>">
                        <img src="<?=Yii::getAlias("@frontend_web");?>/images/email-button.png" style="margin-top: 15px; margin-bottom: 15px"></img>
                    </a>
                </td>
		<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
            </tr>
			
            <tr width="700px" height="10px">
		<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
                <td border="0" cellpadding="0" cellspacing="0"  bgcolor="#38a962"  align="center" width="70%">&nbsp;</td>
		<td border="0" cellpadding="0" cellspacing="0" width="15%"></td>
            </tr>
			
			<tr width="700px" height="50px">
                <td border="0" cellpadding="0" cellspacing="0">
                    &nbsp;
                </td>
            </tr>
        </table>
    </center>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

