<header>
    <div class="top-header">
        <div class="container">
            <div class="cart-area">
                @if(isset($users))
                 <a href="{{ action('HomeController@logout') }}" style="cursor:pointer">{{ $users->email }} / logout</a>
                @else
                 <a href="{{ action('HomeController@login') }}">Login / Register</a>
                @endif
               
                <a href="{{ action('HomeController@cart') }}" class="cart-link">ตระกร้าสินค้า (<span id="cart-qty">{{ Cart::count(false) }}</span>) <i class="cart-icon"></i></a>
            </div>
            <span class="call-top">Call Center : {{ $website->callcenter }}</span>
            <ul>
                <li><a href="{{ $website->facebook }}" class="fb-icon">Amed Facebook</a></li>
                <li><a href="{{ $website->instagram }}" class="ins-icon">Amed Instragram</a></li>
                <li><a href="{{ $website->socialcam }}" class="socialcam-icon">Amed Socialcam</a></li>
                <li><a href="{{ $website->youtube }}" class="yt-icon">Amed Youtube</a></li>
                <li><a href="{{ action('HomeController@line') }}" class="line-icon">Amed Line</a></li>
            </ul>
        </div>
    </div>
    <div class="header-area"><div class="slider-header center"><img src="{{ $website->image }}" /></div></div>
</header>