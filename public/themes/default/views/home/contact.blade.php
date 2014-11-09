<section>
	<div class="ccol-left">
    	<div class="contact-top-img"><img src="{{ asset('themes/default/assets/images/contact-img.jpg') }}" /></div>

        @if($branches)
        @foreach ($branches as $branch)
        <div class="loaction-block">
        	<div class="map-right"><a href="{{ action('HomeController@branch',$branch->id) }}"><img src="{{ $branch->image }}"></a></div>
            <h3>{{ $branch->name }}</h3>
            <div class="local-caption">
            	{{ $branch->description }}
                <span class="click-right"><a href="{{ action('HomeController@branch',$branch->id) }}">► คลิ๊กเพื่อดูรายละเอียด</a></span>
            </div>
            <div class="clear"></div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="ccol-right">
    	{{ Theme::widget('WidgetAbout', array('contact' => $contact))->render(); }}
    </div>
</section>