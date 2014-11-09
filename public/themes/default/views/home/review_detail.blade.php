<section>
        	<h2><i class="tl"></i><span>Video &amp; Reviews</span><i class="tr"></i></h2>
            <div class="product-detail-block">
            	<div class="prod-left">
                	<iframe width="100%" height="350" src="{{ $review->youtube }}" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="prod-right">
                	<div class="product-name"><h1>{{ $review->name }}</h1></div>
                    <div class="product-detail">
                        {{ $review->description }}
                    </div>
                	<div class="colLeft">Link</div>
                    <div class="colRight"><a href="{{ $review->url }}">Link</a></div>
                    <div class="colLeft">เบอร์โทร</div>
                    <div class="colRight">{{ $review->tel }}</div>
                    <div class="colLeft"><img src="{{ asset('themes/default/assets/images/fb-i.jpg') }}" /> Facebook</div>
                    <div class="colRight">{{ $review->facebook }}</div>
                    <div class="colLeft"><img src="{{ asset('themes/default/assets/images/ig-i.jpg') }}" /> Instagram</div>
                    <div class="colRight">{{ $review->instagram }}</div>
                    <div class="colLeft"><img src="{{ asset('themes/default/assets/images/line-i.jpg') }}" /> Line</div>
                    <div class="colRight"> {{ $review->line }}</div>
                    <div class="colLeft">Website</div>
                    <div class="colRight"><a href="#">{{ $review->website }}</a></div>
                    <div class="clear"></div>
                </div>
            </div>
           <div class="clear"></div>
           <div style="height:30px;"></div>
        </section>
        

        @if($reviews)
        <section>
            <h2><i class="tl"></i><span>วีดีโอ อื่น ๆ ที่เกี่ยวข้อง</span><i class="tr"></i></h2>
            <div class="product-block">
            	<div id="owl-item" class="owl-item owl-carousel">
                @foreach ($reviews as $tmp)
                 
                <div class="item">
                	<a href="{{ action('HomeController@review_detail',$tmp->id) }}">
                	<div class="item-thumbnail"><img src="{{ $tmp->image }}" /></div>
                    <h3>{{ $tmp->name }}</h3>
                    <div class="item-caption">
                    	{{ str_limit($tmp->description, $limit = 70, $end = '') }}
                    </div>
                    <div class="clear"></div>
                    </a>
                </div>
                @endforeach
              </div>
             
            </div>
            
        </section>
        @endif
