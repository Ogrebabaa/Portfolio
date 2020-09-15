<!-- Burger menu + trigger & logo  ============================================================= -->

<?php

if ($current_langue == 'fr') {
    $switchLangue = 'en';
} else {
    $switchLangue = 'fr';
}

$transBurger = $bibliotheque->burger->$current_langue;

echo "
<input type='checkbox' name='menu' id='menu-trigger'>
<label class='button btn not-active' data-menu-toggle for='menu-trigger'>
    <span></span>
    <span></span>
    <span></span>
</label>

<div>
    <a href='index.php' class='logo_container'>
        <img src='assets/IMG/logo-HQ-With-Border.svg' alt='logo'>
    </a>
</div>

<div class='menu_burger'>
    <ul id='list_burger'>
        <li><a href='index.php'>$transBurger->accueil</a></li>
        <li><a href='index.php?page=about.php'>$transBurger->about</a></li>
        <li><a href='index.php?page=projet.php'>$transBurger->projets</a></li>
        <li><a href='index.php?page=lab.php'>$transBurger->lab</a></li>
        <li><a href='index.php?page=dataPortal.php'>$transBurger->veille</a></li>
        <li><a href='index.php?page=contact.php'>$transBurger->contact</a></li>
        
    </ul>
    <div id='l_switch' class='l_switch'>
            <a id='l_link' href='$link"."langue=$switchLangue'>
                <i class='fas fa-language' aria-hidden='true'></i>
            </a>
        </div>
</div>

";

?>

<!-- Burger menu + trigger & logo  ============================================================= -->