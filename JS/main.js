
$(document).ready(function () {


    $('.loading_screen').fadeIn(500);
    setTimeout(function(){
        $('.loading_screen').fadeOut(500);
    }, 1000);
    
   
    // MENU BURGER TRIGGER

    var btn = $('.btn');
    

    btn.on('click', function () {
        $(this).toggleClass('active');
        $(this).toggleClass('not-active');
    });

    

});