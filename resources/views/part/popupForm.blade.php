<form class="popupbox" id="popuprel" name="orderForm" action="javascript:void(null);" method="post"
      onsubmit="apply('{{ route('message') }}', '{{ csrf_token() }}')">
    <span class="title">Оставить заявку</span>
    <div class="white">
        <p><input name="name" id="name" placeholder="Ваше Имя" type="text" class="input-text"></p>
        <p>
            <span class="telStr">
                <strong>+375</strong>
                <select name="kod" id="kod" style="">
                    <option value="29">29</option>
                    <option value="44">44</option>
                    <option value="25">25</option>
                    <option value="33">33</option>
                </select>
                <input type="text" name="phone" placeholder="Телефон" class="tel">
            </span>
        </p>
        <p><input name="email" id="email" placeholder="E-mail" type="text" class="input-text"></p>
        <span>Комментарий</span>
        <div id="comm">
            <textarea name="commment" id="comment"></textarea>
        </div>
        <input type="hidden" id="post_id" name="id" value="">
        <hr>
        {{csrf_field()}}
        <button  class="button" type="submit"><span><span>Отправить</span></span></button>
    </div>

</form>
<div id="fade"></div>