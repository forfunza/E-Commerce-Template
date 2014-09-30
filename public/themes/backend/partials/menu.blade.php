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
                    <li><a href="#">Customer Review</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-road"></i>
                    <span>General</span>
                </a>
                <ul class="sub">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Knowledge</a></li>
                    <li><a href="#">Celebrity</a></li>
                    <li><a href="#">Video & Review</a></li>
                    <li><a href="#">Consult Doctor</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-gift"></i>
                    <span>Promotion</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-comments-o"></i>
                    <span>Before - After</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span>CO - Bather</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bullhorn"></i>
                    <span>News & Event</span>
                </a>
            </li>

            
            
        </ul></div>        
<!-- sidebar menu end-->
    </div>
</aside>