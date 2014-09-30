<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('Copyright ©  2013 - Laravel.in.th');

            // Breadcrumb template.
            // $theme->breadcrumb()->setTemplate('
            //     <ul class="breadcrumb">
            //     @foreach ($crumbs as $i => $crumb)
            //         @if ($i != (count($crumbs) - 1))
            //         <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a><span class="divider">/</span></li>
            //         @else
            //         <li class="active">{{ $crumb["label"] }}</li>
            //         @endif
            //     @endforeach
            //     </ul>
            // ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            // $theme->asset()->usePath()->add('core', 'core.js');
            // $theme->asset()->add('jquery', 'vendor/jquery/jquery.min.js');
            // $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));
            
            $theme->asset()->usePath()->add('main', 'styles/main.css', array('media' => 'screen, projection'));
            $theme->asset()->usePath()->add('font', 'styles/fonts.css',array('main'));
            $theme->asset()->usePath()->add('media', 'styles/media.css',array('main'), array('media' => 'screen, projection'));
            $theme->asset()->usePath()->add('flexnav', 'styles/flexnav.css',array('main'), array('media' => 'screen, projection'));
            //$theme->asset()->usePath()->add('camera', 'styles/camera.css',array('main'), array('media' => 'all'));
            $theme->asset()->usePath()->add('owl.carousel', 'styles/owl.carousel.css',array('main'));
            $theme->asset()->usePath()->add('owl.theme', 'styles/owl.theme.css',array('main'));
            $theme->asset()->usePath()->add('styles-tab', 'styles/styles-tab.css',array('main'));



            $theme->asset()->usePath()->add('jquery-flexnav', 'js/jquery.flexnav.js');
            $theme->asset()->usePath()->add('owl.carousel', 'js/owl.carousel.js',array('jquery-flexnav'));
            
            $theme->asset()->container('footer')->usePath()->add('hashchange', 'js/jquery.ba-hashchange.js');
            $theme->asset()->container('footer')->usePath()->add('script-tab', 'js/script-tab.js',array('hashchange'));
            


            $theme->asset()->container('script-header')->usePath()->add('jquery', 'js/jquery.min.js');
            $theme->asset()->container('script-header')->usePath()->add('chrome', 'js/jquery.mobile.customized.min.js', array('jquery'));
            $theme->asset()->container('script-header')->usePath()->add('menu', 'js/jquery.easing.1.3.js', array('jquery'));
            $theme->asset()->container('script-header')->usePath()->add('camera', 'js/camera.js', array('jquery'));


           
            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', Auth::user());
            // });
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);