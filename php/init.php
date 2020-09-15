<?php

// default logs for ampps
// Host = localhost
// user = root
// pass = mysql

    // define('DNS', 'mysql:host=localhost;port=3306;dbname=moreauv');
    // define('LOGIN', 'moreauv');
    // define('PASSWORD', 'si7nahP4eiph');
    if (!defined('DNS')) define('DNS', 'mysql:host=localhost;port=3306;dbname=moreauv');
    if (!defined('LOGIN')) define('LOGIN', 'moreauv');
    if (!defined('PASSWORD')) define('PASSWORD', 'si7nahP4eiph');
    
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
                    

?>