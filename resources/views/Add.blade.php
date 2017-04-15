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
                                    <div class="page-title">
                                        <h1>Подать объявление</h1>
                                    </div>
                                    <ol class="opc" id="checkoutSteps">
                                        <li id="opc-billing" class="section allow active">
                                            <div id="checkout-step-billing" class="step a-item">
                                                <form action="{{ route('make') }}" method="post">
                                                    {{ method_field('put') }}
                                                    <fieldset>
                                                        <ul class="form-list">
                                                            <li id="billing-new-address-form">
                                                                <fieldset>
                                                                    <h2 class="legend">Общая информация об объекте</h2>
                                                                    <hr>
                                                                    <ul>
                                                                        <li class="wide">
                                                                            <label for="title" class="required"><em>*</em>Заголовок</label>
                                                                            <div class="input-box">
                                                                                <input type="text" title="Заголовок" name="title" id="title" value="{{ old('title') }}" class="input-text  required-entry form-control @if($errors->has('title') || $errors->has('slug')) validation-failed @endif ">
                                                                                @if($errors->has('title'))
                                                                                    <div class="validation-advice"><p>{{ $errors->first('title') }}</p></div>
                                                                                @else
                                                                                    @if($errors->has('slug'))
                                                                                    <div class="validation-advice"><p>{{ $errors->first('slug') }}</p></div>
                                                                                    @endif
                                                                                @endif
                                                                            </div>
                                                                        </li>
                                                                        <li class="wide">
                                                                            <label for="description" class="required"><em>*</em>Краткое описание</label>
                                                                            <div class="input-box">
                                                                                <textarea name="description" id="description" class="required-entry form-control short @if($errors->has('description')) validation-failed @endif ">{{ old('description') }}</textarea>
                                                                                @if($errors->has('description'))
                                                                                    <div class="validation-advice"><p>{{ $errors->first('description') }}</p></div>
                                                                                @endif
                                                                            </div>
                                                                        </li>

                                                                        <h2 class="legend">Вид Обявления</h2>
                                                                        <hr>
                                                                        <li class="fields">
                                                                            <div class="field">
                                                                                <label for="type" class="required"><em>*</em>Вид объявления</label>
                                                                                <div class="input-box">
                                                                                    <select id="type" name="type" title="Вид объявления" class="form-control @if($errors->has('type')) validation-failed @endif " >
                                                                                        <option value="">Пожалуйста, выберите тип объявления</option>
                                                                                        @foreach(\App\PostType::all() as $type)
                                                                                            <option value="{{ $type->id }}" @if(old('type') == $type->id) selected @endif>{{ $type->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @if($errors->has('type'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('type') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                    <label for="dwelling_type" class="required"><em>*</em>Вид объекта</label>
                                                                                    <div class="input-box">
                                                                                        <select id="dwelling_type" name="dwelling_type" title="Вид объявления" class="form-control @if($errors->has('dwelling_type')) validation-failed @endif " >
                                                                                            <option value="">Пожалуйста, выберите вид объекта</option>
                                                                                            @foreach(\App\DwellingType::all() as $type)
                                                                                                <option value="{{ $type->id }}" @if(old('dwelling_type') == $type->id) selected @endif>{{ $type->title }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        @if($errors->has('dwelling_type'))
                                                                                            <div class="validation-advice"><p>{{ $errors->first('dwelling_type') }}</p></div>
                                                                                        @endif
                                                                                    </div>
                                                                            </div>
                                                                        </li>

                                                                        <h2 class="legend">Адрес объекта</h2>
                                                                        <hr>
                                                                        <li class="fields">
                                                                            <div class="field">
                                                                                <label for="street" class="required"><em>*</em>Улица</label>
                                                                                <div class="input-box">
                                                                                    <input type="text" title="Улица" name="street" value="{{ old('street') }}" class="input-text  required-entry form-control @if($errors->has('street')) validation-failed @endif ">
                                                                                    @if($errors->has('street'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('street') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="house" class="required"><em>*</em>Дом</label>
                                                                                <div class="input-box">
                                                                                    <input type="text" title="Дом" name="house" value="{{ old('house') }}" class="input-text  required-entry form-control @if($errors->has('house')) validation-failed @endif ">
                                                                                    @if($errors->has('house'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('house') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="city" class="required"><em>*</em>Город</label>
                                                                                <div class="input-box">
                                                                                    <input type="text" title="Город" name="city" value="{{ old('city') }}" class="input-text  required-entry form-control @if($errors->has('city')) validation-failed @endif ">
                                                                                    @if($errors->has('city'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('city') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="region" class="required"><em>*</em>Область</label>
                                                                                <div class="input-box">
                                                                                    <select id="region" name="region" title="Область" class="form-control @if($errors->has('region')) validation-failed @endif " >
                                                                                        <option value="">Пожалуйста, выберите область</option>
                                                                                        @foreach(\App\Region::all() as $region)
                                                                                            <option value="{{ $region->id }}" @if(old('region') == $region->id) selected @endif>{{ $region->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @if($errors->has('region'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('region') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <h2 class="legend">Подробности</h2>
                                                                        <hr>
                                                                        <li class="fields">
                                                                            <div class="field">
                                                                                <label for="square">Площадь</label>
                                                                                <div class="input-box">
                                                                                    <input type="text" title="Площадь" id="square" name="square" value="{{ old('square') }}" class="input-text  required-entry form-control @if($errors->has('square')) validation-failed @endif ">
                                                                                    @if($errors->has('square'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('square') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="floor">Этаж</label>
                                                                                <div class="input-box">
                                                                                    <input type="number" title="Этаж" name="floor" value="{{ old('floor') }}" class="input-text  required-entry form-control @if($errors->has('floor')) validation-failed @endif ">
                                                                                    @if($errors->has('floor'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('floor') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="rooms">Количество комнат</label>
                                                                                <div class="input-box">
                                                                                    <input type="number" title="Количество комнат" name="rooms" value="{{ old('rooms') }}" class="input-text  required-entry form-control @if($errors->has('rooms')) validation-failed @endif ">
                                                                                    @if($errors->has('rooms'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('rooms') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="balcony">Наличие балкона</label>
                                                                                <div class="input-box">
                                                                                    <select id="balcony" name="balcony" title="Наличие балкона" class="form-control @if($errors->has('balcony')) validation-failed @endif " >
                                                                                        <option value="">Выбрать</option>
                                                                                        <option value="1">Да</option>
                                                                                        <option value="0">Нет</option>
                                                                                    </select>
                                                                                    @if($errors->has('balcony'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('balcony') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="parking">Наличие парковочного места</label>
                                                                                <div class="input-box">
                                                                                    <select id="parking" name="parking" title="Наличие парковочного места" class="form-control @if($errors->has('parking')) validation-failed @endif " >
                                                                                        <option value="">Выбрать</option>
                                                                                        <option value="1">Да</option>
                                                                                        <option value="0">Нет</option>
                                                                                    </select>
                                                                                    @if($errors->has('parking'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('parking') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="internet">Наличие интернета</label>
                                                                                <div class="input-box">
                                                                                    <select id="internet" name="internet" title="Наличие интернета" class="form-control @if($errors->has('internet')) validation-failed @endif " >
                                                                                        <option value="">Выбрать</option>
                                                                                        <option value="1">Да</option>
                                                                                        <option value="0">Нет</option>
                                                                                    </select>
                                                                                    @if($errors->has('internet'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('internet') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <h2 class="legend">Контакты</h2>
                                                                        <hr>

                                                                        <li class="fields">
                                                                            @if( !Auth::user()->phone->isEmpty())
                                                                            <div class="field">
                                                                                <label for="phone" class="required"><em>*</em>Телефон</label>
                                                                                <select name="phone[]" id="phone" multiple class="form-control @if($errors->has('phone')) validation-failed @endif">
                                                                                    @foreach(Auth::user()->phone as $phone)
                                                                                        <option value="{{ $phone->id }}">{{ $phone->phone }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @if($errors->has('phone'))
                                                                                    <div class="validation-advice"><p>{{ $errors->first('phone') }}</p></div>
                                                                                @endif
                                                                            </div>
                                                                            @endif
                                                                            <div class="field">
                                                                                <label for="phone_new" class="required">Телефон</label>
                                                                                <div class="input-box">
                                                                                    <input id="phone_new" type="text" name="phone_new" value="{{ old('phone_new') }}" title="Телефон" class="input-text  required-entry form-control" >
                                                                                </div>
                                                                            </div>

                                                                        </li>
                                                                        <br>

                                                                        <h2 class="legend">Стоимость</h2>
                                                                        <hr>
                                                                        <li class="fields">
                                                                            <div class="field">
                                                                                <label for="price" class="required"><em>*</em>Цена</label>
                                                                                <div class="input-box">
                                                                                    <input id="price" type="text" title="Цена" name="price" value="{{ old('price') }}" class="input-text  required-entry form-control @if($errors->has('price')) validation-failed @endif ">
                                                                                    @if($errors->has('price'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('price') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <label for=""> </label>
                                                                            <div class="field">
                                                                                <label for="currency" class="">Валюта</label>
                                                                                <div class="input-box">
                                                                                    <select id="currency" name="currency" class="form-control">
                                                                                        @foreach(\App\Currency::all() as $currency)
                                                                                            <option value="{{ $currency->id }}">{{ $currency->sign }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </fieldset>
                                                            </li>
                                                            <li>
                                                                <p class="required pull-left">* Обязательные поля</p>
                                                            </li>
                                                            {{ csrf_field() }}
                                                            <li>
                                                                <button type="submit" title="Отправить" class="button"><span><span>Отправить</span></span></button>
                                                            </li>
                                                        </ul>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-right sidebar col-xs-12 col-sm-3"><div id="checkout-progress-wrapper"><div class="block block-progress opc-block-progress last_block first">
                                        <div class="block-title">
                                            <strong><span>Стадия оформления заказа</span></strong>
                                            <span class="toggle"></span></div>
                                        <div class="block-content">
                                            <dl>
                                                <div id="billing-progress-opcheckout">
                                                    <dt>
                                                        Адрес плательщика</dt>
                                                </div>
                                                <div id="shipping-progress-opcheckout">
                                                    <dt>
                                                        Адрес доставки</dt>
                                                </div>
                                                <div id="shipping_method-progress-opcheckout">
                                                    <dt>
                                                        Метод доставки</dt>
                                                </div>
                                                <div id="payment-progress-opcheckout">
                                                    <dt>
                                                        Метод оплаты</dt>
                                                </div>
                                            </dl>
                                        </div>
                                    </div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection