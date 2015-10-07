<section class="pageContent green">
	<div id='mycustomscroll' class='flexcroll'>
		<p class="profileHead"></i><?=Yii::t("trips","Custom trip");?></p>
    	<section class="rightpannel">
    
            <p class="whiteshow"><?=Yii::t("trips","In order to configure the trip we need you to");?><br/>
                                <?=Yii::t("trips","fill up the next data</p>");?>

		<section class="boxoz"><input type="text" value="" placeholder="_contact name" onfocus="this.placeholder = ''" onblur="this.placeholder = '_contact name'" /><span class="stario">*</span></section>
        <section class="boxoz"><input type="text" value="" placeholder="_mail" onfocus="this.placeholder = ''" onblur="this.placeholder = '_mail'" /><span class="stario">*</span></section>
        
        <section class="editHeado"><p class="po1 left">_trip name</p><span class="pl15">[ Save ]</span></section>
        
        <section class="left greeno">
           
            <select name="event1" class="left event1" tabindex="1">
                <option value="">Picture location</option>
                <option value="4">Small</option>
                <option value="10">Medium</option>
                <option value="10">Large</option>
                <option value="10">X-Large</option>
                <option value="10">2X-Large</option>
            </select>
                
        </section>
        
        <section class="left ml15">
        	<span>Airport Transfer</span>
            <span class="pl15"><input type="checkbox" /> Si</span>
            <span class="pl15"><input type="checkbox" /> No</span>
            <span class="pl15">Start date<a class="pl15" href="#"><img src="images/calenderIcon.jpg" alt="" /></a></span>
        
        </section>
        <div class="clear10"></div>
        <section class="maplisting"></section>
        
        <section class="maplisting">
        	<a class="left mr15" href="#"><img alt="" src="images/wishlistitem1.jpg"></a>
            <section class="complex">
                <p>Group trip 1</p>
                <p>Short description</p>
                <p class="left"><span class="left mr10">Num. People</span><input type="text" value="" placeholder="__" onfocus="this.placeholder = ''" onblur="this.placeholder = '__'" class="minions left mr30" /><span class="left mr10">Num. Rooms</span><input type="text" value="" placeholder="__" onfocus="this.placeholder = ''" onblur="this.placeholder = '__'" class="minions left mr30" /><span class="left mr10">Num. cars</span><input type="text" value="" placeholder="__" onfocus="this.placeholder = ''" onblur="this.placeholder = '__'" class="minions left mr30" /></p>
                
                <section class="left greeno mr15">
                    <select name="event1" class="left event1" tabindex="1">
                        <option value="">Picture location</option>
                        <option value="4">Small</option>
                        <option value="10">Medium</option>
                        <option value="10">Large</option>
                        <option value="10">X-Large</option>
                        <option value="10">2X-Large</option>
                    </select>
                </section>
                
                <section class="left greeno">
                    <select name="event1" class="left event1" tabindex="1">
                        <option value="">Picture location</option>
                        <option value="4">Small</option>
                        <option value="10">Medium</option>
                        <option value="10">Large</option>
                        <option value="10">X-Large</option>
                        <option value="10">2X-Large</option>
                    </select>
                </section>
              
                <p class="clear"></p>
                <p class=""><span>Airport Transfer</span> <span class="pl15"><input type="checkbox" /> Si</span> <span class="pl15"><input type="checkbox" /> No</span></p>
                <p class="right">Delete | Save</p>
            </section>
            <div class="clear"></div>
        </section>
        
        <section class="maplisting">
        	<a class="left mr15" href="#"><img alt="" src="images/wishlistitem1.jpg"></a>
            <section class="complex">
                <p>Group trip 1</p>
                 <p>Short description</p>
                <p class="left"><span class="left mr10">Num. People</span><input type="text" value="" placeholder="__" onfocus="this.placeholder = ''" onblur="this.placeholder = '__'" class="minions left mr30" /><span class="left mr10">Num. Rooms</span><input type="text" value="" placeholder="__" onfocus="this.placeholder = ''" onblur="this.placeholder = '__'" class="minions left mr30" /><span class="left mr10">Num. cars</span><input type="text" value="" placeholder="__" onfocus="this.placeholder = ''" onblur="this.placeholder = '__'" class="minions left mr30" /></p>
               
               <section class="left greeno mr15">
                   <select name="event1" class="left event1" tabindex="1">
                        <option value="">Picture location</option>
                        <option value="4">Small</option>
                        <option value="10">Medium</option>
                        <option value="10">Large</option>
                        <option value="10">X-Large</option>
                        <option value="10">2X-Large</option>
                    </select>
                </section>
                
                <section class="left greeno">
                   <select name="event1" class="left event1" tabindex="1">
                        <option value="">Picture location</option>
                        <option value="4">Small</option>
                        <option value="10">Medium</option>
                        <option value="10">Large</option>
                        <option value="10">X-Large</option>
                        <option value="10">2X-Large</option>
                    </select>
                </section>
               
                <p class="clear"></p>
                <p class=""><span>Airport Transfer</span> <span class="pl15"><input type="checkbox" /> Si</span> <span class="pl15"><input type="checkbox" /> No</span></p>
                <p class="right">Delete | Save</p>
            </section>
            <div class="clear"></div>
        </section>
        
        <section class="maplisting" style="border:none;">
            <section>
                <p class="left">Comments</p>
                <textarea class="comenthere"></textarea>
                <div class="clear20"></div>
                <button class="smlsbtn right">Request budget</button>
                <a class="right add mr20" href="<?= yii\helpers\Url::to(["/configurator/addExtension"]);?> ">+ Add extension</a>
            </section>
            <div class="clear"></div>
        </section>
        
    </section>   
    </div>
</section>
