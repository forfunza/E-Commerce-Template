<div class="main-menu">
        <div class="menu-button">Menu</div>
        <nav>
            <ul data-breakpoint="800" class="flexnav">
                <li><a href="{{ action('HomeController@index') }}">Home</a></li>
                <li><a href="#">About Us</a>
                <ul>
                    <li><a href="{{ action('HomeController@aboutus') }}">About Amed</a></li>
                    <li><a href="{{ action('HomeController@knowledge') }}">Knowledge</a></li>
                    <li><a href="{{ action('HomeController@celebrity') }}">Celebrity</a></li>
                    <li><a href="{{ action('HomeController@review') }}">Video &amp; Reviews</a></li>
                    <li><a href="{{ action('HomeController@consult') }}">Consult Doctor</a></li>
                </ul>
            </li>
            <li><a href="#">Services</a>
            <ul>
                <li><a href="{{ action('HomeController@service') }}">All Services</a></li>
                @if($categories)
                @foreach ($categories as $category)
                <li><a href="{{ action('HomeController@service_categories',$category->id) }}">{{ $category->name }}</a></li>
                @endforeach
                @endif
            </ul>
        </li>
        <li><a href="{{ action('HomeController@product') }}">Products</a></li>
        <li><a href="{{ action('HomeController@promotion') }}">Promotion</a></li>
        <li><a href="{{ action('HomeController@before') }}">Before &amp; After</a></li>
        <li><a href="{{ action('HomeController@bather') }}">Co-Barter</a></li>
        <li><a href="{{ action('HomeController@news') }}">News &amp; Event</a></li>
        <li><a href="{{ action('HomeController@contact') }}">Contacts</a></li>
    </ul>
</nav>
</div>