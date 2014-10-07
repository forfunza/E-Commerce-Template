<div class="camera_wrap" id="camera_wrap">
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-1.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-2.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-3.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-4.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-5.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-6.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-7.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-8.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-9.jpg') }}"></div>
    <div data-src="{{ asset('themes/default/assets/images/slider/slider-10.jpg') }}"></div>
</div>
@if($review)
<section>
<h2><i class="tl"></i><span>Review</span><i class="tr"></i></h2>
<div class="h-review-vdo">
    <iframe width="100%" height="200" src="{{ $review->youtube }}" frameborder="0" allowfullscreen></iframe>
</div>
<div class="h-review-block">
    <div class="review-thumb"></div>
    <div class="review-toppic">{{ $review->name }}</div>
    <div class="review-detail">
    <p>
        {{ $review->description }}
     </p>   
    </div>
</div>
<div class="clear"></div>
</section>
@endif
<section>
<h2><i class="tl"></i><span>Hot Service</span><i class="tr"></i></h2>
<div class="h-service">
    @if($category_services)
    @foreach ($category_services as $key => $category) 
    <ul>
        <li><a href="#">{{ $category->name }} <span><img src="{{ $category->image ? $category->image : 'http://placehold.it/187x140&text=Image' }}" /></span></a></li>
        
    </ul>
    @endforeach
    @endif
    <div class="clear"></div>
</div>
</section>
<section>
<h2><i class="tl"></i><span>Promotion</span><i class="tr"></i></h2>
<div class="promotion-block">
    <div id="v-nav">
        <div class="amed-logo"><img src="{{ asset('themes/default/assets/images/amed-logo.png') }}" /></div>
        <ul>
            <li tab="tab1" class="current">Promotion</li>
            <li tab="tab2">Before &amp; After</li>
            <li tab="tab3">Celebrity</li>
            <li tab="tab4">News &amp; Events</li>
            <li tab="tab5">Video & Reviews</li>
            <li tab="tab6" class="last">Consult Doctor</li>
        </ul>
        <div class="tab-content" style="display:block;">
            <div class="promotion-content">
                @if($promotions)
                @foreach ($promotions as $promotion) 
                <div class="pro-item">
                    <div class="pro-item-left">
                        <div class="pro-item-thumnail"><img src="{{ $promotion->image }}" /></div>
                        <a href="#">สั่งซื้อโปรฯ นี้</a>
                    </div>
                    <div class="pro-item-right">
                        <h3>{{ $promotion->name }}</h3>
                        <div class="pro-item-caption">{{ str_limit($promotion->description, $limit = 100, $end = '') }}</div>
                        <div class="exp-date"> expire : {{ date('d M Y',strtotime($promotion->expire)) }}</div>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>
        <div class="tab-content">
            <h4>Before &amp; After</h4>
        </div>
        <div class="tab-content">
            <h4>Celebrity</h4>
        </div>
        <div class="tab-content">
            <h4>News &amp; Events</h4>
        </div>
        <div class="tab-content">
            <h4>Video &amp; Reviews</h4>
        </div>
        <div class="tab-content">
            <h4>Consult Doctor</h4>
        </div>
    </div>
</div>
</section>
<section>
<h2><i class="tl"></i><span>Products</span><i class="tr"></i></h2>
<div class="hp-left">
    <div class="toppic">ขายดีที่สุดในเกาหลี</div>
    <div class="customNavigation">
        <a class="btn prev">Previous</a>
        <a class="btn next">Next</a>
    </div>
    <div id="owl-item" class="owl-carousel">
        <div class="item">
            <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-1.jpg') }}" /></div>
            <h3>blemish soothing one week program</h3>
            <div class="item-caption">
                ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
            <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
            <div class="clear"></div>
        </div>
        <div class="item">
            <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-2.jpg') }}" /></div>
            <h3>Matrix renew stem serum</h3>
            <div class="item-caption">
                ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
            <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
            <div class="clear"></div>
        </div>
        <div class="item">
            <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-3.jpg') }}" /></div>
            <h3>blemish soothing one week program</h3>
            <div class="item-caption">
                ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
            <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
            <div class="clear"></div>
        </div>
        <div class="item">
            <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-2.jpg') }}" /></div>
            <h3>Matrix renew stem serum</h3>
            <div class="item-caption">
                ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
            </div>
            <div class="clear"></div>
            <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="hp-right">
    <a href="#">
        <div class="thumbnail"><img src="{{ asset('themes/default/assets/images/simple-1.jpg') }}" /></div>
        <div class="hn">
            <div class="toppic">แพทย์แฉ!! เรื่องจริง</div>
            <p>ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ เพียงแค่วันที่ 3 ก็หลุดแล้ว เลเซอร์แบบอื่นใช้เวลาเป็นสัปดาห์กว่าจะหลุด...ผิวหน้าบแบซ้ำน้อยกว่าค่ะ </p>
        </div>
    </a>
</div>
<div class="clear"></div>
</section>