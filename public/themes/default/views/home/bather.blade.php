<section>
    <h2><i class="tl"></i><span>Co-bather</span><i class="tr"></i></h2>
    <div class="cocol-left">
        @if($bathers)
            @foreach ($bathers as $bather)
                <div class="co-block">
                    <a href="{{ action('HomeController@bather_detail',$bather->id) }}">
                        <img src="{{ $bather->image }}" />
                        <div class="co-tel">{{ $bather->tel }}</div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
    <div class="cocol-right">
        {{ Theme::widget('WidgetServices', array('services' => $services))->render(); }}
    </div>
    
</section>