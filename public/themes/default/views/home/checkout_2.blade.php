<section>
    <div class="ccol-left">
        <h1 class="knowlagetoppic"> ตรวจสอบรายการสั่งซื้อ</h1>
        <h3>ที่อยู่สำหรับจัดส่งสินค้า</h3>
        <div class="service-caption normaladdress mrb20">
            <div class="adleft">ติดต่อ:</div>   <div class="ad-right">{{ $input['email'] }}, {{ $input['telephone'] }}</div>
            <div class="adleft">ชื่อ-สกุล:</div>    <div class="ad-right">{{ $input['name'] }}</div>
            <div class="adleft">ที่อยู่:</div>  <div class="ad-right">
            {{ $input['houseno'] }}
            @if($input['building']) {{ ' '.$input['building']  }} @endif
            @if($input['floor']) {{ ' ชั้น'.$input['floor']  }} @endif
            @if($input['room']) {{ ' ห้อง'.$input['room']  }} @endif
            @if($input['road']) {{ ' ถนน'.$input['road']  }} @endif
            @if($input['soi']) {{ ' ซอย'.$input['soi']  }} @endif
            @if($input['village']) {{ ' '.$input['village']  }} @endif
            @if($input['moo']) {{ ' '.$input['moo']  }} @endif
            @if($input['subdistrict']) {{ ' '.$input['subdistrict'] }} @endif
            @if($input['district']) {{ ' '.$input['district']  }} @endif
            @if($input['province']) {{ ' '.$input['province']  }} @endif
            @if($input['zipcode']) {{ ' '.$input['zipcode']  }} @endif
        </div>
        <div class="adleft">วิธีการส่งสินค้า :</div>    <div class="ad-right">  จัดส่งทางไปรษณีย์</div>
        <div class="clear"></div>
    </div>
    <h3>รายการสินค้า</h3>
    @if($products)
    <table cellpadding="8" cellspacing="1" class="table-cart">
        <thead>
            <tr>
                <td colspan="2" align="center">สินค้า</td>
                <td align="center">ราคา</td>
                <td align="center">จำนวน</td>
                <td align="center">ราคารวม</td>
            </tr>
        </thead>
        
        
        @foreach ($products as $product)
        <tr>
            <td align="center"><img src="{{ Product::find($product->id)->image }}" /></td>
            <td><a href="{{ action('HomeController@product_detail',$product->id) }}">{{ $product->name }}</a></td>
            <td><span class="num">{{ $product->price }}</span> บาท</td>
            <td>{{ $product->qty }}</td>
            <td><div><span class="price">{{ $product->price * $product->qty }}</span> บาท</div><div class="errTxt"></div></td>
            
        </tr>
        @endforeach
        
    </table>
    @endif
   <!--  <h3>หมายเหตุ เขียนเพิ่มเติมรายละเอียดเกียวกับสินค้าที่ซื้อ</h3>
    <textarea class="order-remark"></textarea> -->
    <div class="product-block">
        
        <a href="{{ action('HomeController@checkout_3') }}" class="detail-btn mrt0">ยืนยันการสั่งซื้อสินค้า</a>
    </div>
</div>
<div class="ccol-right">
    {{ Theme::widget('WidgetAbout', array('contact' => $contact))->render(); }}
</div>
</section>