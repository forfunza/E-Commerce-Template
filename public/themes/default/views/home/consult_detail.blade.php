<section>
<h2><i class="tl"></i><span>Consult Doctor</span><i class="tr"></i></h2>
<div class="product-name"><h1>{{ $consult->name }}</h1></div>
<div class="product-detail">
	{{ $consult->description }}
</div>
<div class="product-detail-block">
	<div class="prod-left">
    	<img src="{{ $consult->image }}" />
    </div>
    <div class="prod-right">
    	<div class="fb-chatbox-area">
        	-ส่วนของกล่องแสดงความคิดเห็นโดย Facebook comment box จะแสดงผลเมื่อใส่โปรแกรม-
        </div>
    </div>
</div>
<div class="clear"></div>
<div style="height:50px;"></div>
</section>
{{ Theme::widget('WidgetHotproduct', array('bests' => $bests))->render(); }}