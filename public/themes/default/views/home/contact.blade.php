<section>
			<div class="ccol-left">
            	<div class="contact-top-img"><img src="{{ asset('themes/default/assets/images/contact-img.jpg') }}" /></div>

                @if($branches)
                @foreach ($branches as $branch)
                <div class="loaction-block">
                	<div class="map-right"><a href="{{ action('HomeController@branch',$branch->id) }}"><img src="{{ $branch->image }}"></a></div>
                    <h3>{{ $branch->name }}</h3>
                    <div class="local-caption">
                    	{{ $branch->description }}
                        <span class="click-right"><a href="{{ action('HomeController@branch',$branch->id) }}">► คลิ๊กเพื่อดูรายละเอียด</a></span>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="ccol-right">
            	<h1>บริษัทเอเมด อินเตอร์เนชั่นแนล กรุ๊ป จำกัด</h1>
                <div class="company-eng">Amed international group co.,ltd</div>
                <div class="company-address">
                	<span>ที่อยู่ :</span>
                    <span>2098/148 ซ.รามคำแหง 24/5 (หมู่บ้านปรีชา) ถ.รามคำแหง แขวงหัวหมาก เขตบางกะปิ กรุงเทพมหานคร 10240</span>
                    <span>Tel : 02-718-9992</span>
                    <span>Fax : 02-718-9992#8</span>
                </div>
                <div class="contact-menu">
                	<div class="active"><a href="{{ action('HomeController@contact') }}"><img src="{{ asset('themes/default/assets/images/contact-ico.jpg') }}" /></a></div>
                    <div><a href="{{ action('HomeController@aboutus') }}"><img src="{{ asset('themes/default/assets/images/about-ico.jpg') }}" /></a></div>
                    <div><a href="{{ action('HomeController@career') }}"><img src="{{ asset('themes/default/assets/images/career-ico.jpg') }}" /></a></div>
                    <div><img src="{{ asset('themes/default/assets/images/hotline-ico.jpg') }}" /></div>
                </div>
            </div>
        </section>