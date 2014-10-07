<section>
   <h2><i class="tl"></i><span>News &amp; Event</span><i class="tr"></i></h2>
   @if($news)
   <div id='masonry' class="timeline animated">
      @foreach ($news as $tmp)
      <div class="timeline-row">
         <div class="timeline-icon"></div>
         <div class="panel timeline-content">
            <div class="panel-body">
               <div class="trement-name">{{ $tmp->name }}</div>
               <div class="news-date">20 กุมภาพันธ์ 2557</div>
               <div class="more-less">
                  <div class="more-blocky">
                    <p>{{ $tmp->description }}</p>
                  </div>
               </div>
               <div class="timeline-img"><img src="{{ $tmp->image }}" /></div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
   @endif
</section>