// Обработка по клику
$('button.popup').click(function(e) {
    e.preventDefault();
    // Переменная для хранения атрибута rel нажатой ссылки
    var popupid = $(this).attr('rel');
    $('#' + popupid).fadeIn();
    // Добавим div fade вниз тэга body
    // и мы уже задавали ему стиль на шаге  2 : CSS
    $('body').append('<div id="fade"></div>');
    $('#fade').css({'filter' : 'alpha(opacity=30%)'}).fadeIn();
    // По центру
    var popuptopmargin = ($('#' + popupid).height() + 10) / 2;
    var popupleftmargin = ($('#' + popupid).width() + 10) / 2;
    // выравнивания модального окна по центру
    $('#' + popupid).css({
        'margin-top' : -popuptopmargin,
        'margin-left' : -popupleftmargin
    });
    document.forms.orderForm.reset();
});

// Переключение на основное окно
$('#fade').click(function() {
    $('#fade , #popuprel').fadeOut();
    return false;
});

function apply(url,token) {
    var msg   = $('form#popuprel').serialize();
    $.ajax({
        type: 'POST',
        url: url,
        _token : token,
        data: msg,
        success: function(data) {
            $('#fade , #popuprel').fadeOut();
            swal("Заявка отправленна", "Ваша заявка успешно отправлена", "success")

        },
        error:  function(xhr, str){
            $('#fade , #popuprel').fadeOut();
            swal("Не удалось отправить заявку", "К сожалению, не удалось отправить вашу заявку", "error")
        }
    });

}