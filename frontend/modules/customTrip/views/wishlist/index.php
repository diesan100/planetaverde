<section class="pageContent green">
    <div id='mycustomscroll' class='flexcroll'>
        <p class="profileHead"><i class="fa fa-star left mr10"></i><?=Yii::t("app", "Wishlist"); ?></p>
        <section class="rightpannel">        
                <?php if (Yii::$app->user->isGuest) { ?>
                    <div class="widhlistbox">
                        You must be logged in order to use the custom trip configurator.
                        Log in or sign up <a href="<?=  yii\helpers\Url::to(["/signup"]); ?> ">here</a>
                    </div>
                <?php } else { ?>
                    <?php
                    $list = array();
                    $list[] = "testssss";

                    if(isset($list) && sizeof($list) > 0) { ?>
                        <section class="maplisting">
                                <a class="left mr15" href="#"><img alt="" src="<?=Yii::getAlias("@web");?>/images/wishlistitem1.jpg"></a>
                            <section>
                                <p>Name</p>
                                <p>Short description</p>
                                <p class="tright mt30">Remove | Add to custom trip | Book</p>
                            </section>
                        </section>

                        <section class="maplisting">
                                <a class="left mr15" href="#"><img alt="" src="<?=Yii::getAlias("@web");?>/images/wishlistitem1.jpg"></a>
                            <section>
                                <p>Name</p>
                                <p>Short description</p>
                                <p class="tright mt30">Remove | Add to custom trip | Book</p>
                            </section>
                        </section>

                        <section class="maplisting">
                                <a class="left mr15" href="#"><img alt="" src="<?=Yii::getAlias("@web");?>/images/wishlistitem1.jpg"></a>
                            <section>
                                <p>Name</p>
                                <p>Short description</p>
                                <p class="tright mt30">Remove | Add to custom trip | Book</p>
                            </section>
                        </section>

                        <section class="maplisting">
                                <a class="left mr15" href="#"><img alt="" src="<?=Yii::getAlias("@web");?>/images/wishlistitem1.jpg"></a>
                            <section>
                                <p>Name</p>
                                <p>Short description</p>
                                <p class="tright mt30">Remove | Add to custom trip | Book</p>
                            </section>
                        </section>

                        <section class="maplisting">
                                <a class="left mr15" href="#"><img alt="" src="<?=Yii::getAlias("@web");?>/images/wishlistitem1.jpg"></a>
                            <section>
                                <p>Name</p>
                                <p>Short description</p>
                                <p class="tright mt30">Remove | Add to custom trip | Book</p>
                            </section>
                        </section>

                        <a class="smlsbtn right" href="<?=yii\helpers\Url::to(["/configurator"]);?> ">Configure custom trip</a>
                        <div class="clear10"></div>
                    <?php } else { ?>
                        <div class="widhlistbox">
                            <?=Yii::t("app", "Your wish list is empty."); ?>
                            Go to <a class="northpole" href="<?=  yii\helpers\Url::to(["/Destinations"]); ?>">Destinations</a> in order to add elements to the list.
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>        
        </section>   
    </div>
</section>

