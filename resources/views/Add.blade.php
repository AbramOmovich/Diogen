@extends('Main')

@section('css')
    <link rel="stylesheet" href="/public/css/dropzone.css">
@endsection

@section('Posts')
    <div class="main-container col2-right-layout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="main">
                        <div class="row">
                            <div class="col-main col-xs-12 col-sm-9" style="margin-left: 10%;">
                                <div class="padding-s">
                                    <div class="page-title">
                                        <h1>Подать объявление</h1>
                                    </div>
                                    <ol class="opc" id="checkoutSteps">
                                        <li id="opc-billing" class="section allow active">
                                            <div id="checkout-step-billing" class="step a-item">
                                                    <fieldset>
                                                        <ul class="form-list">
                                                            <form action="{{ route('make') }}" id="adv-form" method="post">
                                                                {{ method_field('put') }}
                                                            <li id="billing-new-address-form">
                                                                <fieldset>
                                                                    <h2 class="legend">Общая информация об объекте</h2>
                                                                    <hr>
                                                                    <ul>
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
                                                                                                <option value="{{ $type->dwelling_id }}" @if(old('dwelling_type') == $type->dwelling_id) selected @endif>{{ $type->title }}</option>
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
                                                                            @include('part.fields.input',['title' => 'Улица', 'name' => 'street'])
                                                                            @include('part.fields.input',['title' => 'Дом', 'name' => 'house'])
                                                                            <div class="field">
                                                                                <label for="region" class="required"><em>*</em>Область</label>
                                                                                <div class="input-box">
                                                                                    <select id="region" onchange="getCities(this.value,'city')" name="region" title="Область" class="form-control @if($errors->has('region')) validation-failed @endif " >
                                                                                        <option value="">Пожалуйста, выберите область</option>
                                                                                        @foreach(\App\Region::all() as $region)
                                                                                            <option value="{{ $region->region_id }}" @if(old('region') == $region->region_id) selected @endif>{{ $region->title }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @if($errors->has('region'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('region') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="city" class="required"><em>*</em>Город</label>
                                                                                <div class="input-box">
                                                                                    <select id="city" name="city" title="Город" class="form-control @if($errors->has('city')) validation-failed @endif " >
                                                                                        <option value="">Пожалуйста, выберите город</option>
                                                                                    </select>
                                                                                    @if($errors->has('city'))
                                                                                        <div class="validation-advice"><p>{{ $errors->first('city') }}</p></div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <h2 class="legend">Подробности</h2>
                                                                        <hr>
                                                                        <li class="fields">
                                                                            @include('part.fields.input',['title' => 'Площадь', 'name' => 'square', 'optional' => true])
                                                                            @include('part.fields.input',['title' => 'Количество комнат', 'name' => 'rooms', 'fieldType' => 'number', 'optional' => true])
                                                                            @include('part.fields.input',['title' => 'Этаж', 'name' => 'floor', 'fieldType' => 'number', 'optional' => true])
                                                                            @include('part.fields.input',['title' => 'Всего этажей', 'name' => 'floor_max', 'fieldType' => 'number', 'optional' => true])
                                                                            @include('part.fields.yesNoSelect',['title' => 'Наличие балкона', 'name' => 'balcony'])
                                                                            @include('part.fields.yesNoSelect',['title' => 'Наличие парковочного места', 'name' => 'parking'])
                                                                            @include('part.fields.yesNoSelect',['title' => 'Наличие интернета', 'name' => 'internet'])
                                                                        </li>

                                                                        <h2 class="legend">Контакты</h2>
                                                                        <hr>

                                                                        <li class="fields">
                                                                            @if( !Auth::user()->phone->isEmpty())
                                                                            <div class="field">
                                                                                <label for="phone" class="required"><em>*</em>Телефон</label>
                                                                                <select name="phone[]" id="phone" multiple class="form-control @if($errors->has('phone')) validation-failed @endif">
                                                                                    @foreach(Auth::user()->phone as $phone)
                                                                                        <option value="{{ $phone->id }}" @if(old('phone')) @if(in_array($phone->id,old('phone'))) selected @endif @endif>{{ $phone->phone }}</option>
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
                                                                            @include('part.fields.input',['title' => 'Цена', 'name' => 'price'])
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
                                                            {{ csrf_field() }}
                                                            </form>
                                                            <h2 class="legend">Фото</h2>
                                                            <hr>
                                                            <li>
                                                                <div style="width: 100%; margin-bottom: 20px">
                                                                    <form action="{{ route('upload-image') }}" method="post" enctype="multipart/form-data"
                                                                          class="dropzone"
                                                                          id="adv-dropzone">
                                                                    </form>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <p class="required pull-left">* Обязательные поля</p>
                                                            </li>
                                                            <li>
                                                                <button type="button" onclick="document.getElementById('adv-form').submit();" title="Отправить" class="button"><span><span>Отправить</span></span></button>
                                                            </li>

                                                        </ul>
                                                    </fieldset>

                                            </div>

                                        </li>
                                    </ol>
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
    <script>
        region = document.getElementById('region').value;
        if (region){
            city = "{{old('city')}}" ;

            getCities(region,'city', "{{csrf_token()}}", city);
        }
    </script>
    <script src="/public/js/dropzone.js"></script>
    <script>
        Dropzone.options.advDropzone = {
            headers: {
                'x-csrf-token': "{{ csrf_token() }}"
            },

            init: function() {
                this.on("complete", function(file) {
                    lastFile = file;
                    if( file.status == "success"){

                    }else if(file.status == "error"){
                        swal("Не удалось загрузить файл", "К сожалению, не удалось загрузить файл", "error")
                        this.removeFile(file);
                    }
                });

                this.on("removedfile", function (file) {
                    deleteFile(file.xhr.responseText);
                });
            },

            addRemoveLinks : true,
            dictDefaultMessage : "Нажмите для загрузки изображений",
            dictCancelUpload : "Отменить загрузку",
            dictRemoveFile : "Удалить изображение",
            paramName: 'image',
            acceptedFiles: 'image/*',
            maxFiles: 12,
        };
    </script>
    <script>
        function deleteFile(path) {
            jQuery.ajax({
                method: 'POST',
                url: '{{ route('delete-image') }}',
                data: {
                    path: path,
                    _token : "{{ csrf_token() }}"
                },
                success: function (data, textStatus, jqXHR) {
                },
                error:   function (jqXHR, textStatus, errorThrown) {
                }
            });
        }
    </script>
@endsection