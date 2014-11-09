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
                    	<td align="center"><img src="{{ Product::find($product->id)->image }}" /></td>
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
            	{{ Theme::widget('WidgetAbout', array('contact' => $contact))->render(); }}
            </div>
@else 



@endif
        </section>
