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
                <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<section>
    <h2><i class="tl"></i><span>Costumer review</span><i class="tr"></i></h2>
    <div class="product-block">
        <div id="owl-item" class="owl-item owl-carousel">
            <div class="item">
                <div class="share-icon">
                    <ul>
                        <li><a href="#"><i class="sfb-icon"></i></a></li>
                        <li><a href="#"><i class="stw-icon"></i></a></li>
                    </ul>
                </div>
                <div class="item-thumbnail"><img src="http://bisousbisousthailandblog.files.wordpress.com/2014/06/ig-e0b882e0b8a7e0b8b1e0b88d-dec2013.jpg?w=394" /></div>
                <h3>IG : ขวัญ DEC2013</h3>
                <div class="item-caption">
                    ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
                </div>
                <div class="clear"></div>
            </div>
            <div class="item">
                <div class="share-icon">
                    <ul>
                        <li><a href="#"><i class="sfb-icon"></i></a></li>
                        <li><a href="#"><i class="stw-icon"></i></a></li>
                    </ul>
                </div>
                <div class="item-thumbnail"><img src="http://bisousbisousthailandblog.files.wordpress.com/2014/06/ig-e0b882e0b8a7e0b8b1e0b88d-dec2013.jpg?w=394" /></div>
                <h3>IG : ขวัญ DEC2013</h3>
                <div class="item-caption">
                    ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
                </div>
                
            </div>
            <div class="item">
                <div class="share-icon">
                    <ul>
                        <li><a href="#"><i class="sfb-icon"></i></a></li>
                        <li><a href="#"><i class="stw-icon"></i></a></li>
                    </ul>
                </div>
                <div class="item-thumbnail"><img src="http://bisousbisousthailandblog.files.wordpress.com/2014/06/ig-e0b882e0b8a7e0b8b1e0b88d-dec2013.jpg?w=394" /></div>
                <h3>IG : ขวัญ DEC2013</h3>
                <div class="item-caption">
                    ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
                </div>
            </div>
            <div class="item">
                <div class="share-icon">
                    <ul>
                        <li><a href="#"><i class="sfb-icon"></i></a></li>
                        <li><a href="#"><i class="stw-icon"></i></a></li>
                    </ul>
                </div>
                <div class="item-thumbnail"><img src="http://bisousbisousthailandblog.files.wordpress.com/2014/06/ig-e0b882e0b8a7e0b8b1e0b88d-dec2013.jpg?w=394" /></div>
                <h3>IG : ขวัญ DEC2013</h3>
                <div class="item-caption">
                    ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ นี่เป็นเพียงผลจากการทำครั้งแรกนะคะ ถามว่าคุ้มไหมกับการต้องจ่ายแพงกว่า การทำเลเซอรแบบอื่น เราว่าค้มนะ เพราะแผลเว้กมาก สะเก็ดเล็กมากจริง ๆ
                </div>
            </div>
        </div>
    </div>
</section>
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
                <a href="#" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    @endif
</section>
@endforeach
@endif