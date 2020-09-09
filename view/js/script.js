var el = document.getElementById('search_term');
el.addEventListener('keyup', function (event) {
    ValidateAjaxSearch(el, event);
});


function ValidateAjaxSearch(input, e) {
    var texto = input.value;
    //How many chars activate the search previews
    var textSize = 2;
    var flag = true;
    switch (e.keyCode) {
        case 8: //BackSpace
            flag = false;
            break;
        case 9: //Tab
            flag = false;
            break;
        case 37: //Left
            flag = false;
            break;
        case 38: //Up
            flag = false;
            break;
        case 39: //Right
            flag = false;
            break;
        case 46: //Down
            flag = false;
            break;
        case 40: //Down
            flag = false;
            break;
        case 32: //Space
            flag = false;
            break;
        case 13: //Enter
            flag = false;
            break;
        default:
            break;
    }

    if (texto.length > textSize && flag) {
        $('img#loading').removeClass('hide');
        var ajaxQuery = $('input#search_term').val();
        var ajaxRepo = $('input#current_repo').val();
        var ajaxOrder = $('input#current_order').val();
        var ajaxInv = $('input#current_order_inv').val();

        $.post(window.location.protocol + "//" + window.location.host + "/controller/ajax.php", 
        {ajaxQuery: ajaxQuery, ajaxRepo: ajaxRepo, ajaxOrder: ajaxOrder, ajaxInv: ajaxInv}, function (data) {
            if (data.length > 0) {
                $('img#loading').addClass('hide');
                $('div#search_preview').html(data);
                $('div#search_preview').slideDown();
            } else {
                $('img#loading').addClass('hide');
                $('div#search_preview').fadeOut('fast');
            }
        });
    } else if (texto.length <= textSize + 1 && (e.keyCode === 8 || e.keyCode === 46)) {
        $('img#loading').addClass('hide');
        $('div#search_preview').fadeOut('fast');
    }
}


function downloading() {
    $('#inside').text('Downloading...');

    setInterval(function () {
        $('a#noline').removeAttr('href');
    }, 3000);
}

function downloadingObbMain() {
    $('#insideObbM').text('Downloading OBB Main...');

    setInterval(function () {
        $('a#nolineObbM').removeAttr('href');
    }, 3000);
}

function downloadingObbPatch() {
    $('#insideObbP').text('Downloading OBB Patch...');

    setInterval(function () {
        $('a#nolineObbP').removeAttr('href');
    }, 3000);
}

//LOADER/SPINNER
$(window).bind("load", function () {

    "use strict";

    $(".spn_hol").fadeOut(1000);
});

$(document).ready(function () {

    "use strict";

    $(window).scroll(function () {

        "use strict";
        if ($(this).scrollTop() > 800) {
            $('#subir').fadeIn('slow');
        } else {
            $('#subir').fadeOut('slow');
        }


    });
});

