function setLocation(url){
    window.location.href = url;
}

function showAnswerForm(msg_id) {
    var div = $('#reply-div-' + msg_id);
    var rep = $('#reply-form').clone();

    var new_id = 'form-reply-' + msg_id;
    if(div.children().length === 0) {
        div.append(rep.css('display','block').attr('id',new_id));
        $('#' + new_id).children("[name='id']").val(msg_id);
    }
}

function replyToUser(form_id, url) {
    var rep   = $('form#' + form_id).serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data: rep,
        success: function(data) {
            $('#fade , #popuprel').fadeOut();
            swal("Сообщение отправлено", "Ваша сообщение успешно отправлено", "success")

        },
        error:  function(xhr, str){
            $('#fade , #popuprel').fadeOut();
            swal("Не удалось отправить сообщение", "К сожалению, не удалось отправить ваше сообщение", "error")
        }
    });
}

function showContacts() {
    btn = document.getElementById('showBtn');
    contacts = document.getElementById('contacts');

    contacts.style.display = "block";
    btn.style.display = 'none';
}

function checkCity(city_id,selectorID) {
    sel = document.getElementById(selectorID);
    for(var i = 0; i < sel.length; i++){
        if(sel.options[i].value === city_id) {
            sel.selectedIndex = i;
            break;
        }

    }
}

function getCities(regionId,selectorID, token, city){
    SL = jQuery('#' + selectorID).get(0);
    jQuery.ajax({
        method: 'POST',
        url: '/get_cities',
        data: {
            region_id: regionId,
            _token : token
        },
        success: function (data, textStatus, jqXHR) {
            data = JSON.parse(data);
            SL = jQuery('#' + selectorID).get(0);

            for(i = 1; i < SL.length; i++){
                SL.options.remove(i);
            }

            i = 1;
            for (index in data) {
                SL.options[i] = new Option(data[index].name, data[index].city_id);
                i++;
            }
            checkCity(city,selectorID);
        },
        error:   function (jqXHR, textStatus, errorThrown) {
            for(i = SL.options.length - 1; i >= 0; i--){
                SL.options[i].remove();
            }
            SL.options[0] = new Option('Все города', '');
        }
    });
}