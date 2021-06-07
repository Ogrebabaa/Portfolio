
<input type='checkbox' name='menu' id='menu-trigger'>
<label class='button btn not-active' data-menu-toggle for='menu-trigger'>
    <span></span>
    <span></span>
    <span></span>
</label>

<div>
    <a href='<?php echo base_url("index.php/Site/accueil"); ?>' class='logo_container'>
        <img src='<?php echo base_url("/assets/IMG/logo-HQ-With-Border.svg"); ?>' alt='logo'>
    </a>
</div>

<div class='menu_burger'>
    <ul id='list_burger'>
        <li><a href='<?php echo base_url("index.php/Site/accueil"); ?>'><?php echo lang("menu_burger_lang.accueil");  ?></a></li>
        <li><a href='<?php echo base_url("index.php/Site/apropos"); ?>'><?php echo lang("menu_burger_lang.about");  ?></a></li>
        <li><a href='<?php echo base_url("index.php/Site/projet"); ?>'><?php echo lang("menu_burger_lang.projets");  ?></a></li>
        <li><a href='<?php echo base_url("index.php/Site/lab"); ?>'><?php echo lang("menu_burger_lang.lab");  ?></a></li>
        <li><a href='<?php echo base_url("index.php/Site/veille"); ?>'><?php echo lang("menu_burger_lang.veille");  ?></a></li>
        <li><a href='<?php echo base_url("index.php/Site/contact"); ?>'><?php echo lang("menu_burger_lang.contact");  ?></a></li>
        
    </ul>
    <div id='l_switch' class='l_switch'>
        <a id='l_link' href='<?php echo base_url("index.php/Language/switchLanguage");?>'>
            <i class="fas fa-language"></i>
        </a>
    </div>
</div>




