<?php $filter = Request::input('filter',[]); ?>

<div class="col-right sidebar col-xs-12 col-sm-3">
    <div class="block block-layered-nav first">
        <div class="block-title">
            <strong><span>Фильтр</span></strong>
            <span class="toggle"></span></div>
        <div class="block-content">

            <form id="filter_form" action="{{ Request::url() }}" method="get">
            <p class="block-subtitle">Доступные параметры</p>
                <button style="padding-bottom: 15px" type="submit" class="button"><span><span>Подобрать</span></span></button>
            <dl id="narrow-by-list">
                <dt class="odd">Местоположение</dt>
                <dd class="odd">
                    <table>
                        <tr style="">
                            <td style="padding-right: 15px;padding-bottom: 10px; color: #2c2c2c">Область</td>
                            <td>
                                <select onchange="getCities(this.value,'cities')" style="width: 150px" name="filter[region]" id="region">
                                    <option value="">Все области</option>
                                    @foreach(\App\Region::all() as $region)
                                        <option value="{{ $region->region_id }}" @if( isset($filter['region']) && $region->region_id == $filter['region']) selected @endif>{{ $region->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #2c2c2c; width: 50px">
                                Город
                            </td>
                            <td>
                                <select id="cities" style="width: 150px"  name="filter[city]">
                                    <option value="">Все города</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                </dd>
                <dt class="odd">Цена</dt>
                <dd class="odd">
                    <ol>
                        <li>
                            <input style="width: 35%" class="input-text" value="@if(isset($filter['price']['min'])){{ $filter['price']['min'] }}@endif" type="number" name="filter[price][min]"><a style="padding-left: 10px">Минимальная </a>
                        </li>
                        <li>
                            <input style="width: 35%" class="input-text" value="@if(isset($filter['price']['max'])){{ $filter['price']['max'] }}@endif" type="number" name="filter[price][max]"><a style="padding-left: 10px">Максимальная </a>
                        </li>
                    </ol>
                </dd>
                <dt class="odd">Тип</dt>
                <dd class="odd">
                    <?php
                        if (isset($filter['dwelling_type_id'])) $types = $filter['dwelling_type_id'];
                        else $types = [];
                    ?>
                    <ol>
                        @foreach(\App\DwellingType::all() as $type)
                            <li>
                                <input  type="checkbox" name="filter[dwelling_type_id][]" value="{{ $type->dwelling_id }}" @if(in_array( $type->dwelling_id,$types)) checked @endif >
                                <a>{{ $type->title }}</a>
                            </li>
                        @endforeach
                    </ol>
                </dd>
                <dt class="odd">Площадь</dt>
                <dd class="odd">
                    <ol>
                        <li>
                            <input style="width: 35%" class="input-text" value="@if(isset($filter['square']['min'])){{ $filter['square']['min'] }}@endif" type="number" name="filter[square][min]"><a style="padding-left: 10px">Минимальная </a>
                        </li>
                        <li>
                            <input style="width: 35%" class="input-text" value="@if(isset($filter['square']['max'])){{ $filter['square']['max'] }}@endif" type="number" name="filter[square][max]"><a style="padding-left: 10px">Максимальная </a>
                        </li>
                    </ol>
                </dd>
                <dt class="odd">Комнаты</dt>
                <dd class="odd">
                    <?php
                        if (isset($filter['rooms'])) $rooms = $filter['rooms'];
                        else $rooms = [];
                    ?>
                    <ol>
                        @for($i= 1; $i < 6; $i++)
                        <li>
                            <input type="checkbox" name="filter[rooms][]" value="{{ $i }}" @if(in_array( $i,$rooms)) checked @endif >
                            <a>( @if($i == 5)4+@else{{ $i }}@endif () )</a>
                        </li>
                        @endfor
                    </ol>
                </dd>
                <dt class="odd">Дополнительно</dt>
                <dd class="odd">
                    <ol>
                        <li>
                            <input type="checkbox" name="filter[additional][middle]" value=1 @if(isset($filter['additional']['middle'])) checked @endif>
                            <a>Не первый и не послежний этаж</a>
                        </li>
                        <li>
                            <input type="checkbox" name="filter[additional][balcony]" value=1 @if(isset($filter['additional']['balcony'])) checked @endif>
                            <a>Балкон</a>
                        </li>
                        <li>
                            <input type="checkbox" name="filter[additional][parking]" value=1 @if(isset($filter['additional']['parking'])) checked @endif>
                            <a>Парковочное место</a>
                        </li>
                        <li>
                            <input type="checkbox" name="filter[additional][internet]" value=1 @if(isset($filter['additional']['internet'])) checked @endif>
                            <a>Интернет</a>
                        </li>
                    </ol>
                </dd>
            </dl>
            </form>
        </div>
    </div>
</div>

@section('javascript')
    <script>
        region = document.getElementById('region').value;
        if (region){
            city = "@if(isset($filter['city'])){{ $filter['city'] }}@else{{ '' }}@endif" ;

            getCities(region,'cities', "{{csrf_token()}}", city);
        }
    </script>
@endsection