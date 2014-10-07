<section>
	<div class="ccol-left">
    	<div class="contact-top-img"><img src="{{ $about->image }}" /></div>
        <h3 class="mrb-0">ABOUT US</h3>
		<h2>AMED CLINIC CLUB</h2>
            <div class="job-caption">
            	{{ $about->description }}
        </div>
        
    </div>
    <div class="ccol-right">
    	<h1>{{ $contact->address }}</h1>
        <div class="company-eng">{{ $contact->name_1 }}</div>
        <div class="company-address">
        	<span>ที่อยู่ :</span>
            <span>{{ $contact->address }}</span>
            <span>Tel : {{ $contact->tel }}</span>
            <span>Fax : {{ $contact->fax }}</span>
        </div>
        <div class="contact-menu">
        	<div><a href="contactus.html"><img src="{{ asset('themes/default/assets/images/contact-ico.jpg') }}" /></a></div>
            <div class="active"><a href="aboutus.html"><img src="{{ asset('themes/default/assets/images/about-ico.jpg') }}" /></a></div>
            <div><a href="career.html"><img src="{{ asset('themes/default/assets/images/career-ico.jpg') }}" /></a></div>
            <div><img src="{{ asset('themes/default/assets/images/hotline-ico.jpg') }}" /></div>
        </div>
    </div>
</section>