
<div class="toolbar">
    <div class="pager">
        <p class="amount">
            Позиции с 1 по 5 из 6 </p>
        <div class="limiter">
            <label>Показать</label>
            <select id="pager" onchange="setLocation(this.value)">
                @foreach($pagination_vars as $var)
                    <option value="{{ route('Rent',['paginate' => $var ,'sort' => $sort, 'ord' => $ord]) }}" @if($var == $paginate) selected @endif>{{ $var }}</option>
                @endforeach
            </select> </div>
        <div class="pages">

            <strong>Страница:</strong>
            {{ $Posts->links() }}
        </div>
    </div>
    <div class="sorter">
        <div class="sort-by">
            <label>Тип сортировки</label>
            <select onchange="setLocation(this.value)">
                @foreach($sort_vars as $title => $var)
                    <option value="{{ route('Rent',['paginate' => $paginate ,'sort' => $var['field'] , 'ord' => $var['ord']]) }}" @if($sort == $var['field'] && $ord == $var['ord']) selected @endif> {{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>