<?php 


//  if (!empty($_SESSION)) {
//     echo $_SESSION['user'], ' ,vous etes le bienvenu !';
//     print_r($_SESSION);
//  } 
    
//  }

 if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=admin.php");
    exit;
 }

 include("init.php");

try {
    $dbco = new PDO(DNS, LOGIN, PASSWORD, $options);
    
    $sth = $dbco->prepare(
        "SELECT COUNT(id_message) FROM PF_Message"
    );

    $sth->execute();

    // $nbMessage = $sth->fetch(PDO::FETCH_ASSOC);
    // print_r($nbMessage);

    $ResultSth = $sth->fetch(PDO::FETCH_ASSOC);
    $nbMessage = $ResultSth['COUNT(id_message)'];

    if (isset($_GET['tri'])) {
        $tri = $_GET['tri'];

        switch($tri) {
            case 'date':
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite,  contenu, objet, date FROM PF_Message
                    ORDER BY date DESC"
                );
            break;
            case 'nom':
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite, contenu, objet FROM PF_Message
                    ORDER BY nom"
                );
            break;
            case 'priorite':
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite, contenu, objet FROM PF_Message
                    ORDER BY priorite DESC"
                );
            case 'lu':
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite, contenu, objet, lu FROM PF_Message
                    WHERE lu = 1"
                );
            case 'nonlu':
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite, contenu, objet, lu FROM PF_Message
                    WHERE lu = 0"
                );
            break;

        }

    } else {
        $recupInfoMsg = $dbco->prepare(
            "SELECT id_message, priorite, contenu, objet FROM PF_Message"
        );
    }
    

    $recupInfoMsg->execute();


    // print_r($listInfoMsg);

    
    

} catch(PDOException $e) {
        echo "error:",$e->getMessage();
}

echo "
<span id='pageTitle' >Dashboard</span>
<a id='adminExit' href='index.php?page=deconnexion.php'>
    <i class='fas fa-sign-out-alt'></i>
</a>

<div id='admin-menu'>
    <a href='index.php?page=dashboard.php'>
        <i class='fas fa-envelope'></i>
    </a>

    <a href='index.php?page=veille.php'>
        <i class='fas fa-rss'></i>
    </a>
</div>


