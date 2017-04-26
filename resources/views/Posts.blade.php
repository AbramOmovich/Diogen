@extends('Main')

@section('Posts')

    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    @include('part.banners')
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
                                            <div class="parentbox">
                                                <a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}">
                                                @if(!$post->hasPhotos())
                                                    <img class="cover" src="/public/images/nophoto.png" alt="{{ $post->title() }}"/>
                                                @else
                                                    <img class="cover" src="{{$post->getPhotos()[0]}}" alt="{{ $post->title() }}"/>
                                                @endif
                                                </a>
                                            </div>
                                            <div class="product-shop">
                                                <h3 class="product-name">
                                                    <a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}">{{ $post->title() }}</a>
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
                                            <a href="#">
                                                <div class="ban_img"><img src="/public/images/banner_bottom.jpg" alt=""/></div>
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