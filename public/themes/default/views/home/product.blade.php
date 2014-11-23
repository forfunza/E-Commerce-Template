@if($bests)
<section>
    <h2><i class="tl"></i><span>Best seller</span><i class="tr"></i></h2>
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
                <a href="{{ action('HomeController@product_detail',$product->id) }}" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if($customer_review)
<section>
    <h2><i class="tl"></i><span>Custumer review</span><i class="tr"></i></h2>
    <div class="product-block">
        <div id="owl-item" class="owl-item owl-carousel">
        @foreach ($customer_review as $review)
            <div class="item">
               
                <div class="item-thumnail">
                        <a href="{{ $review->image }}" class="group1"><img src="{{ $review->image }}"></a>
                        </div>
                <h3>{{ $review->name }}</h3>
                <div class="item-caption">
                    {{ $review->caption }}
                </div>
                <div class="clear"></div>
            </div>
        @endforeach
            
        </div>
    </div>
</section>
@endif
@if($categories)
@foreach ($categories as $category)
<section>
    <h2><i class="tl"></i><span>{{ $category->name }}</span><i class="tr"></i></h2>
    @if($category->products)
    <div class="product-block">
        <div id="owl-item" class="owl-item owl-carousel">
            @foreach ($category->products as $product)
            <div class="item">
                <a href="{{ action('HomeController@product_detail', $product->id) }}">
                    <div class="item-thumbnail"><img src="{{ $product->image }}" /></div>
                    <h3>{{ $product->name }}</h3>
                    <div class="item-caption">
                        {{ $product->description }}
                    </div>
                </a>
                <div class="clear"></div>
                <a href="{{ action('HomeController@product_detail',$product->id) }}" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    @endif
</section>
@endforeach
@endif