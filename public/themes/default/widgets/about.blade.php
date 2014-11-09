<h1>{{ $contact->address }}</h1>
<div class="company-eng">{{ $contact->name_1 }}</div>
<div class="company-address">
	<span>ที่อยู่ :</span>
    <span>{{ $contact->address }}</span>
    <span>Tel : {{ $contact->tel }}</span>
    <span>Fax : {{ $contact->fax }}</span>
</div>
<div class="contact-menu">
	<div class="contact-menu">
	<div><a href="{{ action('HomeController@contact') }}"><img src="{{ asset('themes/default/assets/images/contact-ico.jpg') }}" /></a></div>
    <div><a href="{{ action('HomeController@aboutus') }}"><img src="{{ asset('themes/default/assets/images/about-ico.jpg') }}" /></a></div>
    <div><a href="{{ action('HomeController@career') }}"><img src="{{ asset('themes/default/assets/images/career-ico.jpg') }}" /></a></div>
    <div><img src="{{ asset('themes/default/assets/images/hotline-ico.jpg') }}" /></div>
</div>
</div>