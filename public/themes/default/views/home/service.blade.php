@if($categories)
@foreach ($categories as $category)
<section>
	<h2><i class="tl"></i><span>{{ $category->name }}</span><i class="tr"></i></h2>
    <div class="service-list-area">

      @if($category->services)
      @foreach ($category->services as $service)

    	<a href="{{ action('HomeController@service_detail',$service->id) }}" class="pro-item">
          <div class="pro-item-left">
               <div class="pro-item-thumnail"><div class="nailthumb-container"><img src="{{ $service->image }}"></div></div>
           </div>
               <div class="pro-item-right">
                   <h3>{{ $service->name }}</h3>
                   <div class="pro-item-caption">{{ $service->highlight }}</div>
            </div>
        </a>
      @endforeach
      @endif
          
        <div class="clear"></div>
   	</div>
</section>
@endforeach
@endif