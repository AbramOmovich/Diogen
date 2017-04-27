<div class="field">
    <label for="{{ $name }}">{{ $title }}</label>
    <div class="input-box">
        <select id="{{ $name }}" name="{{ $name }}" title="{{ $title }}" class="form-control @if($errors->has($name)) validation-failed @endif " >
            @if( old($name) === "-1")
                <option value="-1" selected >Выбрать</option>
                <option value="1" >Да</option>
                <option value="0" >Нет</option>
            @else
                <option value="-1">Выбрать</option>
                <option value="1" @if(!is_null(old($name))) @if(old($name) === "1") selected @endif @else @if($data === 1) selected @endif @endif>Да</option>
                <option value="0" @if(!is_null(old($name))) @if(old($name) === "0") selected @endif @else @if($data === 0) selected @endif @endif>Нет</option>
            @endif
        </select>
        @if($errors->has($name))
            <div class="validation-advice"><p>{{ $errors->first($name) }}</p></div>
        @endif
    </div>
</div>