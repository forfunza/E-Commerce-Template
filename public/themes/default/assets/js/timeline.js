(function() {
	
  $(document).ready(function() {
	 
	 function Arrow_Points()
	{ 
	var s = $('#masonry').find('.timeline-row');
	var $classLeft = 'leftCorner';
    var $classRight = 'rightCorner';
	$.each(s,function(i,obj){
	var posLeft = $(obj).css("left");
	$(obj).addClass('borderclass');
	if(posLeft == "0px")
	{
	html = "<span class='rightCorner'></span>";
	$(obj).prepend(html);	
	$(obj).find('.timeline-content').addClass( $classRight); 		
	}
	else
	{
	html = "<span class='leftCorner'></span>";
	$(obj).prepend(html);
	$(obj).find('.timeline-content').addClass( $classLeft); 	
	}
	});
	}
	Arrow_Points();
	
    var timelineAnimate;
    timelineAnimate = function(elem) {
      return $(".timeline.animated .timeline-row").each(function(i) {
        var bottom_of_object, bottom_of_window;
        bottom_of_object = $(this).position().top + $(this).outerHeight();
        bottom_of_window = $(window).scrollTop() + $(window).height();
        if (bottom_of_window > bottom_of_object) {
          return $(this).addClass("active");
        }
      });
    };
    timelineAnimate();
    return $(window).scroll(function() {
      return timelineAnimate();
    });
  });

}).call(this);