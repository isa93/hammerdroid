function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

$(document).ready(function(){
    var cookie = readCookie('loading');
    console.log(cookie);
    if(cookie=="false"){
        removeLoad();
    }else{
        setTimeout(removeLoad,6000);
    }
    $('#logout').on("click", function(e){
        e.preventDefault();
        createCookie('loading',true);
        alert('deleted!');
        window.setTimeout(function(){ window.location = "logout.php"; },10);
    });
});

function removeLoad(){
    $(".loading").innerHTML("");
    createCookie("loading",false);
}



( function( $ ) {
    $( document ).ready(function() {
        $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
        $('#cssmenu #menu-button').on('click', function(){
            var menu = $(this).next('ul');
            if (menu.hasClass('open')) {
                menu.removeClass('open');
            }
            else {
                menu.addClass('open');
            }
        });
    });
} )( jQuery );

$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 2000);
                return false;
            }
        }
    });
});



function blue(x){
    x.style.borderColor="blue";
}

function red(x){
    x.style.borderColor="green";
}

function validateForm(){
    var letters = /^[0-9]+$/;
    var error="";
    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


    {

        if( document.getElementById('last_name').value.match(letters)   )
        {

            document.getElementById('last_name').style.borderColor="#f00";
            error+="Incorrect Last Name - Only write letters!\n";
        }
        else if ( document.getElementById('last_name').value.trim().length==0){
            error+="Empty Last Name field! \n";
            document.getElementById('last_name').style.borderColor="#f00";
        }







        if ( document.getElementById('first_name').value.trim().length==0){
            error+="Empty First Name field! \n";
            document.getElementById('first_name').style.borderColor="#f00";
        }
        else if( document.getElementById('first_name').value.match(letters)   )
        {

            document.getElementById('first_name').style.borderColor="#f00";
            error+="Incorrect First Name - Write only letters! \n";
        }


        /*

         function checkEmail() {

         var email = document.getElementById('txtEmail');

         var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


         if (!filter.test(email.value)) {

         alert('Please provide a valid email address');

         email.focus;

         return false;

         }
         }

         */


        if (!filter.test(email.value)){

            document.getElementById('email').style.borderColor="#f00";
            error+="Incorrect E-mail address! \n";




        }


        //if(document.getElementById('tel').value.trim().length==0){
        //    error+="Empty Telephone number field! \n";
        //    document.getElementById('tel').style.borderColor="#f00";
        //}
        //else if ( isNaN(Number(document.getElementById('tel').value.trim()))){
        //    error+="Incorrect Telephone number - Write only numbers! \n";
        //    document.getElementById('tel').style.borderColor="#f00";
        //}






        if ( document.getElementById('country').value.trim().length==0 ){
            error+="Empty Country field! \n";
            document.getElementById('country').style.borderColor="#f00";
        }
        else if( document.getElementById('country').value.match(letters) )
        {

            document.getElementById('country').style.borderColor="#f00";
            error+="Incorrect Country - Write only letters! \n";
        }






        //if(document.getElementById('utca').value.trim().length==0 ){
        //    error+="Empty Address field! \n";
        //    document.getElementById('utca').style.borderColor="#f00";
        //}






        if(document.getElementById('username').value.trim().length==0 ){
            error+="Empty Username field! \n";
            document.getElementById('username').style.borderColor="#f00";
        }





        if(document.getElementById('password').value.trim().length==0 ){
            error+="Empty Password field! \n";
            document.getElementById('password').style.borderColor="#f00";
        }

        if (error!=""){
            alert(error);
            return false;
        }





    }

}


