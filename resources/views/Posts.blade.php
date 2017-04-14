@extends('Main')


@section('Posts')

    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="banners_row">
                        <div class="banner ban1">
                            <div class="ban_img"><img src="/public/images/banner1.jpg" alt=""></div>
                            <div class="ban_sale">Sale</div>
                            <div class="ban_wrap">
                                <a href="https://livedemo00.template-help.com/magento_50897/new-constructions.html/" class="view_details">Details</a>
                                <div class="ban_price">$4 340 000</div>
                            </div>
                        </div>
                        <div class="banner ban2">
                            <div class="ban_img"><img src="/public/images/banner2.jpg" alt=""></div>
                            <div class="ban_wrap">
                                <a href="/public/images/banner3.jpg" class="view_details">Details</a>
                                <div class="ban_price">$2 520 000</div>
                            </div>
                        </div>
                        <div class="banner ban3">
                            <div class="ban_img"><img src="https://livedemo00.template-help.com/magento_50897/skin/frontend/default/theme288k/images/banner3.jpg" alt=""></div>
                            <div class="ban_sale">Sale</div>
                            <div class="ban_wrap">
                                <a href="/public/images/banner3.jpg" class="view_details">Details</a>
                                <div class="ban_price">$3 740 000</div>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="main">
                        <div class="col-main">
                            <div class="padding-s">

                                <div class="page-title category-title">
                                    <h1> {{ $title }}</h1>
                                </div>
                                <?php $i = 0; ?>
                                <ul class="products-grid row">
                                    @foreach($Posts as $post)
                                        <li class="item col-xs-3 first">
                                            <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}" class="product-image">
                                                <img src="/public/images/single_family_colonial_1.png" alt="{{ $post->title }}"/>
                                            </a>
                                            <div class="product-shop">
                                                <h3 class="product-name">
                                                    <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                                                </h3>
                                                <div class="price-box">
                    <span class="regular-price" id="product-price-12-new">
                        <span class="price">{{ separate($post->price) }} $</span> </span>
                                                </div>
                                                <div class="actions">
                                                    <button type="button" title="Оставить заявку" class="button btn-cart" onclick="setLocation('https://livedemo00.template-help.com/magento_50897/checkout/cart/add/uenc/aHR0cDovL2xpdmVkZW1vMDAudGVtcGxhdGUtaGVscC5jb20vbWFnZW50b181MDg5Ny8,/product/20/form_key/idv4jCPEF6GnUqh2/')"><span><span>Оставить заявку</span></span></button>

                                                </div>
                                            </div>
                                        </li>
                                        <?php $i++ ?>
                                        @if($i %4 == 0)
                                </ul>
                                <ul class="products-grid row">
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="std"><div class="banner_bottom_wrap">
                                        <div class="banner_bottom">
                                            <a href="https://livedemo00.template-help.com/magento_50897/rentals.html/">
                                                <div class="ban_img"><img src="https://livedemo00.template-help.com/magento_50897/skin/frontend/default/theme288k/images/banner_bottom.jpg" alt=""/></div>
                                                <div class="ban_wrap">Жильё вашей мечты</div>
                                            </a>
                                        </div>
                                    </div></div> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection