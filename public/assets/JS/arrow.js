document.addEventListener('DOMContentLoaded', init, false);

function init() {


    try {
        //Déclaration des variables pour la flèche droite
        var arrow_right = document.getElementById('a_right'); //la Div
        var arrow_right_title = document.getElementById('a_right_title'); //Le lien
        var arrow_right_img = document.getElementById('a_right_img'); //L'icône flèche/barre

        arrow_right.addEventListener('mouseover', function () { //Ajout d'évenements au survol

            // Animation de l'icône
            arrow_right_img.classList.remove('animate_fadeOut');
            arrow_right_img.src = 'assets/ICON/arrow_hover.svg';
            arrow_right_img.classList.add('animate_fadeIn');

            // Animation du lien vers l'autre page
            arrow_right_title.classList.remove('animate_fadeOut');
            arrow_right_title.style.display = 'block';
            arrow_right_title.classList.add('animate_fadeinRight');

        });

        arrow_right.addEventListener('mouseout', function () { //Ajout d'évenements qu'en on ne survol plus

            // Animation de l'icône
            arrow_right_img.src = 'assets/ICON/arrow_nav_right.svg';
            arrow_right_img.classList.remove('animate_fadeIn');
            arrow_right_img.classList.add('animate_slideInLeft');

            // Animation du lien vers l'autre page
            arrow_right_title.classList.remove('animate_fadeinRight');
            arrow_right_title.classList.add('animate_fadeOut');
            arrow_right_title.style.display = 'none';


        });
    } catch (error) {
        console.log('Erreur de chargement d ela fleche droite');
    }
        

        //Déclaration des variables pour la flèche gauche 
        var arrow_left = document.getElementById('a_left'); //la Div
        var arrow_left_title = document.getElementById('a_left_title'); //Le lien
        var arrow_left_img = document.getElementById('a_left_img'); //L'icône flèche/barre

        arrow_left.addEventListener('mouseover', function () { //Ajout d'évenements au survol

            // Animation de l'icône
            arrow_left_img.classList.remove('animate_fadeOut');
            arrow_left_img.src = 'assets/ICON/arrow_hover.svg';
            arrow_left_img.classList.add('animate_fadeIn');

            // Animation du lien vers l'autre page
            arrow_left_title.classList.remove('animate_fadeOut');
            arrow_left_title.style.display = 'block';
            arrow_left_title.classList.add('animate_fadeinLeft');

        });

        arrow_left.addEventListener('mouseout', function () { //Ajout d'évenements qu'en on ne survol plus

            // Animation de l'icône
            arrow_left_img.src = 'assets/ICON/arrow_nav_left.svg';
            arrow_left_img.classList.remove('animate_fadeIn');
            arrow_left_img.classList.add('animate_slideInRight');

            // Animation du lien vers l'autre page
            arrow_left_title.classList.remove('animate_fadeinLeft');
            arrow_left_title.classList.add('animate_fadeOut');
            arrow_left_title.style.display = 'none';

        });
    

}