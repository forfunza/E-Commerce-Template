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
{{ Theme::asset()->container('inline-header')->scripts(); }}
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
{{ Theme::asset()->container('inline-footer')->scripts(); }}


{{ Theme::asset()->container('footer')->scripts(); }}
<script type="text/javascript">
    
$('#addcart').click(function(){

    $.ajax({
      type: "POST",
      url: "/add",
      data: { qty: $('#spinner').val(), id : $('#product_id').val() }
    })
      .done(function( data ) {
            $('#cart-qty').html(data.count);
            alert('เพิ่มสินค้าใส่ตระกร้าแล้ว');
      });
    //alert($('#spinner').val());
});

</script>
</body>
</html>