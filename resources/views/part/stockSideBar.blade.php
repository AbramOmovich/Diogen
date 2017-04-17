<?php $filter = Request::input('filter',[]); ?>

<div class="col-right sidebar col-xs-12 col-sm-3">
    <div class="block block-layered-nav first">
        <div class="block-title">
            <strong><span>Фильтр</span></strong>
            <span class="toggle"></span></div>
        <div class="block-content">
            <form action="{{ Request::url() }}" method="get">
            <p class="block-subtitle">Доступные параметры</p>
                <button style="padding-bottom: 15px" type="submit" class="button"><span><span>Подобрать</span></span></button>
                <dl id="narrow-by-list">
                <dt class="odd">Цена</dt>
                <dd class="odd">
                    <?php
                        if (isset($filter['dwelling_type_id'])) $types = $filter['dwelling_type_id'];
                        else $types = [];
                    ?>
                    <ol>
                        @foreach(\App\DwellingType::all() as $type)
                            <li>
                                <input type="checkbox" name="filter[dwelling_type_id][]" value="{{ $type->dwelling_id }}" @if(in_array( $type->dwelling_id,$types)) checked @endif >
                                <a>{{ $type->title }}</a>
                            </li>
                        @endforeach
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
            </dl>
            </form>
        </div>
    </div>

</div>