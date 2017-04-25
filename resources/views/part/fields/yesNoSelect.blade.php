<div class="field">
    <label for="{{ $name }}">{{ $title }}</label>
    <div class="input-box">
        <select id="{{ $name }}" name="{{ $name }}" title="{{ $title }}" class="form-control @if($errors->has($name)) validation-failed @endif " >
            <option value="">Выбрать</option>
            <option value="1" @if(old($name) === "1") selected @endif>Да</option>
            <option value="0" @if(old($name) === "0") selected @endif>Нет</option>
        </select>
        @if($errors->has($name))
            <div class="validation-advice"><p>{{ $errors->first($name) }}</p></div>
        @endif
    </div>
</div>