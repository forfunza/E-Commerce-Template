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
            <form action="#">
                <h1>ลงทะเบียนเพื่อรับสิทธิ์ส่วนลดจากโปรแกรมนี้</h1>
                <div class="form-row">
                    <span>ชื่อ</span> <input type="text" name="#" class="text-box half" />
                    <span>นามสกุล</span> <input type="text" name="#" class="text-box half" />
                </div>
                <div class="form-row">
                    <span>โทร.</span> <input type="text" name="#" class="text-box half" />
                    <span>อีเมล์</span> <input type="text" name="#" class="text-box half" />
                </div>
                <div class="form-row">
                    <span>ที่อยู่</span> <input type="text" name="#" class="text-box" />
                </div>
                <div class="form-row">
                    <span>ปัญหาที่กังวัล</span> <input type="text" name="#" class="text-box" />
                </div>
                <div class="form-row">
                    สาขาที่ต้องการเข้ารับบริการ
                    <select class="">
                        <option>กรุณาเลือกคำตอบ</option>
                        <option>สาขาทองหล่อ</option>
                        <option>สาขาสยามฯ</option>
                        <option>สาขาสีลม</option>
                    </select>
                    วัน / เวลา ที่สะดวกให้ติดต่อกลับ <input type="text" name="#" class="text-box mini" />
                </div>
                <div class="form-row">
                    <input type="submit" class="submit" value="ตกลง" />
                    <input type="reset" class="reset" value="ยกเลิก" />
                </div>
            </form>
        </div>
        <div class="near-pomotion">
            {{ Theme::widget('WidgetHotpromotion', array('hot_promotion' => $hot_promotion))->render(); }}
        </div>
    </div>
    <div class="cocol-right">
        {{ Theme::widget('WidgetServices', array('services' => $services))->render(); }}
    </div>
</section>