<?php

class ordenarjerarquiaModel {
	
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
	var $niveles;
	
	
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
	 
	 
	 
	 function ObtenerJerarquias($id){
	 	
		$sql = "SELECT * FROM JERARQUIAS WHERE PADRE = '$id' ORDER BY ORDEN" ;

		$this->niveles = array();
		foreach(database::getRows($sql) as $row)
			$this->niveles[] = $row;
		/*
	    $result = database::executeQuery($sql);
	    while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		
	          $this->niveles[] = $row;
		
        }
		*/
	 }
	 
	 
	
}

?>