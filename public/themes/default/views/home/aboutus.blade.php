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
    	{{ Theme::widget('WidgetAbout', array('contact' => $contact))->render(); }}
    </div>
</section>