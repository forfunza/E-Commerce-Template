<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$view = array();
		$this->theme->asset()->usePath()->add('camera', 'styles/camera.css',array('main'), array('media' => 'all'));
		$this->theme->asset()->container('script-header')->usePath()->add('camera', 'js/camera.js', array('jquery'));

		$this->theme->asset()->container('inline-header')->writeContent('sh', '<script>
jQuery(function(){
    jQuery("#camera_wrap").camera({
    loader: "bar",
    barPosition: "top"
    });
});
</script>');

		$this->theme->asset()->container('inline-footer')->writeContent('sf', '<script>
	$(document).ready(function() {
	var owl = $("#owl-item");
	owl.owlCarousel({
	items : 3, //10 items above 1000px browser width
	itemsDesktop : [1000,5], //5 items between 1000px and 901px
	itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
	itemsTablet: [600,2], //2 items between 600 and 0;
	itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	pagination:false
	});
	// Custom Navigation Events
	$(".next").click(function(){
	owl.trigger("owl.next");
	})
	$(".prev").click(function(){
	owl.trigger("owl.prev");
	})
	});
	</script>
');

		return $this->theme->scope('home.index', $view)->render();
	}

	public function login()
	{
		$view = array();
		return $this->theme->scope('home.login', $view)->render();
	}

	public function aboutus()
	{
		$view = array();
		return $this->theme->scope('home.aboutus', $view)->render();
	}

	public function knowledge()
	{
		$view = array();
		return $this->theme->scope('home.knowledge', $view)->render();
	}

	public function knowledge_detail($id)
	{
		$view = array();
		return $this->theme->scope('home.knowledge_detail', $view)->render();
	}

	public function celebrity()
	{

		

		$this->theme->asset()->usePath()->add('timeline', 'styles/timeline.css',array('main'), array('media' => 'all'));
		$this->theme->asset()->usePath()->add('colorbox', 'styles/colorbox.css',array('main'), array('media' => 'all'));

		$this->theme->asset()->container('script-header')->usePath()->add('colorbox', 'js/jquery.colorbox.js', array('jquery'));
		$this->theme->asset()->usePath()->add('timeline', 'js/timeline.js',array('jquery-flexnav'));
		$this->theme->asset()->usePath()->add('masonry', 'js/masonry.pkgd.min.js',array('jquery-flexnav'));

		$this->theme->asset()->container('inline-footer')->writeContent('celeb','<script type="text/javascript">

var $container = $("#masonry").masonry();
// layout Masonry again after all images have loaded
$container.imagesLoaded( function() {
  $container.masonry();
});
	
		jQuery(document).ready(function($) {
			$(".group1").colorbox({rel:"group1", transition:"fade"});
			
		});
	
    </script>');

		$view = array();
		return $this->theme->scope('home.celebrity', $view)->render();
	}

	public function review()
	{
		$view = array();
		return $this->theme->scope('home.review', $view)->render();
	}

	public function review_detail($id)
	{

		$this->theme->asset()->container('inline-footer')->writeContent('review_detail','<script>
    $(document).ready(function() {

      var owl = $(".owl-item");
      owl.owlCarousel({
      	items: 3,
		navigation:true,
		pagination:false,
		autoplay:false,
		navigationText : ["prev","next"],
		autoplayTimeout:5000,
		autoplaySpeed:1000

      });
	
    });
    </script>');
		
		$view = array();
		return $this->theme->scope('home.review_detail', $view)->render();
	}

	public function consult()
	{
		$this->theme->asset()->container('inline-footer')->writeContent('consult','<script>
    $(document).ready(function() {

      var owl = $(".owl-item");
      owl.owlCarousel({
      	items: 3,
		navigation:true,
		pagination:false,
		autoplay:false,
		navigationText : ["prev","next"],
		autoplayTimeout:5000,
		autoplaySpeed:1000

      });
	
    });
    </script>');
		$view = array();
		return $this->theme->scope('home.consult', $view)->render();
	}

	public function consult_detail($id)
	{
		$this->theme->asset()->container('inline-footer')->writeContent('consult','<script>
    $(document).ready(function() {

      var owl = $(".owl-item");
      owl.owlCarousel({
      	items: 3,
		navigation:true,
		pagination:false,
		autoplay:false,
		navigationText : ["prev","next"],
		autoplayTimeout:5000,
		autoplaySpeed:1000

      });
	
    });
    </script>');
		$view = array();
		return $this->theme->scope('home.consult_detail', $view)->render();
	}

	public function service()
	{
		$this->theme->asset()->container('script-header')->usePath()->add('nailthumb', 'js/jquery.nailthumb.1.1.js', array('jquery'));
		$this->theme->asset()->usePath()->add('nailthumb', 'styles/jquery.nailthumb.1.1.css',array('main'), array('media' => 'all'));
		
		$this->theme->asset()->container('inline-footer')->writeContent('service','<script>
    $(document).ready(function() {
		jQuery(".nailthumb-container").nailthumb({width:114,height:114});	
	
    });
    </script>');
		
		$view = array();
		return $this->theme->scope('home.service', $view)->render();
	}

	public function product()
	{
		$this->theme->asset()->container('inline-footer')->writeContent('product','<script>
    $(document).ready(function() {

      var owl = $(".owl-item");
      owl.owlCarousel({
      	items: 3,
		navigation:true,
		pagination:false,
		autoplay:false,
		navigationText : ["prev","next"],
		autoplayTimeout:5000,
		autoplaySpeed:1000

      });
	
    });
    </script>');
		$view = array();
		return $this->theme->scope('home.product', $view)->render();
	}

	public function product_detail($id)
	{
		$this->theme->asset()->usePath()->add('fotorama', 'styles/fotorama.css',array('main'), array('media' => 'all'));

		$this->theme->asset()->container('script-header')->usePath()->add('fotorama', 'js/fotorama.js', array('jquery'));

		$this->theme->asset()->container('inline-footer')->writeContent('product-detail','<script>
    $(document).ready(function() {

      var owl = $(".owl-item");
      owl.owlCarousel({
      	items: 3,
		navigation:true,
		pagination:false,
		autoplay:false,
		navigationText : ["prev","next"],
		autoplayTimeout:5000,
		autoplaySpeed:1000

      });
	
    });
    </script>');
		
		$view = array();
		return $this->theme->scope('home.product_detail', $view)->render();
	}

	public function promotion()
	{
		$view = array();
		return $this->theme->scope('home.promotion', $view)->render();
	}

	public function before()
	{
		$this->theme->asset()->usePath()->add('timeline', 'styles/timeline.css',array('main'), array('media' => 'all'));
		$this->theme->asset()->usePath()->add('colorbox', 'styles/colorbox.css',array('main'), array('media' => 'all'));

		$this->theme->asset()->container('script-header')->usePath()->add('colorbox', 'js/jquery.colorbox.js', array('jquery'));
		$this->theme->asset()->usePath()->add('timeline', 'js/timeline.js',array('jquery-flexnav'));
		$this->theme->asset()->usePath()->add('masonry', 'js/masonry.pkgd.min.js',array('jquery-flexnav'));

		$this->theme->asset()->container('inline-footer')->writeContent('before','<script type="text/javascript">

var $container = $("#masonry").masonry();
// layout Masonry again after all images have loaded
$container.imagesLoaded( function() {
  $container.masonry();
});
	
		jQuery(document).ready(function($) {
			$(".group1").colorbox({rel:"group1", transition:"fade"});
			
		});
	
    </script>');
		$view = array();
		return $this->theme->scope('home.before_after', $view)->render();
	}

	public function bather()
	{
		$view = array();
		return $this->theme->scope('home.bather', $view)->render();
	}

	public function news()
	{
		$this->theme->asset()->usePath()->add('timeline', 'styles/timeline.css',array('main'), array('media' => 'all'));
		$this->theme->asset()->usePath()->add('colorbox', 'styles/colorbox.css',array('main'), array('media' => 'all'));

		$this->theme->asset()->container('script-header')->usePath()->add('colorbox', 'js/jquery.colorbox.js', array('jquery'));
		$this->theme->asset()->usePath()->add('timeline', 'js/timeline.js',array('jquery-flexnav'));
		$this->theme->asset()->usePath()->add('masonry', 'js/masonry.pkgd.min.js',array('jquery-flexnav'));

		$this->theme->asset()->container('inline-footer')->writeContent('before','<script type="text/javascript">

var $container = $("#masonry").masonry();
// layout Masonry again after all images have loaded
$container.imagesLoaded( function() {
  $container.masonry();
});
	
		jQuery(document).ready(function($) {
			$(".group1").colorbox({rel:"group1", transition:"fade"});
			
		});
	
    </script>');
		$view = array();
		return $this->theme->scope('home.news', $view)->render();
	}

	public function contact()
	{
		$this->theme->asset()->usePath()->add('colorbox', 'styles/colorbox.css',array('main'), array('media' => 'all'));
		$this->theme->asset()->container('script-header')->usePath()->add('colorbox', 'js/jquery.colorbox.js', array('jquery'));
		$this->theme->asset()->container('inline-footer')->writeContent('before','<script type="text/javascript">	
		jQuery(document).ready(function($) {
			$(".group1").colorbox({rel:"group1", transition:"fade"});
			
		});
    </script>');
		$view = array();
		return $this->theme->scope('home.contact', $view)->render();
	}

	public function career()
	{
		
		$view = array();
		return $this->theme->scope('home.career', $view)->render();
	}

}
