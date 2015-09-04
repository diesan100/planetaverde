<div class="image_details_wrapper">
    <h5><strong>IMAGE DETAILS</strong></h5>
    <br>
    <div>
        <div style="width: 40%; float: left;">        
            <img src="<?=Yii::getAlias("@frontend_web")."/".$image->URL;?>">               
        </div>
        <div style="width: 58%; float: left; margin-left: 2%;">        
            <?=$image->NAME;?>
            <br>
            <?=$image->CREATED;?>
            <br>
            <?=$image->WIDTH;?>x<?=$image->HEIGHT;?>
            <br>
            <?= yii\helpers\Html::buttonInput("Delete permanently", ["class"=>"bnt-text-red", "onclick:confirm('asdcadc?');"])?>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <table class="image_details_table" border="0">
        <tbody>
            <tr>
                <td>URL</td>
                <td><input type="text" value="<?=$image->URL;?>" readonly=""></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea readonly=""><?=$image->DESCRIPTION;?></textarea></td>
            </tr>
            <tr>
                <td>Meta</td>
                <td><textarea readonly=""><?=$image->META;?></textarea></td>
            </tr>
        </tbody>
    </table>
</div>