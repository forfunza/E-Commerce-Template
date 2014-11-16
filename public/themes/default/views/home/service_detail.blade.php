<section>
    <div class="cocol-left">
        <div class="service-area">
            <h1 class="knowlagetoppic"> {{ $service->name }}</h1>
            <div class="contact-top-img"><img src="{{ $service->image }}"></div>
            <h3>{{ $service->name }}</h3>
            <div class="service-caption">
                {{ $service->description }}
            </div>
        </div>
        <div class="service-form">
            
            {{ Form::open(array('action' => array('HomeController@service_discount'), 'method' => 'post')) }}
                <h1>ลงทะเบียนเพื่อรับสิทธิ์ส่วนลดจากโปรแกรมนี้</h1>
                <div class="form-row">
                    <span>ชื่อ</span> <input type="text" name="firstname" class="text-box half"  required/>
                    <span>นามสกุล</span> <input type="text" name="lastname" class="text-box half"  required/>
                </div>
                <div class="form-row">
                    <span>โทร.</span> <input type="text" name="tel" class="text-box half" />
                    <span>อีเมล์</span> <input type="text" name="email" class="text-box half"  required/>
                </div>
                <div class="form-row">
                    <span>ที่อยู่</span> <input type="text" name="address" class="text-box" />
                </div>
                <div class="form-row">
                    <span>ปัญหาที่กังวัล</span> <input type="text" name="problem" class="text-box"  required/>
                    <input type="hidden" name="service_id" value="{{ $service->id }}"/>
                </div>
                <div class="form-row">
                    สาขาที่ต้องการเข้ารับบริการ
                    <select name="branch" class="">
                        <option value="สาขาทองหล่อ">สาขาทองหล่อ</option>
                        <option value="สาขาสยามฯ">สาขาสยามฯ</option>
                        <option value="สาขาสีลม">สาขาสีลม</option>
                    </select>
                    วัน / เวลา ที่สะดวกให้ติดต่อกลับ <input type="text" name="contact" class="text-box mini" />
                </div>
                <div class="form-row">
                    <input type="submit" class="submit" value="ตกลง" />
                    <input type="reset" class="reset" value="ยกเลิก" />
                </div>
            {{ Form::close() }}
        </div>
        <div class="near-pomotion">
            {{ Theme::widget('WidgetHotpromotion', array('hot_promotion' => $hot_promotion))->render(); }}
        </div>
    </div>
    <div class="cocol-right">
        {{ Theme::widget('WidgetServices', array('services' => $services))->render(); }}
    </div>
</section>