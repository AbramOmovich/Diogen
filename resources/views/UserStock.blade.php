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
                                                <a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}" class="product-image"><img src="/public/images/{{ $post->photo }}" alt="{{ $post->title() }}"></a>
                                                <div class="product-shop">
                                                    <div class="f-fix">
                                                        <div class="list-left">
                                                            <h2 class="product-name" ><a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}">{{ $post->title() }}</a></h2>
                                                            <div class="desc std">
                                                                {{ $post->description }}
                                                                <a href="{{ route('post', ['id' => $post->id]) }}" title="{{ $post->title() }}">Узнать больше</a>
                                                            </div>
                                                        </div>
                                                        <div class="list-right">
                                                            <div class="price-box">
<span class="regular-price" id="product-price-7">
<span class="price">{{ separate($post->price) }} $</span> </span>
                                                            </div>
                                                            <form action="{{ route('userPosts') }}" method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="post_id" value="{{  $post->id }}">
                                                                <button type="submit" name="action" value="delete" title="Удалить" class="btn btn-danger"><span><span>Удалить</span></span></button>
                                                                <br>
                                                                <br>
                                                                <button type="submit" name="action" value="edit" title="Редактировать" class="btn btn-warning"><span><span>Редактировать</span></span></button>
                                                            </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection