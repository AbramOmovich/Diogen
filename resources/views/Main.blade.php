
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title', 'Агенство недвижимости "Диоген"')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="stylesheet" type="text/css" href="/public/css/media1.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/public/css/print.css" media="print"/>
<body class="ps-static  cms-index-index cms-home">
<div class="wrapper ps-static ru-lang-class">
    <div class="page">
        <div class="shadow"></div>
        <div class="swipe-left"></div>
        <div class="top-icon-menu">
            <div class="swipe-control"><i class="fa fa-align-justify"></i></div>
            <div class="top-search"><i class="fa fa-search"></i></div>
            <span class="clear"></span>
        </div>
        @include('part.header')
        @include('part.navBar')

        @yield('Top')
        @yield('Posts')

        @include('part.footer')
    </div>
</div>

<script type="text/javascript" src="/public/js/jquery_1.12.4.js"></script>
<script src="/public/js/sweetalert.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="/public/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/public/js/superfish.js"></script>
<script type="text/javascript" src="/public/js/scripts.js"></script>
<script type="text/javascript" src="/public/js/media1.js"></script>

<script type="text/javascript" src="/public/js/camera.js"></script>

<script type="text/javascript">
    /* index slider */
    jQuery(function(){
      jQuery('#camera_wrap').camera({
            alignmen: 'topCenter',
            height: '43.589%',
            minHeight: '50px',
            loader : false,
            navigation: false,
            fx: 'simpleFade',
            navigationHover:false,
            thumbnails: false,
            playPause: false
        });
    });
</script>-->
<script type="text/javascript">var mdate = new Date(); document.write(mdate.getFullYear() + ' &copy');</script>
</body>
</html>