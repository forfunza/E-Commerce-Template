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
                <li><a href="{{ action('HomeController@service') }}">Anti Aging</a></li>
                <li><a href="{{ action('HomeController@service') }}">Auto Smooth</a></li>
                <li><a href="{{ action('HomeController@service') }}">Botox</a></li>
                <li><a href="{{ action('HomeController@service') }}">V-Face</a></li>
                <li><a href="{{ action('HomeController@service') }}">Face Perfect</a></li>
                <li><a href="{{ action('HomeController@service') }}">Body Attraction</a></li>
                <li><a href="{{ action('HomeController@service') }}">Six Pack Fast Track</a></li>
                <li><a href="{{ action('HomeController@service') }}">Face Rejuvenate</a></li>
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