<section>
   <h2><i class="tl"></i><span>Before &amp; After</span><i class="tr"></i></h2>
   @if($befores)
   <div id='masonry' class="timeline animated">
      @foreach ($befores as $before)
      <div class="timeline-row">
         <div class="timeline-icon"></div>
         <div class="panel timeline-content">
            <div class="panel-body">
               <div class="timeline-img"><img src="{{ $before->image }}" /></div>
               <div class="trement-name"> {{ $before->name }}</div>
               <div class="em-name">{{ $before->author }}</div>
               <p>
               {{ $before->description }}
               </p>
            </div>
         </div>
      </div>
      @endforeach  
   </div>
   @endif
</section>