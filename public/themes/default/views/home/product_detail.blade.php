<section>
    <div class="product-name"><h1>{{ $product->name }}</h1></div>
    <div class="product-detail">
        {{ $product->description }}
    </div>
    <div class="product-detail-block">
        <div class="prod-left">
            <div class="fotorama" data-nav="thumbs" data-thumbheight="68" data-allowfullscreen="true">
                
                @if(count($images))
                    @foreach ($images as $image) {
                        <a href="{{ $image->images }}"><img src="{{ $image->images }}" /></a>
                    @endforeach
                @elseif($product->image)
                    <a href="{{ $product->image }}"><img src="{{ $product->image }}" /></a>
                @else 
                    <a href="http://placehold.it/432x360&text=Image"><img src="http://placehold.it/432x360&text=Image" /></a>
                @endif
            </div>
        </div>
        <div class="prod-right">
            <div class="colLeft">รหัสสินค้า</div>
            <div class="colRight">{{ $product->code }}</div>
            <div class="colLeft">หมวดหมู่สินค้า</div>
            <div class="colRight">{{ $product->category->name }}</div>
            <div class="colLeft">สถานะสินค้า</div>
            <div class="colRight">
                @if($product->stock == 1)
                    พร้อมส่ง
                @elseif($product->stock ==2)
                    พรีออเดอร์
                @else
                    หมดชั่วคราว
                @endif
            </div>
            <div class="colLeft">จำนวน</div>
            <div class="colRight"><input id="spinner" name="value" value="1"></div>
            <div class="clear"></div>
            <div class="dot-line"></div>
            <div class="colLeft rate-pay"><span class="rate-txt">ราคาสินค้า</span> <br/><span class="num-rate">2,400</span> <span class="red-txt">บาท</span></div>
            <div class="colRight rate-pay"><a href="#" id="addcart" class="addcart-b-btn">หยิบใส่ตระกร้า</a><input type="hidden" id="product_id" name="product_id" value="{{ $id }}" /></div>
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
@if($bests)
<section>
    <h2><i class="tl"></i><span>Hot Products</span><i class="tr"></i></h2>
    <div class="product-block">
        <div id="owl-item" class="owl-item owl-carousel">
            @foreach ($bests as $product)
            <div class="item">
                <a href="{{ action('HomeController@product_detail',$product->id) }}">
                    <div class="item-thumbnail"><img src="{{ $product->image }}" /></div>
                    <h3>{{ $product->name }}</h3>
                    <div class="item-caption">
                        {{ $product->highlight }}
                    </div>
                </a>
                <div class="clear"></div>
                <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif