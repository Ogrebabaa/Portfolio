
<?php 
 $adminSide = true;
 
include('init.php');
    try {
        $dbco = new PDO(DNS, LOGIN, PASSWORD, $options);
        

    if(!empty($_POST)) {
        
        $username = $_POST["adm_username"];
        $passwd = $_POST["adm_passwd"];
        $salt = "Reg15-R0bErT";
        $passHashed = md5($passwd.$salt.$username);
        // echo $passHashed;
        $sth2 = $dbco->prepare(
            "
            SELECT login, passwd FROM PF_Admin
            WHERE login = :adm_login AND passwd = :adm_passwd "
        );
        $sth2->bindParam(':adm_login', $username);
        $sth2->bindParam(':adm_passwd', $passHashed);

        $sth2->execute();
        $resultat = $sth2->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultat) > 0) {
            session_start();
            $_SESSION['user'] = $username;
            header("Location: index.php?page=dashboard.php");
            exit;
        } else {
            $deniedMsg  = "Accès refusé !";
        }
        
    }

    } catch(PDOException $e) {
    echo "error:",$e->getMessage();
    }
    
    echo "

<div class='centered admin-content no-bkg'>
    <h1>Connexion administrateur</h1>
    <h2>";
    if (isset($deniedMsg)) {
        echo $deniedMsg;
    } else {
        echo "Moldu non accepté";
    }

    echo "</h2>

    <form class='column no-bkg' action='index.php?page=admin.php' method='POST'>

        <!-- <label for='adm_username'>Username:</label> -->
        <input class='admin-content-input' type='text' placeholder='Username' name='adm_username' id='adm_username'>

        <!-- <label for='adm_passwd'>Password:</label> -->
        <input class='admin-content-input' type='password' name='adm_passwd' placeholder='Password' id='adm_passwd'>


        <input class='admin-content-input' type='submit' id='send-btn-admin' class='send-btn' value='ENTER'>

    </form>

</div>
";
?>