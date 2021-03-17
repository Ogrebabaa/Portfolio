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