<section>
    <h2><i class="tl"></i><span>Video &amp; Reviews</span><i class="tr"></i></h2>
    @if($reviews)
    <div class="h-service">
        <ul>
            @foreach ($reviews as $review)
            <li>
            	<a href="{{ action('HomeController@review_detail',$review->id) }}">{{ $review->name }}<span><img src="{{ asset('themes/default/assets/images/play-i.png') }}" class="play-icon"><img src="{{ $review->image }}" /></span> 
                <div class="video-caption">
                	{{ $review->highlight }}
                </div>
                </a>
            </li>
            @endforeach
            
        </ul>
        <div class="clear"></div>
        
        <div class="page-number">
        	{{ $reviews->links(); }} 
        </div>
        <div class="clear"></div>
    </div>
	@endif
</section>