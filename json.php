
<?php



header("Content-Type: text/json; charset=utf-8");

session_start();

$usuario =  $_SESSION['session'];//  $_SESSION['session']['user'];
        
echo $_GET['callback'] . '(' . "{'usuario' : '$usuario'}" . ')';

?>