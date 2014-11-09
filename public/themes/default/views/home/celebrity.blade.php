<section>
  <h2><i class="tl"></i><span>celebrity</span><i class="tr"></i></h2>
  @if($celebrity)
  <div id='masonry' class="timeline animated">
  @foreach ($celebrity as $celeb)
    <div class="timeline-row">
      <div class="timeline-icon"></div>
      <div class="panel timeline-content">
        <div class="panel-body">
          <div class="timeline-img"><a href="{{ $celeb->image }}" class="group1"><img src="{{ $celeb->image }}"></a></div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
</section>