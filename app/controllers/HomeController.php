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

		$category_services = Category::where('entity_id',1)->get();
		$promotions = Promotion::all()->take(4);
		//$news = News::orderBy('created_at','desc')->first();
		$review = Review::orderBy('created_at','desc')->first();
		//dd($review);


		$view = array(
			'category_services' => $category_services,
			'promotions' => $promotions,
			'review' => $review
			);

		return $this->theme->scope('home.index', $view)->render();
	}

	public function login()
	{
		$view = array();
		return $this->theme->scope('home.login', $view)->render();
	}

	public function aboutus()
	{
		$about = About::find(1);
		$contact = Contact::find(1);
		$view = array(
			'about' => $about,
			'contact' => $contact
			);
		return $this->theme->scope('home.aboutus', $view)->render();
	}

	public function knowledge()
	{
		$knowledges = Knowledge::all();
		$view = array(
			'knowledges' => $knowledges
			);
		return $this->theme->scope('home.knowledge', $view)->render();
	}

	public function knowledge_detail($id)
	{
		$knowledge = Knowledge::findOrFail($id);
		$service_category = Category::where('entity_id',1)->get();
		
		$view = array(
			'knowledge' => $knowledge,
			'service_category' => $service_category
			);
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

		$celebrity = Celebrity::all();

		$view = array(
			'celebrity' => $celebrity
			);
		return $this->theme->scope('home.celebrity', $view)->render();
	}

	public function review()
	{
		$reviews = Review::simplePaginate(12);
		$view = array(
			'reviews' => $reviews
			);
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

		$review = Review::findOrFail($id);
		
		$view = array(
			'review' => $review
			);
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
		$consults = Consult::all();
		$view = array(
			'consults' => $consults
			);
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
		$consult = Consult::findOrFail($id);
		$view = array(
			'consult' => $consult
			);
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
		$categories = Category::where('entity_id',1)->get();
		$view = array(
			'categories' => $categories
			);
		return $this->theme->scope('home.service', $view)->render();
	}

	public function service_detail($id)
	{
		$this->theme->asset()->container('inline-footer')->writeContent('service','<script>
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
		$service = Service::findOrFail($id);
		$services = Service::all();
		$view = array(
			'service' => $service,
			'services' => $services
			);
		return $this->theme->scope('home.service_detail', $view)->render();
	}

	public function service_categories($id)
	{
		$this->theme->asset()->container('inline-footer')->writeContent('service','<script>
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
		$categories = Category::findOrFail($id);
		$view = array(
			'categories' => $categories
			);
		return $this->theme->scope('home.service_categories', $view)->render();
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
		$categories = Category::where('entity_id',2)->get();
		$bests = Product::where('best_sell',1)->get();
		$view = array(
			'categories' => $categories,
			'bests' => $bests
			);
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
		$product = Product::findOrFail($id);
		$bests = Product::where('best_sell',1)->get();
		$view = array(
			'product' => $product,
			'bests' => $bests
			);
		return $this->theme->scope('home.product_detail', $view)->render();
	}

	public function promotion()
	{
		$this->theme->asset()->container('inline-footer')->writeContent('promotion','<script>
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
		$promotions = Promotion::all();
		$services = Service::all();
		$bests = Product::where('best_sell',1)->get();
 		$view = array(
			'promotions' => $promotions,
			'services' => $services,
			'bests' => $bests
			);
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
			
		})

		    </script>');
		$befores = Before::all();
		$view = array(
			'befores' => $befores
			);

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
		$news = News::all();
		$view = array(
			'news' => $news
			);
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
