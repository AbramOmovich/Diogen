<div class="field">
    <label for="{{ $name }}" class="required">@if(!isset($optional))<em>*</em>@endif{{ $title }}</label>
    <div class="input-box">
        <input id="{{ $name }}" type="@if(isset($fieldType)){{ $fieldType }}@else{{ 'text' }}@endif" title="{{ $title }}" name="{{$name}}" value="@if(old($name)){{ old($name) }}@else{{ $data }}@endif" class="input-text  required-entry form-control @if($errors->has($name)) validation-failed @endif ">
        @if($errors->has($name))
            <div class="validation-advice"><p>{{ $errors->first($name) }}</p></div>
        @endif
    </div>
</div>