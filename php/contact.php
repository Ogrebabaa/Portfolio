<?php 

 
include('init.php');


    
try {
    $dbco = new PDO(DNS, LOGIN, PASSWORD, $options);
    $msgSent = false;

//On insere les donnees du msg dans la table
    if(!empty($_POST)) {
        
        $email = $_POST["email"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $objet = $_POST["objet"];
        $message = $_POST["msg"];
        $priorite = $_POST["statut"];



        $sth2 = $dbco->prepare(
            "INSERT INTO PF_Message(nom, prenom, mail, objet, contenu, priorite, date)
             VALUES('$nom', '$prenom', '$email', '$objet', '$message', $priorite, NOW())"
        );

        $sth2->execute();
        
        $msgSent = true;
        
    }

} catch(PDOException $e) {
echo "error:",$e->getMessage();
}

echo "


<div class='centered'>
    ";
    if ($msgSent) {
        echo "<h2 style='color: #63f74b'>$langue->msg_envoye</h2>";
    } else {
        echo "<h2>$langue->h2</h2>";
    }
    

    echo"
    <span class='separator'></span>
    <form class='column contact-form no-bkg' action='index.php?page=contact.php' method='POST'>


        <div class='row contact-form--name'>
            <input type='text' name='nom' placeholder='$langue->nom' id='nom'>
            <input type='text' name='prenom' placeholder='$langue->prenom' id='prenom'>
        </div>

        <div class='row contact-form--statut'>
            <!-- <div> -->
            <input type='radio' name='statut' value='1' id='Particulier'>
            <input type='radio' name='statut' value='2' id='Professionel'>

            <label class='radio-label' for='Particulier'>$langue->particulier</label>
            <span class='checkmark' id='checkmarkPart'></span>
            <!-- </div>
            <div>  -->

            <label class='radio-label' for='Professionel'>$langue->professionnel</label>
            <span class='checkmark' id='checkmarkPro'></span>
            <!-- </div> -->
        </div>


        <input class='contact-form--input' type='email' name='email' placeholder='Mail' id='mail'>
        <input class='contact-form--input' type='text' name='objet' placeholder='$langue->objet' id='objet'>
        <textarea id='textearea' name='msg' placeholder='$langue->message' id='msg' cols='30' rows='5'></textarea>
        <input class='contact-form--input' type='submit' id='send-btn-contact' class='send-btn' value='$langue->envoyer'>
    </form>
    <a class='toHogward' href='index.php?page=admin.php'>
        <i class='fas fa-user-lock'></i>
    </a>
</div>

";


?>