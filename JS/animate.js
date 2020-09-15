// document.addEventListener('DOMContentLoaded', init, false);

// // Get the page name from the adress
// // var document_id = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);


// // Globals Variables
// var elements = document.getElementsByClassName("animate");


//     // Variables for project page
//     var p = document.getElementsByTagName("p");
//     var project_btn = document.getElementsByClassName("project-btn");

//     // Variables for about page
//     var desc = document.getElementsByClassName("desc");
//     var icons = document.getElementsByClassName("icon");


// // MAIN FUNCTION
// function init() {

//     //LOOP FOR HOVER ANIMATION
//     for (i = 0; i < elements.length; i++) {
        
//         over(i);
//         out(i);
//     }

// }

// // WHEN THE MOUSE IS OVER THE ELEMENT
// function over(i) {
    
//         elements[i].addEventListener("mouseover", function () {
//             desc[i].classList.remove('animate_fadeOut');
//             desc[i].classList.add('animate_fadeIn');
//             desc[i].style.opacity = 1;
//             icons[i].style.opacity = 0.2;
//             p[i].classList.remove('animate_fadeOut');
//             p[i].classList.add('animate_fadeIn');
//             p[i].style.display = "block";
//             project_btn[i].style.display = "block";
//         });


// }

// // WHEN THE MOUSE IS OUT OF THE ELEMENT
// function out(i) {

//         elements[i].addEventListener("mouseout", function () {
//             desc[i].classList.remove('animate_fadeIn');
//             desc[i].classList.add('animate_fadeOut');
//             desc[i].style.opacity = 0;
//             icons[i].style.opacity = 1;
//             p[i].classList.remove('animate_fadeOut');
//             p[i].classList.add('animate_fadeIn');
//             p[i].style.display = "none";
//             project_btn[i].style.display = "none";
//         });

// }
