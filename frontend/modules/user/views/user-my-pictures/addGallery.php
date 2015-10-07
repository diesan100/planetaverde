<section class="pageContent">
	<p class="profileHead"><i class="fa fa-user left mr10"></i>My profile</p>
    <section class="leftpannel">
    	<?= \frontend\modules\user\widgets\UserMenuWidget::widget(); ?>        
    </section>
    <section class="rightpannel">
    	<section class="editHead"><p class="t1 left">My pictures / Galleries / Trip 1 / Add Gallery</p></section>
		<section class="album fotos">
        	<p class="borderbellow">We remind the pictures will be published in our web site after validation by our web master</p>
			
			<p>Choose the trip that you are creating the gallery from</p>
            <div class="redbox">
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
            <a class="t2 right" href="#">[ Create ]</a>
            <div class="clear"></div>
        </section>
    </section>   
</section>

