<section>
    <div class="product-name"><h1>{{ $product->name }}</h1></div>
    <div class="product-detail">
        {{ $product->description }}
    </div>
    <div class="product-detail-block">
        <div class="prod-left">
            <div class="fotorama" data-nav="thumbs" data-thumbheight="68" data-allowfullscreen="true">
                <a href="{{ asset('themes/default/assets/images/product/NEO_WH_PR_PI_1-3.jpg') }}"><img src="{{ asset('themes/default/assets/images/product/NEO_WH_PR_PI_1-3.jpg') }}" /></a>
                <a href="{{ asset('themes/default/assets/images/product/NEO_BM_OV_PI_1.jpg') }}"><img src="{{ asset('themes/default/assets/images/product/NEO_BM_OV_PI_1.jpg') }}" /></a>
                <a href="{{ asset('themes/default/assets/images/product/NEO_MA_PI_1.jpg') }}"><img src="{{ asset('themes/default/assets/images/product/NEO_MA_PI_1.jpg') }}" /></a>
            </div>
        </div>
        <div class="prod-right">
            <div class="colLeft">รหัสสินค้า</div>
            <div class="colRight">{{ $product->code }}</div>
            <div class="colLeft">หมวดหมู่สินค้า</div>
            <div class="colRight">{{ $product->category->name }}</div>
            <div class="colLeft">สถานะสินค้า</div>
            <div class="colRight">พร้อมส่ง</div>
            <div class="colLeft">จำนวน</div>
            <div class="colRight"><input id="spinner" name="value" value="1"></div>
            <div class="clear"></div>
            <div class="dot-line"></div>
            <div class="colLeft rate-pay"><span class="rate-txt">ราคาสินค้า</span> <br/><span class="num-rate">2,400</span> <span class="red-txt">บาท</span></div>
            <div class="colRight rate-pay"><a href="#" class="addcart-b-btn">หยิบใส่ตระกร้า</a></div>
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