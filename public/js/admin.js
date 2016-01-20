function initUserWidget(){
    userWidget();
    setInterval(userWidget,3450);
}
var userWidgetStatus = true;
function userWidget(){
    var widget = $(".user-widget");
    var items = $(".user-widget-item");
    $.post("ajax.php",{userWidget:"szia"},function(output){
        items.remove();
        widget.append(output);
        if(userWidgetStatus){
            $(".user-widget-item").hide();
            setTimeout(function () {
                $(".user-widget-item").show()
            },1000);
            userWidgetStatus = false;
        }
    })
}

function initAdminWidget(){
    setTimeout(adminWidget,500);
    setInterval(adminWidget,5000);
}

function adminWidget(){
    var widget = $(".admin-widget");
    var items = $(".admin-widget-item");
    $.post("ajax.php",{adminWidget:"szia"},function(output){
        items.remove();
        widget.append(output);
    })
}

function alignLogin() {
    var wrapper = $('#login-wrapper');
    var display_height = $(document).height();

    wrapper.css('height', display_height - 20);
}
function checkInputsValue(inputName1, inputName2) {
    var inp1 = $("input[name='" + inputName1 + "']");
    var inp2 = $("input[name='" + inputName2 + "']");

    var email = $("input[name='email']");
    email.on('blur', function () {
        email.removeClass('valid');
    });

    $(document).on('keyup', "input[name='" + inputName1 + "'], input[name='" + inputName2 + "']", function () {
        if (inp1.val() != inp2.val()) {
            inp2.addClass('invalid');
        } else {
            inp2.removeClass('invalid');
        }
    });
}
function firstInputFocus(){
    var input = $("input:not([type='file'],[type='submit'],[type='button'],[type='hidden']):visible:first");
    var inputVal = input.val();
    input.focus();
    input.val(inputVal + " ");
    input.trigger("change");
    input.on("focusout",function(){
        var inputVal = input.val();
        input.val(inputVal.trim());
    });
}
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function searchInit() {
    var activator = $('#searchActivator');
    var search = $('#search');
    var searchField = $('#searchField');
    var btn = $('#searchBtn');
    var searchResult = $('#searchResult');

    activator.on('click', function (e) {
            e.preventDefault();
            search.toggle('slow');
            if (search.hasClass('active')) {
                search.removeClass('active');
            } else {
                search.addClass('active');
                searchField.focus();
            }
        }
    );
    $(searchField).on('keyup',function(){
       var value = searchField.val();
        $.post('ajax.php',{adminSearch:value},function(output){
            searchResult.html(output);
            searchResult.fadeIn('slow');
        })
    });
    $(btn).on('click',function(){
        var value = searchField.val();
        $.post('ajax.php',{adminSearch:value},function(output){
            searchResult.html(output);
            searchResult.fadeIn('slow');
        })
    });

    $('section').on('click', function () {
        if (search.hasClass('active')) {
            search.toggle('slow');
            search.removeClass('active');
        }
    })
}



$("input[type='number']").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
        (e.keyCode == 67 && e.ctrlKey === true) ||
            // Allow: CTRL+V
        (e.keyCode == 86 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
        (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }

});

$("button[name='delete'],button[name='drop']").on('click',function(){
    return confirm("Are you sure?");
});

/* ___________________________________________________________*/

$(document).ready(function () {
    alignLogin();
    searchInit();
    firstInputFocus();
    $(".button-collapse").sideNav();
    $(".collapsible").collapsible();
    $('select').material_select();
    $('.materialboxed').materialbox();
    $('.modal-trigger').leanModal();
    $('.slider').slider();
    $('ul.tabs').tabs();
    $(".upload").change(function () {
        readURL(this);
    });
    checkInputsValue('password', 're_password');
    checkInputsValue('new_password', 're_new_password');
});
