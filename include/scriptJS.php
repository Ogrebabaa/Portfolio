<script type="text/javascript" src="JS/jquery-3.4.1.min.js"></script>
<script src="JS/main.js"></script>
<script src="JS/animate.js"></script>
<script type="text/javascript" src="JS/arrow.js"></script>

<?php
    if ($pageName === "dataPortal.php") {
        echo '<script type="text/javascript" src="JS/tri_veille.js"></script>';
    }

    if ($pageName === "contact.php") {
        echo '<script type="text/javascript" src="JS/contact_form.js"></script>';
    }

    if ($pageName === "home.php") {
        echo '<script type="text/javascript" src="JS/load_particle.js"></script>';
    }
?>