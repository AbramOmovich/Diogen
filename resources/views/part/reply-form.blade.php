<form style="display: none" id="reply-form" action="javascript:void(null);" name="qqqq" method="post"
      onsubmit="replyToUser($(this).attr('id'),'{{ route('reply') }}');$(this).remove()">
    <input type="hidden" name="id" value="" >
    <textarea name="reply" id="" cols="50" rows="3" class="reply"></textarea><br>
    <button type="submit" class="button"><span><span>Отправить</span></span></button>
</form>