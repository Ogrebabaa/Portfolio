<div class="wrapper">
    <nav class="dash_sidebar">
        <div class="dash_title_container">
            <h3>Dashboard</h3>
            <h5>Bonjour, <?php echo $name; ?></h5>
        </div>
        
        
        <a id="dash_logout" href="<?php echo base_url("index.php/C_Admin/Deconnexion") ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </nav>
    <main class="dash_main_container">
        <?php
        echo "
        <div>
            <p>Contact: $nom $prenom</p>
            <p>Email: $email</p>
            <p>Objet: $objet</p>
            <p>Contenu: $contenu</p>
        </div>
        ";
        ?>
    </main>
</div>