<form class="popupbox" id="popuprel" name="orderForm" action="javascript:void(null);" method="post"
      onsubmit="apply('{{ route('message') }}', '{{ csrf_token() }}')">
    <span class="title">Оставить заявку</span>
    <div class="white">
        @if(!Auth::check())
            <p>
                <em class="require">*</em>
                <input name="name" id="name" placeholder="Ваше Имя" type="text" class="input-text">
            </p>
            <p>
                <em class="require">*</em>
            <span class="telStr">
                <strong>+375</strong>
                <select name="code" id="code" style="">
                    <option value="29">29</option>
                    <option value="44">44</option>
                    <option value="25">25</option>
                    <option value="33">33</option>
                </select>
                <input type="text" name="phone" placeholder="Телефон" class="tel">
            </span>

        </p>
            <p><input name="email" id="email" placeholder="E-mail" type="text" class="input-text"></p>
        @endif
        <span>Комментарий</span>
        <div id="comm">
            <textarea name="comment" id="comment"></textarea>
        </div>
        <input type="hidden" id="post_id" name="id" value="">
        <hr>
            <i class="require remark" >* обязательные поля</i>
        {{csrf_field()}}
        <button  class="button" type="submit"><span><span>Отправить</span></span></button>
    </div>

</form>
<div id="fade"></div>