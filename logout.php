<?php
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
require 'config.php';
require 'core/dbaccess.php';

session_start();


$campos = array('ACTIVO'=>0,
							    );
		$user = $_SESSION['session']['user'];
		$condition = "PK1 = '$user' ";
		database::updateRecords("USUARIOS",$campos,$condition);


$campos = array(
	              'APLICACION'=>'SISTEMA',
			      'MODULO'=>'SALIDA',
				  'MENSAJE'=>'LOGOUT SISTEMA',
				  'PK_USUARIO'=>$_SESSION['session']['user'],
				  'FECHA_R'=>date("Y-m-d H:i:s"),
							               );
database::insertRecords("ACTIVIDAD_USUARIO",$campos);


session_destroy();
session_unset();

header('Location:web.php');

exit;

?>