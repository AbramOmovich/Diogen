
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
    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong><br/>
                    You must have JavaScript enabled in your browser to utilize the functionality of this website. </p>
            </div>
        </div>
    </noscript>
    <div class="page">
        <div class="shadow"></div>
        <div class="swipe-left"></div>
        <div class="swipe">
            <div class="swipe-menu">
                <div class="footer-links-menu">
                    <ul>
                        <li><a href="https://livedemo00.template-help.com/magento_50897/about-magento-demo-store">О компании</a></li>
                        <li><a href="https://livedemo00.template-help.com/magento_50897/customer-service">Обслуживание клиентов</a></li>
                        <li><a href="https://livedemo00.template-help.com/magento_50897/template-settings">Настройки шаблона</a></li>
                        <li class="last privacy"><a href="https://livedemo00.template-help.com/magento_50897/privacy-policy-cookie-restriction-mode">Политика конфиденциальности</a></li>
                    </ul>
                    <ul class="links-2">
                        <li class="first"><a href="https://livedemo00.template-help.com/magento_50897/catalog/seo_sitemap/product/">Карта продуктов</a></li>
                        <li><a href="https://livedemo00.template-help.com/magento_50897/catalog/seo_sitemap/category/">Карта категорий</a></li>
                        <li><a href="https://livedemo00.template-help.com/magento_50897/catalogsearch/advanced/">Расширенный поиск</a></li>
                        <li><a href="https://livedemo00.template-help.com/magento_50897/sales/guest/form/">Заказы и возвраты</a></li>
                    </ul> </div>
            </div>
        </div>
        <div class="top-icon-menu">
            <div class="swipe-control"><i class="fa fa-align-justify"></i></div>
            <div class="top-search"><i class="fa fa-search"></i></div>
            <span class="clear"></span>
        </div>
        <div class="header-container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="header">
                            <div class="top_row">
                                <ul class="links">
                                    <li class="first"><a href="https://livedemo00.template-help.com/magento_50897/customer/account/" title="Мой профайл">Мой профайл</a></li>
                                    <li><a href="https://livedemo00.template-help.com/magento_50897/checkout/" title="Оформить заказ" class="top-link-checkout">Оформить заказ</a></li>
                                    <li class=" last"><a href="https://livedemo00.template-help.com/magento_50897/customer/account/login/" title="Войти">Регистрация
                                        </a></li>
                                    <li class=" last"><a href="https://livedemo00.template-help.com/magento_50897/customer/account/login/" title="Войти">Войти</a></li>
                                </ul>
                                <p class="welcome-msg">Добро пожаловать в наш интернет-магазин! </p>
                            </div>
                            <div class="clear"></div>
                            <h1 class="logo">
                                <strong>Агенство Диоген</strong>
                                <a href="{{ route('Home') }}" title='Агенство "Диоген"'>
                                    <img src="/public/images/logo.png" alt='Агенство "Диоген"'/>
                                </a>
                            </h1>
                            <div class="right_head">
                                <form id="search_mini_form" action="https://livedemo00.template-help.com/magento_50897/catalogsearch/result/" method="get">
                                    <div class="form-search">
                                        <label for="search">Search:</label>
                                        <input id="search" type="text" name="q" value="" class="input-text"/>
                                        <button type="submit" title="Поиск" class="button"><strong><i class="fa fa-search"></i></strong></button>
                                        <div id="search_autocomplete" class="search-autocomplete"></div>
                                    </div>
                                </form>
                                </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="nav-container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul id="nav" class="sf-menu">
                            <li class="level0 nav-1 first level-top">
                                <a href="https://livedemo00.template-help.com/magento_50897/new-constructions.html" class="level-top">
                                    <span>Новостройки</span>
                                </a>
                            </li>
                            <li class="level0 nav-2 @if(Route::is('Rent')) active @endif level-top">
                                <a href="{{ route('Rent') }}" class="level-top">
                                    <span>Аренда</span>
                                </a>
                            </li>
                            <li class="level0 nav-3 last @if(Route::is('Buy')) active @endif level-top parent">
                                <a href="https://livedemo00.template-help.com/magento_50897/sales.html" class="level-top">
                                    <span>Продажа</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        @yield('Top')
        @yield('Posts')

        <div class="footer-container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="footer">
                            <p id="back-top"><a href="#top"><span></span></a> </p>
                            <div class="footer-cols-wrapper">
                                <div class="footer-col">
                                    <h4>Информация</h4>
                                    <div class="footer-col-content">
                                        <ul>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/about-magento-demo-store">О компании</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/customer-service">Обслуживание клиентов</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/template-settings">Настройки шаблона</a></li>
                                            <li class="last privacy"><a href="https://livedemo00.template-help.com/magento_50897/privacy-policy-cookie-restriction-mode">Политика конфиденциальности</a></li>
                                        </ul> <ul class="links">
                                            <li class="first"><a href="https://livedemo00.template-help.com/magento_50897/catalog/seo_sitemap/category/" title="Карта сайта">Карта сайта</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/catalogsearch/term/popular/" title="Критерии поиска">Критерии поиска</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/catalogsearch/advanced/" title="Расширенный поиск">Расширенный поиск</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/sales/guest/form/" title="Заказы и возвраты">Заказы и возвраты</a></li>
                                            <li class=" last"><a href="https://livedemo00.template-help.com/magento_50897/contacts/" title="Обратная связь">Обратная связь</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <h4>Почему стоит купить</h4>
                                    <div class="footer-col-content">
                                        <ul>
                                            <li><a href="#">Доставка и возврат</a></li>
                                            <li><a href="#">Безопасные покупки</a></li>
                                            <li><a href="#">Международные перевозки</a></li>
                                            <li><a href="#">Партнеры</a></li>
                                            <li><a href="#">Группа продаж</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <h4>Мой акаунт</h4>
                                    <div class="footer-col-content">
                                        <ul>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/customer/account/login/">Войти</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/checkout/cart/">Просмотр корзины</a></li>
                                            <li><a href="https://livedemo00.template-help.com/magento_50897/wishlist/">Мои предпочтения</a></li>
                                            <li><a href="#">Мой заказ</a></li>
                                            <li><a href="#">Помощь</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col last">
                                    <h4>Следите за нами</h4>
                                    <div class="footer-col-content">
                                        <ul>
                                            <li><a href="#">Facebook</a></li>
                                            <li><a href="#">Twitter</a></li>
                                            <li><a href="#">RSS</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script type="text/javascript" src="/public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/public/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/public/js/superfish.js"></script>
<script type="text/javascript" src="/public/js/scripts.js"></script>
<script type="text/javascript" src="/public/js/media1.js"></script>

<script type="text/javascript" src="/public/js/camera.js"></script>
-->
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
</script>
<script type="text/javascript">var mdate = new Date(); document.write(mdate.getFullYear());</script>
</body>
</html>