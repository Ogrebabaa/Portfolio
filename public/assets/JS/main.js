
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

    //nav veille admin
    

    

});

let navTo = (destination) => {

    let element = document.getElementById(destination);
    
    switch (destination) {
        case "daily":
            element.classList.remove("hide");
            document.getElementById("manage").classList.add("hide");
            document.getElementById("daily_nav").classList.toggle("nav_veille_selected");
            document.getElementById("manage_nav").classList.toggle("nav_veille_selected");

        break;
        case "manage": 
            element.classList.remove("hide");
            document.getElementById("daily").classList.add("hide");
            document.getElementById("manage_nav").classList.toggle("nav_veille_selected");
            document.getElementById("daily_nav").classList.toggle("nav_veille_selected");
        break;
        default:
            console.log("Erreur");

    }

    
}

let deleteArticle = (id) => {
    let id_to_del = id;
    let xhr = new XMLHttpRequest();
    const url = "include/delete_article.php?id="+id_to_del;
    xhr.open("GET", url, true);

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { //request OK !
            //recupere le code html des articles recuperer dans la bdd
            let data = this.responseText;

            alert(data);
        } 
    };
    
    xhr.send();
}
