@extends('Main')

@section('title')
    | {{ $Post->title() }}
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
                                    <div class="product-view">
                                        <div class="product-essential">
                                            <div class="product-img-box">

                                                <div class="product-box-customs">
                                                    @if(!$Post->hasPhotos())
                                                    <div>
                                                        <a href="/public/images/nophoto.png">
                                                            <img class="big" src="/public/images/nophoto.png" alt="" title="Фото отсутствует">
                                                        </a>
                                                    </div>
                                                    @else

                                                    <div class="more-views">
                                                        <div class="container-slider">
                                                            <ul class="slider tumbSlider-none">
                                                                @foreach($Post->getPhotos() as $photoUrl)
                                                                <li>
                                                                    <a href="{{ $photoUrl }}" class="cloud-zoom-gallery" title="{{ $Post->title() }}" >
                                                                        <img src="{{ $photoUrl }}" alt="">
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="product-shop">
                                                    <div class="product-name">
                                                        <h1 style="color: #5c5c5c;">{{ $Post->title() }}</h1>
                                                        <div class="pull-right" style="text-align: right ;font-size: medium; color: #ee2d54;"><p> {{ $Post->type->title }} </p><br>
                                                            <p>{{ $Post->dwellingType->title }}</p></div>
                                                    </div>
                                                    <hr>
                                                    <div class="price-box">
                                                        <span class="regular-price" id="product-price-6">
<span class="price">{{ separate($Post->price) }} $</span> </span>

                                                    </div>
                                                    <div class="clear"></div>
                                                    <h2>Краткая информация</h2>
                                                    <div class="short-description">
                                                        <div class="std">
                                                            {{ $Post->description }}
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="add-to-box">
                                                        <div class="add-to-cart">
                                                            <div class="qty-block">
                                                                @php(setlocale(LC_TIME, 'Russian'))
                                                                <label> Добавленно: {{ iconv('windows-1251', 'utf-8',$Post->created_at->formatLocalized('%d %B %Y') )  }}</label>
                                                            </div>
                                                            <button type="button" title="Отправить заявку" class="button btn-cart popup" rel="popuprel" onclick="$('#post_id').val({{$Post->id}})"><span><span>Отправить заявку</span></span></button>
                                                            @if(Auth::check())
                                                            @if(Auth::user()->role_id === 2)
                                                                <br>
                                                                <br>
                                                                <form action="{{ route('deletePost') }}" method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="post_id" value="{{  $Post->id }}">
                                                                    <button class="btn btn-danger" style="margin-right: 50px">Удалить</button>
                                                                </form>
                                                                <a href="{{ route('editPost', ['id' => $Post->id ]) }}" class="btn btn-warning">Редактировать</a>
                                                            @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="product-collateral">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="width: 39%;">
                                                        <div>
                                                            <h2>Контакты</h2>
                                                            <div class="pull-left" style="height: 75px ;color: #2c2c2c; font-size: large;"><p style="margin-left: 15px">{{ $Post->user->firstName }}</p>
                                                                <br>
                                                                <button type="button" id="showBtn" title="Показать контакты" class="btn btn-warning" onclick="showContacts()"><span><span>Показать контакты</span></span></button>
                                                            </div>
                                                            <div id="contacts" style="display: none; color: #2c2c2c; font-size: medium; padding-left: 150px" >
                                                                <ul>
                                                                    @foreach($Post->user_phone as $phone)
                                                                        <li style="padding-bottom: 5px"><p>{{ $phone->phone }}</p></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div >
                                                            <h2>Адрес</h2>
                                                            <div class="">
                                                                <table style="color: #4c4c4c; font-size: medium; margin: 10px;">
                                                                    <tr>
                                                                        <td class="" style="padding: 5px">Улица: </td><td style="padding: 5px">{{ $Post->address->street }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="" style="padding: 5px">Дом: </td><td style="padding: 5px">{{ $Post->address->house }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="" style="padding: 5px">Город: </td><td style="padding: 5px">{{ $Post->address->city->name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="" style="padding: 5px">Область: </td><td style="padding: 5px">{{ $Post->address->city->region->title }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            @if(!is_null($Post->details))
                                            <div class="box-collateral box-description">
                                                <h2>Подробности</h2>
                                                    <div style="float: left; color: #2c2c2c; font-size: medium; width: 100%">
                                                        @foreach($Post->details->toArray() as $key => $detail)
                                                            @if($key != 'floor_max' && (!is_null($detail)))
                                                                <div style="display: inline-block; padding: 10px">
                                                                    <div style="padding-bottom: 5px">
                                                                        {{ $details_types[$key]['title'] }}
                                                                    </div>
                                                                    <div style="text-align: center">
                                                                        @if ($details_types[$key]['general'] == 1)
                                                                            @if($detail == 0) Нет
                                                                            @else Да
                                                                            @endif
                                                                        @else
                                                                            @if($key == 'floor') {{ $Post->floor() }}
                                                                            @else {{ $detail }}
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif


                                            @if(Auth::check())
                                            <div class="box-collateral form-add">
                                                <h2>Напишите ваш собственный отзыв<span class="toggle opened"></span></h2>
                                                <div class="box-collateral-content" style="display: block;">
                                                    <form action="{{ route('addComment', ['id' => Route::current()->id ] )}}" method="post" id="review-form">
                                                        {{ csrf_field() }}
                                                        <fieldset>
                                                            <ul class="form-list">
                                                                <li style="width: 60%">
                                                                    <label for="review_field" class="required">Комментарий</label>
                                                                    <div class="input-box">
                                                                        <textarea style="height: 100%" name="comment" id="review_field" rows="3" class="required-entry form-control @if($errors->has('comment')) validation-failed @endif">{{ old('comment') }}</textarea>
                                                                        @if($errors->has('comment'))
                                                                            <div class="validation-advice"><p>{{ $errors->first('comment') }}</p></div>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </fieldset>
                                                        <div class="buttons-set pull-left">
                                                            <button type="submit" title="Добавить коментарий" class="button"><span><span>Добавить коментарий</span></span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            @endif
                                            <br><br><br>
                                            @if(!$Post->comments->isEmpty())
                                            <div class="box-collateral box-reviews" id="customer-reviews">
                                                <h2>Отзывы пользователей</h2>
                                                <br>
                                                <div class="box-collateral-content" style="padding-left: 3%; padding-right: 15%">
                                                    <dl>
                                                        @foreach($Post->comments as $comment)
                                                            <dt>
                                                                <a href="#">{{ $comment->user->firstName }}</a></dt>
                                                            <dd>
                                                                {{ $comment->text }}<br><small class="date">(Отзыв написан {{ $comment->created_at }})</small>
                                                            </dd>
                                                        @endforeach
                                                    </dl>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('part.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('part.popupForm')
@endsection