<div class='center admin-content row centered'>

    <div class='admin-msg--box'>
        <span class='admin-msg--box_title'>
            Messagerie:
            <a href='index.php?page=dashboard.php&tri=date'>Plus recent</a>
            <a href='index.php?page=dashboard.php&tri=nom'>nom</a>
            <a href='index.php?page=dashboard.php&tri=priorite'>priorite</a>
            <a href='index.php?page=dashboard.php&tri=lu'>lu</a>
            <a href='index.php?page=dashboard.php&tri=nonlu'>non lu</a>
        </span>
        

        

        <!-- liste des msg -->
        ";
        // Suppression des msg
        if(isset($_GET['delete'])){
            try {
                $idMsgToDelete = $_GET['delete'];
                $deleteMsg = $dbco->prepare(
                    "DELETE FROM PF_Message WHERE id_message = $idMsgToDelete"
                );

                $deleteMsg->execute();

                //refresh apres suppression
                header("Location: index.php?page=dashboard.php");
                exit;

            } catch(PDOException $e) {
                echo "error:",$e->getMessage();
            }
        }

            // on recupere le resultat de la requete contenant la liste des auteurs de message
            $listInfoMsg = $recupInfoMsg->fetchAll(PDO::FETCH_ASSOC);

            if ($_GET["tri"] === "lu") {
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite, contenu, objet, lu FROM PF_Message
                    WHERE lu = 1"
                );

                $recupInfoMsg->execute();
                $listInfoMsg = $recupInfoMsg->fetchAll(PDO::FETCH_ASSOC);
            } 
            if ($_GET["tri"] === "nonlu") {
                $recupInfoMsg = $dbco->prepare(
                    "SELECT id_message, priorite, contenu, objet, lu FROM PF_Message
                    WHERE lu = 0"
                );

                $recupInfoMsg->execute();
                $listInfoMsg = $recupInfoMsg->fetchAll(PDO::FETCH_ASSOC);
            } 
            print_r($listInfoMsg);
            $keys = array_keys($listInfoMsg);
            for ($i = 0; $i < sizeof($listInfoMsg); $i++) {
                echo "
                    <div class='admin-msg--box_item'>";
                foreach($listInfoMsg[$keys[$i]] as $key=> $value) {
                    
                    // print_r($listMsg);
                    switch($key) {
                        case 'id_message':
                            $idMsg = $value;
                        break;
                        case 'mail':
                            $mailAuteur = $value;
                        break;
                        case 'priorite':
                            $priorite = $value;
                        break;
                    }
  
                }

                echo "
                <a href='index.php?page=dashboard.php&msg=$idMsg' class='msg-auteur'><strong>De :</strong> Mail<br></a>
                <span style='background: 
                ";
                if ($priorite == 1) {
                    echo "green";
                }
                echo "
                ' class='msg-status'></span> 
                </div>";
            }
            echo "
        
    </div>

    <div class='admin-msg--view'> ";
            // Affichage des corps de messages
    
    if(isset($_GET['msg'])) {
        $idMsgToDisplay = $_GET['msg'];
        try {
            $dbco = new PDO(DNS, LOGIN, PASSWORD, $options);
        
            $recupMsg = $dbco->prepare(
                "SELECT  contenu, objet, date FROM PF_Message
                WHERE id_message = $idMsgToDisplay"
            );
        
            $recupMsg->execute();
        
            $listMsg = $recupMsg->fetchAll(PDO::FETCH_ASSOC);
            // print_r($listMsg);

            // $nomMsg = $value;
            // $prenomMsg = $value;

            $objetMsg = $listMsg[0]["objet"];

            $contenuMsg = $listMsg[0]["contenu"];
        
            $dateMsg = $listMsg[0]["date"];
            
            
            
        //     echo "
        // <div class='admin-msg--view_head'>
        //     <p class='admin-msg--view_title'><strong>De :</strong> $nomMsg $prenomMsg</p>
        //     <p class='admin-msg--view_Date'><strong>Le :</strong> $dateMsg</p>
        // </div>
        // <div class='admin-msg--view_body' >
            
        //     <p class='admin-msg--view_objet'><strong>Objet :</strong> $objetMsg</p>
        //     <p class='admin-msg--view_labelMsg'><strong>Message:</strong></p>
        //     <blockquote class='admin-msg--view_contentMsg'>$contenuMsg</blockquote>
        //     <a href='index.php?page=dashboard.php&delete=$idMsgToDisplay' class='admin-msg--view_deleteMsg'>
        //         <i class='fas fa-trash-alt'></i>
        //     </a>
        // </div>";
        echo "
        <div class='admin-msg--view_head'>
            <p class='admin-msg--view_title'><strong>De :</strong> Nom Prenom</p>
            <p class='admin-msg--view_Date'><strong>Le :</strong> $dateMsg</p>
        </div>
        <div class='admin-msg--view_body' >
            
            <p class='admin-msg--view_objet'><strong>Objet :</strong> $objetMsg</p>
            <p class='admin-msg--view_labelMsg'><strong>Message:</strong></p>
            <blockquote class='admin-msg--view_contentMsg'>$contenuMsg</blockquote>
            <a href='index.php?page=dashboard.php&delete=$idMsgToDisplay' class='admin-msg--view_deleteMsg'>
                <i class='fas fa-trash-alt'></i>
            </a>
        </div>";
        
        } catch(PDOException $e) {
                echo "error:",$e->getMessage();
        }
    }
         
    echo"
        
    </div>
</div>
";

?>

