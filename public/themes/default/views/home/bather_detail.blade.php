<section>
	<div class="product-name"><h1>{{ $bather->name }}</h1></div>
    <div class="product-detail">
    	{{  $bather->description }}
    </div>
    <div class="product-detail-block">
    	<div class="prod-left">
        	<div class="fotorama" data-nav="thumbs" data-thumbheight="68" data-allowfullscreen="true">
                @if($images)
                    @foreach ($images as $image) {
                        <a href="{{ $image->images }}"><img src="{{ $image->images }}"></a>
                    @endforeach
            	
                @else 
                <a href="{{ $bather->image }}"><img src="{{ $bather->image }}"></a>
                @endif
            </div>
        </div>
        <div class="prod-right">
        	<div class="colLeft">ร้านที่ร่วมรายการ</div>
            <div class="colRight">{{ $bather->dealer }}</div>
            <div class="colLeft">วันหมดอายุ</div>
            <div class="colRight">{{ $bather->expire }}</div>
            <div class="colLeft">ราคาของโปรโมชั่นของดีลเลอร์</div>
            <div class="colRight">{{ $bather->dealer_price }}</div>
            <div class="colLeft">ราคาของที่ได้จาก Amed Clinic</div>
            <div class="colRight"><span class="num-rate">{{ $bather->amed_price }}</span><span class="red-txt">บาท</span></div>
            <div class="clear"></div>
            <div class="dot-line"></div>

          
            <div class="share-product-area">
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                <span class='st_pinterest_hcount' displayText='Pinterest'></span>
            </div>
        </div>
    </div>
   <div class="clear"></div>
</section>

<!-- <section>
    <h2><i class="tl"></i><span>Poppular Deal</span><i class="tr"></i></h2>
    <div class="product-block">
    	<div id="owl-item" class="owl-item owl-carousel">
        <div class="item">
        	<div class="item-thumbnail"><img src="images/item/co-1.jpg" /></div>
            <h3>blemish soothing one week program</h3>
            <div class="item-caption">
            	ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
        	<a href="#" class="detail-btn">ดูรายละเอียด</a>
            <div class="clear"></div>
        </div>
        <div class="item">
        	<div class="item-thumbnail"><img src="images/item/co-1.jpg" /></div>
            <h3>Matrix renew stem serum</h3>
            <div class="item-caption">
            	ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
        	<a href="#" class="detail-btn">ดูรายละเอียด</a>
            <div class="clear"></div>
        </div>
        <div class="item">

        	<div class="item-thumbnail"><img src="images/item/co-1.jpg" /></div>
            <h3>blemish soothing one week program</h3>
            <div class="item-caption">
            	ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
        	<a href="#" class="detail-btn">ดูรายละเอียด</a>
            <div class="clear"></div>
        </div>
		 <div class="item">
   
        	<div class="item-thumbnail"><img src="images/item/co-1.jpg" /></div>
            <h3>Matrix renew stem serum</h3>
            <div class="item-caption">
            	ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
        	<a href="#" class="detail-btn">ดูรายละเอียด</a>
            <div class="clear"></div>
        </div>
      </div>
     
    </div>
   	
    
</section> -->