<section>
@if($products)
			<div class="ccol-left">
            	<h1 class="knowlagetoppic"> รายการสินค้า (สินค้าในตะกร้า {{ Cart::Count(false) }} ชนิด {{ Cart::Count() }} ชิ้น)</h1>
                <table cellpadding="8" cellspacing="1" class="table-cart">
                <thead>
                	<tr>
                        <td colspan="2" align="center">สินค้า</td>
                        <td align="center">จำนวน</td>
                        <td align="center">ราคา</td>
                        <td colspan="2" align="center">ราคารวม</td>
                    </tr>
                    </thead>
                    @foreach ($products as $product)
                    <tr>
                    	
                        <td><a href="{{ action('HomeController@product_detail',$product->id) }}">{{ $product->name }}</a></td>
                        <td><span class="num">{{ $product->price }}</span> บาท</td>
                        <td>{{ $product->qty }}</td>
                        <td><div><span class="price">{{ $product->price * $product->qty }}</span> บาท</div><div class="errTxt"></div></td>
                        <td><a href="{{ action('HomeController@cart_remove',$product->rowid) }}"><div class="icon-del"></div></a></td>
                    </tr>
                    @endforeach
                </table>
               
                <div class="product-block"><a href="{{ action('HomeController@checkout_1') }}" class="detail-btn mrt0">สั่งซื้อสินค้า</a></div>
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
                	<div class="active"><a href="contactus.html"><img src="{{ asset('themes/default/assets/images/contact-ico.jpg') }}" /></a></div>
                    <div><a href="aboutus.html"><img src="{{ asset('themes/default/assets/images/about-ico.jpg') }}" /></a></div>
                    <div><a href="career.html"><img src="{{ asset('themes/default/assets/images/career-ico.jpg') }}" /></a></div>
                    <div><img src="{{ asset('themes/default/assets/images/hotline-ico.jpg') }}" /></div>
                </div>
            </div>
@else 



@endif
        </section>
