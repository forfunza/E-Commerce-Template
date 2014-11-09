<div class="tf-1">
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAmed-Clinic-Official%2F285040311702681&amp;width=265&amp;height=278&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=278811578958877" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:265px; height:278px;" allowTransparency="true"></iframe>
</div>
<div class="tf-2">
	<h3>Hot Service</h3>
	<ul>
	@if($services)
		@foreach ($services as $service)
		<li>- <a href="{{ action('HomeController@service_detail',$service->id) }}"> {{ $service->name }}</a></li>
		@endforeach
	@endif
	</ul>
</div>
<div class="tf-3">
	<h3>Location</h3>
	<ul>
	@if($branches)
		@foreach ($branches as $branch)
		<li><a href="{{ action('HomeController@branch',$branch->id) }}">{{ $branch->name }}</a> <a href="{{ action('HomeController@branch',$branch->id) }}" class="tf-map">Map</a></li>
		@endforeach
	@endif
	</ul>
	<!-- <h3 class="margin-top-30">International</h3>
	<ul>
		<li><a href="#">กัมพูชา</a> <a href="#" class="tf-map">Map</a></li>
	</ul> -->
</div>
<div class="tf-4">
	<div class="sent-block">
		กรอกอีเมล์ <span class="en-font">GOT OFFER</span> <br/>
		รับสิทธิพิเศษ ส่วนลด โปรโมชั่น
		<form action="#">
			<input type="text" name="e-mail" />
			<input type="submit" name="submit" value="ส่ง" />
		</form>
	</div>
	<div class="sent-block">
		<span class="en-font">SMS</span> <br/>
		รับสิทธิพิเศษ ผ่านโทรศัพท์มือถือ
		<form action="#">
			<input type="text" name="phone" />
			<input type="submit" name="submit" value="ส่ง" />
		</form>
	</div>
</div>