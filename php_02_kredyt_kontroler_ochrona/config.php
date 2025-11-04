<?php 
define('_SERVER_NAME', 'localhost:80');
define('_SERVER_URL', 'http://' . _SERVER_NAME);
define('_APP_ROOT', '/php_02_kredyt_kontroler_ochrona');
define('_APP_URL', _SERVER_URL . _APP_ROOT);
define('_ROOT_PATH', dirname(__FILE__));

function out(&$param){
    if (isset($param)){
        echo htmlspecialchars($param);
    }
}
?>
