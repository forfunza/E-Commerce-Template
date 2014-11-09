<footer>
	<div class="container">
		<div class="ft-rigt">
			<span>CALL CENTER : +6684 680 8666 | EMAIL : <a href="#">contact@amedclinic.com</a></span>
			<span><i class="copyright">&copy;</i> Copyright 2014 AMED Clinic. All Right Reservied.</span>
		</div>
		<div class="ft-left">
			<span><a href="#">Contact us</a> | <a href="#">About Us</a> | <a href="#">Privacy policy</a> | <a href="#">Career</a></span>
			<ul>
				<li><a href="{{ $website->facebook }}" class="fb-icon">Amed Facebook</a></li>
				<li><a href="{{ $website->instagram }}" class="ins-icon">Amed Instragram</a></li>
				<li><a href="{{ $website->socialcam }}" class="socialcam-icon">Amed Socialcam</a></li>
				<li><a href="{{ $website->youtube }}" class="yt-icon">Amed Youtube</a></li>
				<li><a href="{{ action('HomeController@line') }}" class="line-icon">Amed Line</a></li>
			</ul>
		</div>
	</div>
</footer>