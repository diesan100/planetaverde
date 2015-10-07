<section class="pageContent">
	<div id='mycustomscroll' class='flexcroll'>
    	<p class="profileHead"><i class="fa fa-user left mr10"></i>My profile</p>
        <section class="leftpannel">
            <?= \frontend\modules\user\widgets\UserMenuWidget::widget(); ?>    
        </section>
        <section class="rightpannel">
            <section class="editHead"><p class="t1 left">Planned trips  / Name de Trip / Documents (Information)</p></section>
            <p>
                <a href="#"><img src="<?=Yii::getAlias("@web")?>/images/mapDp.jpg" alt="" class="left mr15 mb30 dpBorder" /></a>
                <a class="rstrap" href="#">Documents (information)</a>
                <a class="rstrap" href="#">Bills</a>
                <a class="rstrap" href="#">Payments</a>
                <a class="rstrap" href="#">Trip Documents</a>
                <a class="rstrap" href="#">Feedback</a>
                <a class="rstrap" href="#">Offers</a>
            </p>
            <div class="clear10"></div>
            <section class="editHead"></section>
            
            <section class="maplisting">
                <p>Payment 1</p>
                <section class="editHeadz m0"><p class="t2 left">State [Paid | Pending] | Expriration date |</p><a href="#" class="t2 ml5"> view</a></section>
            </section>
            
            <section class="maplisting">
                <p>Payment 2</p>
                <section class="editHeadz m0"><p class="t2 left">State [Paid | Pending] | Expriration date |</p><a href="#" class="t2 ml5"> view</a></section>
            </section>
            
            <section class="maplisting">
                <p>Payment 3</p>
                <section class="editHeadz m0"><p class="t2 left">State [Paid | Pending] | Expriration date |</p><a href="#" class="t2 ml5"> view</a></section>
            </section>
                  
        </section>  
    	<div class="clear"></div>
    </div> 
</section>