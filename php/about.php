<?php

$pageTitle = $langue->pagetitle;

echo "

<div class='content-box'>

    <!-- 1st Part: Info  ============================================================= -->

    <div class='info'>
        <img src='assets/IMG/avatar.png' alt='avatar'>
        <h2>$langue->text</h2>
        <a target='blank' href='assets/CV2019-FR.pdf' class='btn-main'>$langue->btn_cv</a>
    </div>

    <!-- 1st Part: Info  ============================================================= -->
    <!-- 2nd Part: Tools  ============================================================= -->
    <div>

        <hr class='v_separator'> <!-- Separator  -->


        <!-- content box  -->
        <div class='etiquette-box'>
            <!-- List Title  -->
            <span class='etiquette'>$langue->outil</span>
            <!-- content of the list: Outils (in 2 parts, for more responsivness)  -->
            <!-- part 1  -->
            <div class='list-container'>
                <a class='animate' href='#'>
                    <i class='fab fa-html5 icon'></i>
                    <p class='desc'>HTML5</p>
                </a>
                <a class='animate' href=''>
                    <i class='fab fa-css3 icon'></i>
                    <p class='desc'>CSS3</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-java icon'></i>
                    <p class='desc'>Java</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-js-square icon'></i>
                    <p class='desc'>JavaScript</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-php icon'></i>
                    <p class='desc'>PHP</p>
                </a>
            </div>
            <!-- part 2  -->
            <div class='list-container'>

                <a class='animate' href='#'>
                    <i class='fab fa-wordpress icon'></i>
                    <p class='desc'>Wordpress</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fas fa-server icon'></i>
                    <p class='desc'>SQL</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-git icon'></i>
                    <p class='desc'>Git</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-apple icon'></i>
                    <p class='desc'>Swift4</p>
                </a>
            </div>
            <!-- List Title: Design  -->
            <span class='etiquette'>Design</span>
            <!-- content of the list  -->
            <div class='list-container'>
                <a class='animate' href='#'>
                    <img class='icon' src='assets/ICON/icon-xd.svg' alt='adobe xd'>
                    <p class='desc'>Adobe XD</p>
                </a>
                <a class='animate' href=''>
                    <img class='icon' src='assets/ICON/icon-illustrator.svg' alt='adobe ai'>
                    <p class='desc'>Adobe Illustrator</p>
                </a>
                <a class='animate' href='#'>
                    <img class='icon' src='assets/ICON/icon-photoshop.svg' alt='adobe ps'>
                    <p class='desc'>Adobe Photoshop</p>
                </a>
            </div>
            <!-- List Title: Reseau  -->
            <span class='etiquette'>$langue->reseau</span>
            <!-- content of the list  -->
            <div class='list-container'>
                <a class='animate' href='#'>
                    <i class='fab fa-bitbucket icon'></i>
                    <p class='desc'>Bitbucket</p>
                </a>
                <a class='animate' href=''>
                    <i class='fab fa-linkedin icon'></i>
                    <p class='desc'>Mon profil</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-skype icon'></i>
                    <p class='desc'>Skype</p>
                </a>
                <a class='animate' href='#'>
                    <i class='fab fa-slack icon'></i>
                    <p class='desc'>Slack</p>
                </a>
            </div>
        </div>
    </div>
    <!-- 2nd Part: Tools  ============================================================= -->
</div>
<!-- Page content  ============================================================= -->
";
?>