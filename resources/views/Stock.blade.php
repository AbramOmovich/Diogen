@extends('Main')

@section('title')
    | {{ $pageTitle }}
@endsection

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
                                        <h1>{{ $pageTitle }}</h1>
                                    </div>
                                    @if(!$Posts->total())
                                       <h1>К сожалению, по вашему запросу ничего не найдено</h1>
                                    @else
                                        <div class="category-products">
                                        @include('part.pageToolbar')

                                        <ol class="products-list" id="products-list">
                                            @foreach($Posts as $post)
                                            <li class="item">
                                                <div class="parentbox-stock">
                                                    <a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}" class="product-image">
                                                        <img src="@if($post->hasPhotos()){{ $post->getPhotos()[0] }}@else{{'/public/images/nophoto.png'}}@endif" class="cover-stock" alt="{{ $post->title() }}">
                                                    </a>
                                                </div>
                                                <div class="product-shop">
                                                    <div class="f-fix">
                                                        <div class="list-left">
                                                            <h2 class="product-name" ><a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}">{{ $post->title() }}</a></h2>
                                                            <div class="desc std">
                                                                {{ $post->description }}
                                                                <a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}" class="link-learn">Узнать больше</a>
                                                            </div>
                                                        </div>
                                                        <div class="list-right">
                                                            <div class="price-box">
<span class="regular-price" id="product-price-7">
<span class="price">{{ separate($post->price) }} $</span> </span>
                                                            </div>
                                                            <button type="button" rel="popuprel" title="Отправить заявку" value="{{ $post->id }}" class="button btn-cart popup" onclick="$('#post_id').val(this.value)" ><span><span>Отправить заявку</span></span></button>
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
                                    @endif
                                </div>
                            </div>
                            @include('part.stockSideBar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('part.popupForm')
@endsection

@section('javascript')
@endsection