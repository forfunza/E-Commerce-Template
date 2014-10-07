<section>
    <h2><i class="tl"></i><span>Amed Knowledge</span><i class="tr"></i></h2>
    <div class="cocol-left">
        <div class="service-area">
            <h1 class="knowlagetoppic"> {{ $knowledge->name }}</h1>
            <div class="contact-top-img"><img src="{{ $knowledge->image }}"></div>
            <h3>{{ $knowledge->name }}</h3>
            <div class="service-caption">
                {{ $knowledge->description }}
            </div>
            
        </div>
        
        
    </div>
    <div class="cocol-right">
        @if($service_category)
        <div class="all-service">
            <ul>
                @foreach ($service_category as $category)
                <li><a href="inn-knowledge.html" >{{ $category->name }}</a></li>
                @endforeach
                
            </ul>
        </div>
        @endif
    </div>
</section>