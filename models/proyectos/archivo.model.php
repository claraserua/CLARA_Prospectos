<?php

class archivoModel {
	
    var $comentarios;
	
	
	function __construct() {
		
	}
     
	 
	 function getRecurso($id){
		
		$sql = "SELECT * FROM ADJUNTOS_PROYECTO WHERE PK1 = '$id' ";   
		$row = database::getRow($sql);
		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}
	  
		 
			 
	function getComentarios($idArchivo){
		
		$this->comentarios = array(); 
		$sql = "SELECT * FROM PROYECTOS_ADJUNTOS_COMENTARIOS WHERE PK_ADJUNTO = '$idArchivo' ORDER BY FECHA_R DESC";	
	    //$result = database::executeQuery($sql);
		//while ($row =  mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
			$this->comentarios[] = $row;
        }
	}
	
	
	function insertarComentario($comentario,$idArchivo){
	   	   		
			$fechar = date("Y-m-d H:i:s");
		    $usuario = $_SESSION['session']['user'];
			
			$this->campos = array('COMENTARIO'=>$comentario,
							               'PK_ADJUNTO'=>$idArchivo,
										   'PK_USUARIO'=>$usuario,
							               'FECHA_R'=>$fechar,
							               );
	
		   database::insertRecords("PROYECTOS_ADJUNTOS_COMENTARIOS",$this->campos);
			
		
		 $sql = "SELECT TOP 1 PK1 FROM PROYECTOS_ADJUNTOS_COMENTARIOS WHERE PK_USUARIO = '$usuario' AND PK_ADJUNTO = '$idArchivo' AND FECHA_R = '$fechar' ";  
		
		 
		 $row = database::getRow($sql); 
	 
		
	   		if(!empty($row))
	   		{
	    		$data = $row['PK1'];
				return $data;
         	}
       
   }
   
   
   function getImagen($id){
		$sql = "SELECT * FROM USUARIOS WHERE PK1 = '$id'";   
		$row = database::getRow($sql);
		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}
	
}


?>