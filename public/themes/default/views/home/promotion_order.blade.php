<section>
    <div class="cocol-left">
        
        <div class="service-form">
            
            {{ Form::open(array('action' => array('HomeController@promotion_checkout'), 'method' => 'post')) }}
                <h1>กรุณากรอกข้อมูลเพื่อสั่งซื้อโปรโมชั่น</h1>
                <div class="form-row">
                    <span>ชื่อ</span> <input type="text" name="firstname" class="text-box half"  required/>
                    <span>นามสกุล</span> <input type="text" name="lastname" class="text-box half"  required/>
                </div>
                <div class="form-row">
                    <span>โทร.</span> <input type="text" name="tel" class="text-box half" />
                    <span>อีเมล์</span> <input type="text" name="email" class="text-box half"  required/>
                </div>
                <div class="form-row">
                    <span>ที่อยู่</span>  <input type="text" name="address" class="text-box" required />
                    <input type="hidden" name="promotion_id" class="text-box" value="{{ $promotion_id }}"/>
                </div>
               
                <div class="form-row">
                    <input type="submit" class="submit" value="ตกลง" />
                    <input type="reset" class="reset" value="ยกเลิก" />
                </div>
            {{ Form::close() }}
        </div>
        
    </div>
    <div class="cocol-right">
        {{ Theme::widget('WidgetServices', array('services' => $services))->render(); }}
    </div>
</section>