<?php
header('Content-Type: application/json; charset=utf-8');


class ElanceAuthentication {
	
	public function f1(){
		
		echo $_GET['callback'] . '(' . 2 . ')';
	}

}

$e = new ElanceAuthentication();
$e->f1();
//(new ElanceAuthentication()).f1();

?>