<section>
	<h2><i class="tl"></i><span>Consult Doctor</span><i class="tr"></i></h2>
    @if($consults)
    <div class="product-block">
    	<div id="owl-item" class="owl-item owl-carousel">
        @foreach ($consults as $consult)
        <div class="item">
        	<a href="{{ action('HomeController@consult_detail',$consult->id) }}">
                <div class="item-thumbnail"><img src="{{ $consult->image }}" /></div>
                <h3>{{ $consult->name }}</h3>
                <div class="item-caption">
                    {{ $consult->highlight }}
                </div>
            </a>
          
            <div class="clear"></div>
        </div>
        @endforeach
       
      </div>
     
    </div>
   	@endif
    
</section>