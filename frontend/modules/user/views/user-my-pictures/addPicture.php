<section class="pageContent">
	<div id='mycustomscroll' class='flexcroll'>
	<p class="profileHead"><i class="fa fa-user left mr10"></i>My profile</p>
    <section class="leftpannel">
    	<?= \frontend\modules\user\widgets\UserMenuWidget::widget(); ?>      
    </section>
    <section class="rightpannel">
    	<section class="editHead"><p class="t1 left">My pictures / Galleries / Trip 1 / Add picture</p></section>
		<section class="album fotos">
        	<p>We remind the pictures will be published in our web site after validation by our web master</p>
			
            <p class="salsa"><input class="left kto" type="checkbox" /> I accept my pictures will be published in the corresponding destination section</p>
            <div class="right redbox">
               <select name="event1" class="left event1" tabindex="1">
                    <option value="">Picture location</option>
                    <option value="4">Small</option>
                    <option value="10">Medium</option>
                    <option value="10">Large</option>
                    <option value="10">X-Large</option>
                    <option value="10">2X-Large</option>
                </select>
            </div>
            <div class="clear20"></div>
            <p class="tcenter"><img src="<?=Yii::getAlias("@web")?>/images/capture.png" alt="" /></p>
            <p class="tcenter">Drag files here or</p>
            <p class="tcenter"><button class="smlsbtn">Select files</button></p>
            <div class="clear"></div>
        </section>
    </section>
    <div class="clear"></div>
    </div>   
</section>
