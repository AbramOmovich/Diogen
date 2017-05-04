<?php  ?>
<div class="toolbar">
    <div class="pager">
        <p class="amount">
            Позиции с {{ $Posts->firstItem() }} по {{ $Posts->lastItem() }} из {{ $Posts->total() }}  </p>
        <div class="limiter">
            <label>Показать</label>

            <select id="pager" onchange="setLocation(this.value)">
                @foreach($pagination_vars as $var)
                    <option value="{{ route(Route::currentRouteName(),['paginate' => $var ,'sort' => $sort, 'ord' => $ord, 'filter' => Request::input('filter',[]), 'query' => Request::input('query',[]) ]) }}" @if($var == $paginate) selected @endif>{{ $var }}</option>
                @endforeach
            </select> </div>

        <div class="pages">
            {{ $Posts->withPath(Request::fullUrl()) }}
        </div>

    </div>
    <div class="sorter">
        <div class="sort-by">
            <label>Тип сортировки</label>
            <select onchange="setLocation(this.value)">
                @foreach($sort_vars as $title => $var)
                    <option value="{{ route(Route::currentRouteName(),['paginate' => $paginate ,'sort' => $var['field'] , 'ord' => $var['ord'], 'filter' => Request::input('filter',[]), 'query' => Request::input('query',[])]) }}" @if($sort == $var['field'] && $ord == $var['ord']) selected @endif> {{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>