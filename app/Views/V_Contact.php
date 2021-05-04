
<?php

    $msgSent = false;

?>
<!--     
// try {
//     $dbco = new PDO(DNS, LOGIN, PASSWORD, $options);
//     $msgSent = false;

// //On insere les donnees du msg dans la table
//     if(!empty($_POST)) {
        
//         $email = $_POST["email"];
//         $nom = $_POST["nom"];
//         $prenom = $_POST["prenom"];
//         $objet = $_POST["objet"];
//         $message = $_POST["msg"];
//         $priorite = $_POST["statut"];

//         $testContact = $dbco->prepare(
//             "SELECT email_contact FROM PF_Contact WHERE email_contact = :email"
//         );

//         $testContact->bindParam(':email', $email);
//         $testContact->execute();
//         $testContact_res = $testContact->fetchAll(PDO::FETCH_ASSOC);

//         $sth3 = $dbco->prepare(
//             "INSERT INTO PF_Contact(email_contact, nom, prenom, statut)
//              VALUES( :email, :nom, :prenom, :statut)"
//         );

//         $sth3->bindParam(':email', $email);
//         $sth3->bindParam(':nom', $nom);
//         $sth3->bindParam(':prenom', $prenom);
//         $sth3->bindParam(':statut', $priorite);
        

//         $sth2 = $dbco->prepare(
//             "INSERT INTO PF_Message(objet, contenu, priorite, date, email_contact)
//              VALUES(:objet, :message, :priorite, NOW(), :email)"
//         );

//         $sth2->bindParam(':objet', $objet);
//         $sth2->bindParam(':message', $message);
//         $sth2->bindParam(':priorite', $priorite);
//         $sth2->bindParam(':email', $email);

//         if (empty($testContact_res)) {
//             //si pas contact, ajoute le contact
//             $sth3->execute();
//             $sth2->execute(); 
//         } else {
//             //sinon, ajoute uniquement le message
//             $sth2->execute();

//         }

//         $msgSent = true;
        
//     }

// } catch(PDOException $e) {
// echo "error:",$e->getMessage();
// } -->


<div class='centered'>

    <h2 style='color: #63f74b'><?php if ($msgSent == true) {echo lang("contact_lang.msg_envoye");} ?></h2>

    <h2><?php echo lang("contact_lang.subTitle"); ?></h2>

    <span class='separator'></span>
    <form class='column contact-form no-bkg' action="<?php  echo base_url(); ?>/C_Contact/envoyerMessage" method='POST'>

        <div class='row contact-form--name'>
            <input type='text' name='nom' placeholder='<?php echo lang("contact_lang.nom"); ?>' id='nom'>
            <input type='text' name='prenom' placeholder='<?php echo lang("contact_lang.prenom"); ?>' id='prenom'>
        </div>

        <div class='row contact-form--statut'>
            <!-- <div> -->
            <input type='radio' name='statut' value='1' id='Particulier'>
            <input type='radio' name='statut' value='2' id='Professionel'>

            <label class='radio-label' for='Particulier'><?php echo lang("contact_lang.particulier"); ?></label>
            <span class='checkmark' id='checkmarkPart'></span>
            <!-- </div>
            <div>  -->

            <label class='radio-label' for='Professionel'><?php echo lang("contact_lang.professionnel"); ?></label>
            <span class='checkmark' id='checkmarkPro'></span>
            <!-- </div> -->
        </div>


        <input class='contact-form--input' type='email' name='email' placeholder='Mail' id='mail'>
        <input class='contact-form--input' type='text' name='objet' placeholder='<?php echo lang("contact_lang.objet"); ?>' id='objet'>
        <textarea id='textearea' name='msg' placeholder='<?php echo lang("contact_lang.message"); ?>' id='msg' cols='30' rows='5'></textarea>
        <input class='contact-form--input send-btn' type='submit' id='send-btn-contact' value='<?php echo lang("contact_lang.envoyer"); ?>'>
        
    </form>
    <a class='toHogward' href='<?php echo base_url(); ?>/App/Admin'>
        <i class='fas fa-user-lock'></i>
    </a>
</div>


