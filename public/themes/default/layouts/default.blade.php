<!DOCTYPE html><!--[if IE 7]>
<html lang="en" class="ie7 oldie"></html><![endif]--><!--[if IE 8]>
<html lang="en" class="ie8 oldie"></html><![endif]-->
<!-- [if gt IE 8] <!-->
<html lang="en">
<!-- <![endif]-->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
<title>Amed clinic</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

{{ Theme::asset()->styles() }}
{{ Theme::asset()->container('script-header')->scripts(); }}

<link rel="shortcut icon" href="">
<script>
jQuery(function(){
    jQuery('#camera_wrap').camera();
});
</script>
</head>
<body>
{{ Theme::partial('header') }}

<div class="container">
{{ Theme::partial('menu') }}

{{ Theme::content() }}




<div class="top-footer">
    <div class="clear"></div>
    {{ Theme::partial('menu') }}
    {{ Theme::partial('sitemap') }}
    <div class="clear"></div>
</div>
</div>
{{ Theme::partial('footer') }}

{{ Theme::asset()->scripts() }}

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".flexnav").flexNav();
    });
</script>
<script>
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
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    })
});
</script>


{{ Theme::asset()->container('footer')->scripts() }}


</body>
</html>