
function setLocation(url){
    window.location.href=url;
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