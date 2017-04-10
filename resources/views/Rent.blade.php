@extends('Main')

@section('Posts')
    <div class="main-container col2-right-layout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="main">
                        <div class="row">
                            <div class="col-main col-xs-12 col-sm-9">
                                <div class="padding-s">
                                    <div class="page-title category-title">
                                        <h1>Аренда</h1>
                                    </div>

                                    <div class="category-products">
                                        @include('part.pageToolbar')

                                        <ol class="products-list" id="products-list">
                                            @foreach($Posts as $post)
                                            <li class="item">
                                                <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}" class="product-image"><img src="/public/images/{{ $post->photo }}" alt="{{ $post->title }}"></a>
                                                <div class="product-shop">
                                                    <div class="f-fix">
                                                        <div class="list-left">
                                                            <h2 class="product-name"><a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a></h2>
                                                            <div class="desc std">
                                                                {{ $post->short_description }}
                                                                <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}">Узнать больше</a>
                                                            </div>
                                                        </div>
                                                        <div class="list-right">
                                                            <div class="price-box">
<span class="regular-price" id="product-price-7">
<span class="price">{{ separate($post->price) }} $</span> </span>
                                                            </div>
                                                            <button type="button" title="Отправить заявку" class="button btn-cart" onclick="setLocation('')"><span><span>Отправить заявку</span></span></button>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                        <div class="toolbar-bottom">
                                            @include('part.pageToolbar')
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-right sidebar col-xs-12 col-sm-3">
                                <div class="block block-layered-nav first">
                                    <div class="block-title">
                                        <strong><span>Фильтр</span></strong>
                                        <span class="toggle"></span></div>
                                    <div class="block-content">
                                        <p class="block-subtitle">Доступные параметры</p>
                                        <dl id="narrow-by-list">
                                            <dt class="odd">Цена</dt>
                                            <dd class="odd">
                                                <ol>
                                                    <li>
                                                        <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?price=-10000000"><span class="price">0,00&nbsp;$</span> - <span class="price">9&nbsp;999&nbsp;999,99&nbsp;$</span></a>
                                                        (2)
                                                    </li>
                                                    <li>
                                                        <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?price=10000000-"><span class="price">10&nbsp;000&nbsp;000,00&nbsp;$</span> and above</a>
                                                        (4)
                                                    </li>
                                                </ol>
                                            </dd>
                                            <dt class="odd">Rooms</dt>
                                            <dd class="odd">
                                                <ol>
                                                    <li>
                                                        <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?room=11">3</a>
                                                        (3)
                                                    </li>
                                                    <li>
                                                        <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?room=10">4</a>
                                                        (1)
                                                    </li>
                                                    <li>
                                                        <a href="https://livedemo00.template-help.com/magento_50897/rentals.html?room=9">5+</a>
                                                        (2)
                                                    </li>
                                                </ol>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection