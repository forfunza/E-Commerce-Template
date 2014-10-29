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
        @if($services)
        <div class="all-service">
            <ul>
                @foreach ($services as $tmp)
                <li class="{{ Request::segment(2) == $tmp->id ? 'active' : '' }}"><a href="detail-service.html" >{{ str_limit($tmp->name, $limit = 15, $end = '') }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
        @if($bests)
        <div class="top-product">
            <h3>3 อันดับสินค้าขายดี</h3>
            <ul>
                @foreach ($bests as $best)
                <li>
                    <div class="item-thumbnail"><img src="{{ $best->image }}"></div>
                    <div class="prod-name">{{ $best->name }}</div>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</section>