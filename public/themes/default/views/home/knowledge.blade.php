<section>
    <h2><i class="tl"></i><span>Amed Knowledge</span><i class="tr"></i></h2>
    <div class="h-service">
        <ul>
        @if($knowledges)
            @foreach ($knowledges as $knowledge)
            <li><a href="{{ action('HomeController@knowledge_detail',$knowledge->id) }}">{{ $knowledge->name }} <span><img src="{{ $knowledge->image }}" /></span></a></li>
            @endforeach
        @endif
        </ul>
        <div class="clear"></div>
    </div>
	
</section>