<div class="camera_wrap" id="camera_wrap">
    @if($slideshows)
    @foreach($slideshows as $slide)
    <div data-link="{{ $slide->link }}" data-target="_blank" data-src="{{ $slide->image }}"></div>
    @endforeach
    @endif
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
            <li><a href="{{ action('HomeController@service_categories',$category->id) }}">{{ $category->name }} <span><img style="width:187px; height:140px" src="{{ $category->image ? $category->image : 'http://placehold.it/187x140&text=Image' }}" /></span></a></li>
            
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
                            <a href="{{ action('HomeController@promotion') }}"><div class="pro-item-thumnail"><img src="{{ $promotion->image }}" /></div></a>
                            <a href="{{ action('HomeController@promotion') }}">สั่งซื้อโปรฯ นี้</a>
                        </div>
                        <div class="pro-item-right">
                            <a href="{{ action('HomeController@promotion') }}">
                                <h3>{{ $promotion->name }}</h3>
                                <div class="pro-item-caption">{{ str_limit($promotion->description, $limit = 100, $end = '') }}</div>
                                <div class="exp-date"> expire : {{ date('d M Y',strtotime($promotion->expire)) }}</div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
            <div class="tab-content">
                <div class="promotion-content">
                    @if($befores)
                    @foreach ($befores as $before)
                    <div class="pro-item">
                        <a href="{{ action('HomeController@before') }}">
                            <div class="pro-item-left">
                                <div class="pro-item-thumnail"><img src="{{ $before->image }}" /></div>
                            </div>
                            <div class="pro-item-right">
                                <h3>{{ $before->name }}</h3>
                                <div class="pro-item-caption">{{ str_limit($before->description, $limit = 100, $end = '') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
            <div class="tab-content">
                <div class="promotion-content">
                    
                    @if($celebs)
                    @foreach ($celebs as $celeb)
                    <div class="pro-item celebimg">
                        
                        <a href="{{ $celeb->image }}" class="group1"><img src="{{ $celeb->image }}"></a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-content">
                <div class="promotion-content">
                    @if($news)
                    @foreach ($news as $tmp)
                    <div class="pro-item">
                        <a href="{{ action('HomeController@news') }}">
                            <div class="pro-item-left">
                                <div class="pro-item-thumnail"><img src="{{ $tmp->image }}" /></div>
                            </div>
                            <div class="pro-item-right">
                                <h3>{{ $tmp->name }}</h3>
                                <div class="pro-item-caption">{{ str_limit($tmp->description, $limit = 100, $end = '') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
            <div class="tab-content">
                <div class="promotion-content">
                    @if($reviews)
                    @foreach ($reviews as $review)
                    <div class="pro-item">
                        <a href="{{ action('HomeController@review_detail',$review->id) }}">
                            <div class="pro-item-left">
                                <div class="pro-item-thumnail"><img src="{{ $review->image }}" /></div>
                            </div>
                            <div class="pro-item-right">
                                <h3>{{ $review->name }}</h3>
                                <div class="pro-item-caption">{{ str_limit($review->description, $limit = 100, $end = '') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
            <div class="tab-content">
                <div class="promotion-content">
                    @if($consults)
                    @foreach ($consults as $consult)
                    <div class="pro-item">
                        <a href="{{ action('HomeController@consult_detail',$consult->id) }}">
                            <div class="pro-item-left">
                                <div class="pro-item-thumnail"><img src="{{ $consult->image }}" /></div>
                            </div>
                            <div class="pro-item-right">
                                <h3>{{ $consult->name }}</h3>
                                <div class="pro-item-caption">{{ str_limit($consult->description, $limit = 100, $end = '') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
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
            @if($bests)
            @foreach ($bests as $best)
            <div class="item">
                <div class="item-thumbnail"><img src="{{ $best->image }}" /></div>
                <h3>{{ $best->name }}</h3>
                <div class="item-caption">
                    {{ $best->highlight }}
                </div>
                <div class="clear"></div>
                <a href="{{ action('HomeController@product_detail',$best->id) }}" class="cart-btn">หยิบใส่ตระกร้า</a>
                <div class="clear"></div>
            </div>
            @endforeach
            
            @endif
        </div>
    </div>
    @if($nnews)
    <div class="hp-right">
        <a href="{{ action('HomeController@news') }}">
            <div class="thumbnail"><img src="{{ $nnews->image }}" /></div>
            <div class="hn">
                <div class="toppic">{{ $nnews->name }}</div>
                <p>{{ str_limit($nnews->description, $limit = 100, $end = '') }} </p>
            </div>
        </a>
    </div>
    @endif
    <div class="clear"></div>
</section>