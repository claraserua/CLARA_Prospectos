<?php

class editjerarquiaModel {
	
	var $image;
	var $titulo;
	var $nombre;
	var $apellidos;
	var $correo;
	var $usuario;
	var $password;
	var $jerarquia;
	var $roles;
	var $rolesUsuario;
	
	
	var $campos;
	

	
	function __construct() {
		
	}



	 function ObtenerJerarquia($id){
	 	
		$sql = "SELECT * FROM JERARQUIAS WHERE PK1 = '$id'";   
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
	 }
	 
	 
	 
	 
	
}

?>