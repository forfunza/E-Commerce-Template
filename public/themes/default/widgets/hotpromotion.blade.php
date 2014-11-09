@if($hot_promotion)
<h2><i class="tl"></i><span>Hot Promotion</span><i class="tr"></i></h2>
@foreach ($hot_promotion as $promotion)
<div class="pro-item">
    <div class="pro-item-left">
        <div class="pro-item-thumnail"><img src="{{ $promotion->image }}" /></div>
        <a href="#">จองโปรฯนี้</a>
    </div>
    <div class="pro-item-right">
        <h3>{{ $promotion->name }}</h3>
        <div class="pro-item-caption">{{ str_limit($promotion->description, $limit = 50, $end = '') }}</div>
        <div class="exp-date">expire : {{ Date('d F Y' , strtotime($promotion->expire)) }}</div>
    </div>
</div>
@endforeach
@endif
