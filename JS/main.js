
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

    // Particles setup
    particlesJS.load('particles-js', 'particlesjs-config.json', function () {
        console.log('callback - particles.js config loaded');
    });

});