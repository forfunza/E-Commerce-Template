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
            <h2><i class="tl"></i><span>Hot Promotion</span><i class="tr"></i></h2>
            <div class="pro-item">
                <div class="pro-item-left">
                    <div class="pro-item-thumnail"><img src="{{ asset('themes/default/assets/images/item/promotion-1.jpg') }}" /></div>
                    <a href="#">จองโปรฯนี้</a>
                </div>
                <div class="pro-item-right">
                    <h3>e-Matrix</h3>
                    <div class="pro-item-caption">ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ</div>
                    <div class="exp-date">หมดเขต 31 ม.ค. 2557</div>
                </div>
            </div>
            <div class="pro-item">
                <div class="pro-item-left">
                    <div class="pro-item-thumnail"><img src="{{ asset('themes/default/assets/images/item/promotion-1.jpg') }}" /></div>
                    <a href="#">จองโปรฯนี้</a>
                </div>
                <div class="pro-item-right">
                    <h3>e-Matrix</h3>
                    <div class="pro-item-caption">ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ</div>
                    <div class="exp-date">หมดเขต 31 ม.ค. 2557</div>
                </div>
            </div>
            <div class="pro-item">
                <div class="pro-item-left">
                    <div class="pro-item-thumnail"><img src="{{ asset('themes/default/assets/images/item/promotion-1.jpg') }}" /></div>
                    <a href="#">จองโปรฯนี้</a>
                </div>
                <div class="pro-item-right">
                    <h3>e-Matrix</h3>
                    <div class="pro-item-caption">ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ</div>
                    <div class="exp-date">หมดเขต 31 ม.ค. 2557</div>
                </div>
            </div>
            <div class="pro-item">
                <div class="pro-item-left">
                    <div class="pro-item-thumnail"><img src="{{ asset('themes/default/assets/images/item/promotion-1.jpg') }}" /></div>
                    <a href="#">จองโปรฯนี้</a>
                </div>
                <div class="pro-item-right">
                    <h3>e-Matrix</h3>
                    <div class="pro-item-caption">ปกติการทำ e-Matrix จะเห็นผลชัดมาก ๆ ต้องทำอย่างน้อง 3-5 ครั้งคะ</div>
                    <div class="exp-date">หมดเขต 31 ม.ค. 2557</div>
                </div>
            </div>
        </div>
    </div>
    <div class="cocol-right">
        @if($services)
        <div class="all-service">
            <ul>
                @foreach ($services as $tmp)
                <li class="{{ Request::segment(2) == $tmp->id ? 'active' : '' }}"><a href="detail-service.html" >{{ str_limit($tmp->name, $limit = 15, $end = '') }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="top-product">
            <h3>3 อันดับสินค้าขายดี</h3>
            <ul>
                <li>
                    <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-1.jpg') }}"></div>
                    <div class="prod-name">blemish soothing one week program</div>
                </li>
                <li>
                    <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-2.jpg') }}"></div>
                    <div class="prod-name">blemish soothing one week program</div>
                </li>
                <li>
                    <div class="item-thumbnail"><img src="{{ asset('themes/default/assets/images/item/item-3.jpg') }}"></div>
                    <div class="prod-name">blemish soothing one week program</div>
                </li>
            </ul>
        </div>
    </div>
</section>