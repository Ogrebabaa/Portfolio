<?php

// default logs for ampps
// Host = localhost
// user = root
// pass = mysql

    // if (!defined('DNS')) define('DNS', 'mysql:host=localhost;port=3306;dbname=moreauv');
    // if (!defined('LOGIN')) define('LOGIN', 'moreauv');
    // if (!defined('PASSWORD')) define('PASSWORD', 'si7nahP4eiph');

    if (!defined('DNS')) define('DNS', 'mysql:host=localhost;port=3306;dbname=portfolio');
    if (!defined('LOGIN')) define('LOGIN', 'root');
    if (!defined('PASSWORD')) define('PASSWORD', '');
    
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
                    

?>

