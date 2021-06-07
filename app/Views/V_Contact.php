
<div class='centered'>

    <?php

    if (isset($messageEnvoye)) {
        if ($messageEnvoye == true) {
            if ($est_deja_contact == "1") {
                echo "<h2 style='color: #63f74b'>".lang('contact_lang.msg_envoye1')."</h2>";
            } else {
                echo "<h2 style='color: #63f74b'>".lang('contact_lang.msg_envoye2')."</h2>";
            }
        } else {
            echo "<h2 style='color: red'>Une erreur s'est produite, veuillez réessayer plus tard.</h2>";
        }
    }

    ?>
    

    <h2><?php echo lang("contact_lang.subTitle"); ?></h2>

    <span class='separator'></span>
    <form class='column contact-form no-bkg' action="<?php  echo base_url("index.php/C_Contact/envoyerMessage"); ?>" method='POST'>

        <div class='row contact-form--name'>
            <input type='text' name='nom' placeholder='<?php echo lang("contact_lang.nom"); ?>' id='nom' required>
            <input type='text' name='prenom' placeholder='<?php echo lang("contact_lang.prenom"); ?>' id='prenom' required>
        </div>

        <div class='row contact-form--statut'>
            <!-- <div> -->
            <input type='radio' name='statut' value='1' id='Particulier' checked>
            <input type='radio' name='statut' value='2' id='Professionel'>

            <label class='radio-label' for='Particulier'><?php echo lang("contact_lang.particulier"); ?></label>
            <span class='checkmark' id='checkmarkPart'></span>
            <!-- </div>
            <div>  -->

            <label class='radio-label' for='Professionel'><?php echo lang("contact_lang.professionnel"); ?></label>
            <span class='checkmark' id='checkmarkPro'></span>
            <!-- </div> -->
        </div>


        <input class='contact-form--input' type='email' name='email' placeholder='Mail' id='mail' required>
        <input class='contact-form--input' type='text' name='objet' placeholder='<?php echo lang("contact_lang.objet"); ?>' id='objet' required>
        <textarea id='textearea' name='msg' placeholder='<?php echo lang("contact_lang.message"); ?>' id='msg' cols='30' rows='5' required></textarea>
        <input class='contact-form--input send-btn' type='submit' id='send-btn-contact' value='<?php echo lang("contact_lang.envoyer"); ?>'>
        
    </form>
    <a class='toHogward' href='<?php echo base_url("index.php/Site/Admin"); ?>'>
        <i class='fas fa-user-lock'></i>
    </a>
</div>


