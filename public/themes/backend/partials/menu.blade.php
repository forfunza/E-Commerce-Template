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
                    <i class="fa fa-road"></i>
                    <span>Services</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ action('CategoriesController@index','entity=services') }}">Categories</a></li>
                    <li><a href="{{ action('ServicesController@index') }}">Service</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-road"></i>
                    <span>Products</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ action('CategoriesController@index','entity=products') }}">Categories</a></li>
                    <li><a href="{{ action('ProductsController@index') }}">Product</a></li>
                </ul>
            </li>
            
            
        </ul></div>        
<!-- sidebar menu end-->
    </div>
</aside>