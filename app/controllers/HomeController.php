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
		$promotions = Promotion::orderBy('updated_at','desc')->take(4)->get();
		$befores = Before::orderBy('updated_at','desc')->take(4)->get();
		$news = News::orderBy('updated_at','desc')->take(4)->get();
		$reviews = Review::orderBy('updated_at','desc')->take(4)->get();
		$consults = Consult::orderBy('updated_at','desc')->take(4)->get();

		$bests = Product::orderBy('updated_at','desc')->where('best_sell',1)->take(5)->get();

		$review = Review::orderBy('created_at','desc')->first();
		//dd($review);

		$nnews = News::orderBy('updated_at','desc')->first();

		$slideshows = Slideshow::all();


		$view = array(
			'category_services' => $category_services,
			'promotions' => $promotions,
			'review' => $review,
			'befores' => $befores,
			'reviews' => $reviews,
			'news' => $news,
			'consults' => $consults,
			'bests' => $bests,
			'nnews' => $nnews,
			'slideshows' => $slideshows
			);

		return $this->theme->scope('home.index', $view)->render();
	}

	public function login()
	{
		if (Session::has('message'))
		{
        	$this->theme->asset()->container('inline-footer')->writeScript('alert', '
			    $(function() {
			         alert("'.Session::get('message').'"); 
			    })
			');
        }
		$view = array();
		return $this->theme->scope('home.login', $view)->render();
	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::action('HomeController@index');
	}

	public function register()
	{
		$view = array();
		return $this->theme->scope('home.register', $view)->render();
	}

	public function group($group)
	{
		$group = Sentry::createGroup(array(
        'name'        => $group,
        'permissions' => array(
            $group => 1
        ),
    ));
	}

	public function handle_register()
	{

		try
		{
		    // Create the user
		    $user = Sentry::createUser(array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password'),
		        'activated' => true,
		        'first_name' => Input::get('firstname'),
		        'last_name' => Input::get('lastname')
		    ));

		    // Find the group using the group id
		    $userGroup = Sentry::findGroupById(2);

		    // Assign the group to the user
		    $user->addGroup($userGroup);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    echo 'Group was not found.';
		}

		// Mail::send('emails.user.welcome', function($message)
		// {
		//     $message->from('limplemoness@gmail.com', 'Laravel');

		//     $message->to('limplemoness@gmail.com');
		// });

		return Redirect::action('HomeController@login');
	}

	public function authenticate()
	{
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, false);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','Login field is required');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','Password field is required.');
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','Wrong password, try again.');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','User was not found.');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','User is not activated.');
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','User is suspended.');
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return Redirect::action('HomeController@login')->with('message','User is banned.');
		}

		return Redirect::action('HomeController@index');
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

		$reviews = Review::orderBy('updated_at','desc')->take(4)->get();
		
		$view = array(
			'review' => $review,
			'reviews' => $reviews
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
		$bests = Product::where('best_sell',1)->get();
		$view = array(
			'consult' => $consult,
			'bests' => $bests
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
		$hot_promotion = Promotion::orderBy('seller','desc')->take(4)->get();
		$view = array(
			'service' => $service,
			'services' => $services,
			'hot_promotion' => $hot_promotion
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
		$customer_review = CustomerReview::orderBy('updated_at','desc')->take(4)->get();
		$categories = Category::where('entity_id',2)->get();
		$bests = Product::where('best_sell',1)->get();
		$view = array(
			'categories' => $categories,
			'bests' => $bests,
			'customer_review' => $customer_review
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
		$images = ProductImage::where('product_id',$id)->get();
		$bests = Product::where('best_sell',1)->get();
		$view = array(
			'product' => $product,
			'bests' => $bests,
			'id' => $id,
			'images' => $images
			);


		
		return $this->theme->scope('home.product_detail', $view)->render();
	}

	public function promotion()
	{
		$this->theme->asset()->container('script-header')->usePath()->add('countdown', 'js/jquery.countdown.min.js', array('jquery'));
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
		$bathers = Bather::all();
		$services = Service::all();
		$bests = Product::where('best_sell',1)->take(3)->get();
		$view = array(
			'bathers' => $bathers,
			'services' => $services,
			'bests' => $bests
			);
		return $this->theme->scope('home.bather', $view)->render();
	}

	public function bather_detail($id)
	{
		$this->theme->asset()->usePath()->add('fotorama', 'styles/fotorama.css',array('main'), array('media' => 'all'));

		$this->theme->asset()->container('script-header')->usePath()->add('fotorama', 'js/fotorama.js', array('jquery'));

		$images = BatherImage::where('bather_id',$id)->get();

		$bather = Bather::findOrFail($id);

		$view = array(
			'images' => $images,
			'bather' => $bather
			);

		return $this->theme->scope('home.bather_detail',$view)->render();
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
		$branches = Branch::all();
		$contact = Contact::find(1);
		$view = array(
			'branches' => $branches,
			'contact' => $contact
			);
		return $this->theme->scope('home.contact', $view)->render();
	}

	public function branch($id)
	{
		
		$branch = Branch::findOrFail($id);
		$view = array(
			'branch' => $branch
			);
		return $this->theme->scope('home.branch', $view)->render();
	}



	public function career()
	{
		$careers = Career::all();
		$view = array(
			'careers' => $careers
			);
		return $this->theme->scope('home.career', $view)->render();
	}

	public function cart()
	{
		$contact = Contact::find(1);
		$view = array(
			'products' => Cart::content(),
			'contact' => $contact
			);

		//dd(Cart::content());
		return $this->theme->scope('home.checkout', $view)->render();
	}

	public function cart_remove($id)
	{
		Cart::remove($id);
		

		return Redirect::action('HomeController@cart');
	}

	public function cart_add()
	{
		$view = array();

		if (Request::ajax())
		{
			$product = Product::find(Input::get('id'));

			$search = Cart::search(array('id' => Input::get('id')));

			//dd($search);
			if($search)
			{
				$old = Cart::get($search[0]);
			//dd($old);
				$qty = $old['qty'] + Input::get('qty');
				
				$update = Cart::update($old['rowid'], array('qty' => $qty));

				//dd($update);
			}
			else
			{
				Cart::add(
					array(
							'id' => $product->id, 
							'name' => $product->name, 
							'qty' => Input::get('qty'), 
							'price' => $product->price, 
							'options' => array()
						)
				);
			}

		

			return Response::json(array('count' =>  Cart::count(false)));
		}
		//return $this->theme->scope('home.checkout', $view)->render();
	}

	public function line()
	{
		return $this->theme->scope('home.line')->render();
	}

	public function checkout_1()
	{
		$user = array();
		if(Sentry::check())
		{
			$access = Sentry::getUser()->hasAccess('user');
			if($access)
				$user =  Sentry::getUser();
		}
		$contact = Contact::find(1);
			

		$view = array(
			'user' => $user,
			'contact' => $contact
			);
		return $this->theme->scope('home.checkout_1', $view)->render();
	}

	public function checkout_2()
	{
		//dd(Input::all());
		$contact = Contact::find(1);

		Session::put('input',Input::get());
		
		$view = array(
			'input' => Input::get(),
			'contact' => $contact,
			'products' => Cart::content()
			);
		return $this->theme->scope('home.checkout_2', $view)->render();
	}

	public function checkout_3()
	{
		$user = array();
		if(Sentry::check())
		{
			$access = Sentry::getUser()->hasAccess('user');
			if($access)
				$user =  Sentry::getUser();
		}
		
		$contact = Contact::find(1);
		$dt = new DateTime;

		$order = Order::create([
				'user_id' => '1',
				'invoice_id' => Date('Ymd').$dt->getTimestamp(),
				'order_status' => '1',
				'email' => Session::get('input')['email'],
				'firstname' => Session::get('input')['name'],
				'tel' => Session::get('input')['telephone'],
				'building' => Session::get('input')['building'],
				'room' => Session::get('input')['room'],
				'floor' => Session::get('input')['floor'],
				'no' => Session::get('input')['houseno'],
				'moo' => Session::get('input')['moo'],
				'mooban' => Session::get('input')['village'],
				'soi' => Session::get('input')['soi'],
				'road' => Session::get('input')['road'],
				'sub_district' => Session::get('input')['subdistrict'],
				'district' => Session::get('input')['district'],
				'province' => Session::get('input')['province'],
				'postcode' => Session::get('input')['zipcode']
			]);

		

		foreach (Cart::content() as $product) {
			OrderProduct::create([
				'order_id' => $order->id,
				'product_id' => $product->id,
				'price' => $product->price,
				'qty' => $product->qty,
				'total' => $product->price * $product->qty

				]);
		}

		$view = array(
			'contact' => $contact,
			);
		return $this->theme->scope('home.checkout_3', $view)->render();
	}

}
