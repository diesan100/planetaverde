<section class="pageContent">
    <div id='mycustomscroll' class='flexcroll'>
	<p class="profileHead"><i class="fa fa-user left mr10"></i>My profile</p>
        <section class="leftpannel">
            <?= \frontend\modules\user\widgets\UserMenuWidget::widget(); ?>     
        </section>
        <section class="rightpannel">
            <section class="editHead"><p class="t1 left">My pictures / Galleries</p></section>
                    <section class="album">
                    <section class="singleAlbum">
                    <a href="#"><img src="<?=Yii::getAlias("@web");?>/images/addAlbum.jpg" alt="" /></a>
                    <span>New</span>
                </section>

                <section class="singleAlbum">
                    <article class="boxit">
                            <img src="<?=Yii::getAlias("@web");?>/images/noImage.jpg" alt="" />
                            <a class="crossi" href="#"><img src="<?=Yii::getAlias("@web");?>/images/cross.png" alt="" /></a>
                    </article>
                    <span>Trip 1</span>
                </section>

                <section class="singleAlbum">
                    <article class="boxit">
                            <img src="<?=Yii::getAlias("@web");?>/images/noImage.jpg" alt="" />
                            <a class="crossi" href="#"><img src="<?=Yii::getAlias("@web");?>/images/cross.png" alt="" /></a>
                    </article>
                    <span>Trip 1</span>
                </section>

                <section class="singleAlbum">
                    <article class="boxit">
                            <img src="<?=Yii::getAlias("@web");?>/images/noImage.jpg" alt="" />
                            <a class="crossi" href="#"><img src="<?=Yii::getAlias("@web");?>/images/cross.png" alt="" /></a>
                    </article>
                    <span>Trip 1</span>
                </section>

                <section class="singleAlbum">
                    <article class="boxit">
                            <img src="<?=Yii::getAlias("@web");?>/images/noImage.jpg" alt="" />
                            <a class="crossi" href="#"><img src="<?=Yii::getAlias("@web");?>/images/cross.png" alt="" /></a>
                    </article>
                    <span>Trip 1</span>
                </section>

                <div class="clear"></div>
            </section>
        </section> 
        <div class="clear"></div>
    </div>  
</section>