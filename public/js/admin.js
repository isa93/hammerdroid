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
    input.focus();
    input.appendData("");
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
    var searchValue = $('#searchValue');
    var btn = $('#searchBtn');

    activator.on('click', function () {
            search.toggle('slow');
            if (search.hasClass('active')) {
                search.removeClass('active');
            } else {
                search.addClass('active');
                searchValue.focus();
            }
        }
    );
    activator.on('click', function () {

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
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }

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
    $(".upload").change(function () {
        readURL(this);
    });
    checkInputsValue('password', 're_password');
    checkInputsValue('new_password', 're_new_password');
});
