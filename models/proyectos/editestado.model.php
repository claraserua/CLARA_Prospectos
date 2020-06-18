<?php

class editestadoModel {
	

	
	var $idProyecto;
	var $estado;

	var $campos;
	
	
	function __construct() {
		
	}

    function GuardarEstadoProyecto(){
		
	$idProyecto = trim($this->idProyecto);
	$estado = $this->estado;	
		  
		  
		  
		  $this->campos = array(	                         
							 'ESTADO'=>$estado,					 					 
							 'FECHA_M'=>date("Y-m-d H:i:s"),							 
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );				
			
			
			$condition = "PK1 = '$idProyecto' ";
		 
		    database::updateRecords("PROYECTOS",$this->campos,$condition);	
		  
		  
		  
				
	}
	
	

	 
    function getProyecto($id){
		
		$sql = "SELECT PK1,PROYECTO,ESTADO FROM PROYECTOS WHERE PK1 = '$id'";   
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}
	
	
		
	
}

?>