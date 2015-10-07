<section class="pageContent">
	<p class="profileHead"><i class="fa fa-user left mr10"></i>My profile</p>
    <section class="leftpannel">
        <?= \frontend\modules\user\widgets\UserMenuWidget::widget(); ?>
    </section>
    <section class="rightpannel">
    	<section class="editHead"><p class="t1 left">My profile</p><a href="#" class="t2 right">[edit]</a></section>
        <p><a href="#"><img src="<?=Yii::getAlias("@web");?>/images/userDp.jpg" alt="" class="left mr15" /></a>_contact name<br />_mail</p>
        <div class="clear10"></div>
        <p class="p1">Contact details <span>(optional)</span></p>
        <p class="space52">_address</p>
		<p class="space52">_city</p>
		<p class="space52">_telephone</p>
        <div class="clear10"></div>
	    <p class="p1">Contact details <span>(optional)</span></p>
        <p class="space52"><input class="left chkit" type="checkbox" />I want my feedbacks to be public</p>
        <button class="smlsbtn footbtn">Save</button>
    </section>   
</section>

