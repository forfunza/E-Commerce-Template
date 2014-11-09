<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <!-- <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>ผู้ลงทะเบียน</span>
                </a>
            </li> -->
           
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Services</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ action('CategoriesController@index','entity=services') }}">Categories</a></li>
                    <li><a href="{{ action('ServicesController@index') }}">Service</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-globe"></i>
                    <span>Products</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ action('CategoriesController@index','entity=products') }}">Categories</a></li>
                    <li><a href="{{ action('ProductsController@index') }}">Product</a></li>
                    <li><a href="{{ action('CustomerReviewsController@index') }}">Customer Review</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-road"></i>
                    <span>Informations</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ action('AboutsController@edit',1) }}">About Us</a></li>
                    <li><a href="{{ action('KnowledgesController@index') }}">Knowledge</a></li>
                    <li><a href="{{ action('CelebritiesController@index') }}">Celebrity</a></li>
                    <li><a href="{{ action('ReviewsController@index') }}">Video & Review</a></li>
                    <li><a href="{{ action('ConsultsController@index') }}">Consult Doctor</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ action('PromotionsController@index') }}">
                    <i class="fa fa-gift"></i>
                    <span>Promotions</span>
                </a>
            </li>
            <li>
                <a href="{{ action('BeforesController@index') }}">
                    <i class="fa fa-comments-o"></i>
                    <span>Before - After</span>
                </a>
            </li>
            <li>
                <a href="{{ action('BathersController@index') }}">
                    <i class="fa fa-group"></i>
                    <span>CO - Bather</span>
                </a>
            </li>
            <li>
                <a href="{{ action('NewsController@index') }}">
                    <i class="fa fa-bullhorn"></i>
                    <span>News & Event</span>
                </a>
            </li>
            <li>
                <a href="{{ action('SlideshowsController@index') }}">
                    <i class="fa fa-bullhorn"></i>
                    <span>SlideShows</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-road"></i>
                    <span>Information</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ action('WebsitesController@edit',1) }}">Website</a></li>
                    <li><a href="{{ action('ContactsController@edit',1) }}">Contact</a></li>
                    <li><a href="{{ action('BranchesController@index') }}">Branch</a></li>
                    <li><a href="{{ action('CareersController@index') }}">Career</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ action('OrdersController@index') }}">
                    <i class="fa fa-bullhorn"></i>
                    <span>Order</span>
                </a>
            </li>

            
            
        </ul></div>        
<!-- sidebar menu end-->
    </div>
</aside>