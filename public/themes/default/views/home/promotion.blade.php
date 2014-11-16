<section>
    <h2><i class="tl"></i><span>Hot Promotion</span><i class="tr"></i></h2>
    @if($promotions)
    <div class="cocol-left">
        @foreach ($promotions as $promotion)
        <div class="in-promotion-block">
            <div class="promotion-thumbnail"><img src="{{ $promotion->image }}" /></div>
            <div class="pro-detail">
                <h3>{{ $promotion->name }}</h3>
                
                <div class="pro-caption">
                    {{ $promotion->description }}
                </div>
            </div>
            <div class="pro-time-price">
                <div class="pro-price">ราคา <span>{{  number_format($promotion->price) }}</span></div>
                <div class="pro-btn-area">
                    <a href="{{ action('HomeController@promotion_order',$promotion->id ) }}" class="pro-btn">สั่งซื้อ</a> <i class="user-pay-i"></i> <span class="num-user-pay">372</span> ซื้อแล้ว
                </div>
                <div class="pro-count-time">
                    <img src="{{ asset('themes/default/assets/images/pro-time.png') }}" /> เวลาที่เหลือ <span data-countdown="{{ $promotion->expire }}" class="timecount">00:00:00</span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        @endforeach
    </div>
    @endif
    <div class="cocol-right">
       {{ Theme::widget('WidgetServices', array('services' => $services))->render(); }}
    </div>
    <div class="clear"></div>
</section>
<script type="text/javascript">
  $('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
     $this.html(event.strftime('%D วัน %H:%M:%S'));
     
  });
});
</script>
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
                <a href="{{ action('HomeController@product_detail',$product->id) }}" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif