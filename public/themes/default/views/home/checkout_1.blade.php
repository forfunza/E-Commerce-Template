<section>
	<div class="ccol-left">
    	<h1 class="knowlagetoppic"> ที่อยู่ในการจัดส่ง</h1>
        <h3>รายละเอียดและที่อยู่ในการจัดส่งสินค้า</h3>
            <div class="service-caption">
            	กรุณากรอกรายละเอียดและที่อยู่ในการจัดส่งสินค้าให้ครบถ้วน เพิ่มความมั่นใจในการส่งสินค้าถึงปลายทาง จากนั้นคลิกปุ่ม "จัดส่งตามที่อยู่นี้"
            </div>
         <!--  <h3>รายการที่อยู่เดิมของคุณ</h3>
          <div class="service-caption normaladdress mrb20">
            	<div class="adleft">ติดต่อ:</div>	<div class="ad-right">nuaomnaruk@hotmail.com, 0805321214</div>
                <div class="adleft">ชื่อ-สกุล:</div>	<div class="ad-right">	สุขุมา บูรพัฒน์</div>
                <div class="adleft">ที่อยู่:</div>	<div class="ad-right">	หมู่บ้านแฮปปี้เพลส 2  เลขที่ 441  ซอยฉลองกรุง 23  ถนนฉลองกรุง  แขวงลำปลาทิว  เขตลาดกระบัง  กทม  รหัสไปรษณีย์ 10520</div>
                <div class="icon-del"></div>
                <div class="clear"></div>
            </div>
             <div class="product-block"><a href="checkout-step3.html" class="detail-btn mrt0">จัดส่งที่อยู่ตามนี้</a></div> -->
              <h3>ข้อมูลการจัดส่ง</h3>
        {{ Form::open(array('action' => array('HomeController@checkout_2'), 'method' => 'post')) }}
        <table cellpadding="10" cellspacing="0" class="address-table mrb20" >
            
            <tbody>
            <tr class="required">
            <td class="nameTD">*อีเมล</td>
            <td class="inputTD"><input type="text" name="email" value="{{ isset($user->email) ? $user->email : '' }}" required></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*ชื่อผู้สั่งซื้อ</td>
            <td class="inputTD"><input type="text" name="name" value="{{ isset($user->first_name) ? $user->first_name . '  ' . $user->last_name : '' }}" required></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*เบอร์โทรศัพท์</td>
            <td class="inputTD"><input type="text" name="telephone" required></td>
            </tr>
            <tr>
            <td class="nameTD">อาคาร</td>
            <td class="inputTD"><input type="text" name="building"></td>
            </tr>
            <tr>
            <td class="nameTD">ห้อง</td>
            <td class="inputTD"><input type="text" name="room"></td>
            </tr>
            <tr>
            <td class="nameTD">ชั้น</td>
            <td class="inputTD"><input type="text" name="floor"></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*บ้านเลขที่</td>
            <td class="inputTD"><input type="text" name="houseno" required></td>
            </tr>
            <tr>
            <td class="nameTD">หมู่ที่</td>
            <td class="inputTD"><input type="text" name="moo"></td>
            </tr>
            <tr>
            <td class="nameTD">หมู่บ้าน</td>
            <td class="inputTD"><input type="text" name="village"></td>
            </tr>
            <tr>
            <td class="nameTD">ซอย</td>
            <td class="inputTD"><input type="text" name="soi"></td>
            </tr>
            <tr>
            <td class="nameTD">ถนน</td>
            <td class="inputTD"><input type="text" name="road"></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*แขวง/ตำบล</td>
            <td class="inputTD"><input type="text" name="subdistrict" required></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*เขต/อำเภอ</td>
            <td class="inputTD"><input type="text" name="district" required></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*จังหวัด</td>
            <td class="inputTD"><input type="text" name="province" required></td>
            </tr>
            <tr class="required">
            <td class="nameTD">*รหัสไปรษณีย์</td>
            <td class="inputTD"><input type="text" name="zipcode" required></td>
            </tr>
            </tbody>

        </table>
         <div class="product-block"><center><button type="submit" class="detail-btn mrt0">สั่งซื้อสินค้า</button></center></div>
        {{ Form::close() }}
       
    </div>
    <div class="ccol-right">
    	{{ Theme::widget('WidgetAbout', array('contact' => $contact))->render(); }}
    </div>
</section>