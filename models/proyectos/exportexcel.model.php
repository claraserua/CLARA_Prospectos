<?php

class exportexcelModel {
	

	var $idplan;
	var $lineas;
	var $objetivos;
	var $medios;
	var $areas;
	var $fortalezas;
	var $objetivose;
	
	function __construct() {
		
	}
     
	 
   function getProyectos($id){
		
		$sql = "SELECT * FROM PROYECTOS WHERE PK1 = '$id'";   
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}

     function getJerarquia($id){
	 	$sql = "SELECT * FROM PL_JERARQUIAS WHERE PK1='$id'";   
		 database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');  
		$row = database::getRow($sql);	
	
		if($row){
			return $row['NOMBRE'];
		}else{
			return FALSE;
		}
	 	
	 }

     function getLineas(){
		
		$this->lineas = array();
		$id = $_GET['IDPlanE'];
		$sql = "SELECT * FROM PL_PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO = '$id' ORDER BY ORDEN";
		
        //$result = database::executeQuery($sql);
		//while  ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
	    $this->lineas[] = $row;
		
        }
		
		}
	
	
	    function getAreas($plan){
			
		$this->areas = array();
		
		$sql = "SELECT * FROM PL_POPERATIVOS_AREAS WHERE PK_POPERATIVO = '$plan' ORDER BY ORDEN";
		
        //$result = database::executeQuery($sql);
		
		//while  ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
	    $this->areas[] = $row;
		
        }
			
		}
		
		
		function getFortalezas($plan){
			
		$this->fortalezas = array();
		
		$sql = "SELECT * FROM PL_POPERATIVOS_FORTALEZAS WHERE PK_POPERATIVO = '$plan' ORDER BY ORDEN";
		
        //$result = database::executeQuery($sql);
		
		//while  ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
	    $this->fortalezas[] = $row;
		
        }
			
		}
	
	
	
	 function getObjetivosTacticos($plan,$idlinea){
		
		$this->objetivos = array();
			
		$sql = "SELECT * FROM PL_POPERATIVOS_OBJETIVOST WHERE PK_POPERATIVO = '$plan' AND PK_LESTRATEGICA = '$idlinea'  ORDER BY ORDEN";
		  
        //$objetivos = database::executeQuery($sql);
		 
		//while  ($row = mssql_fetch_array($objetivos, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
	    $this->objetivos[] = $row;
		
        }
			 
		}
	
	
	 function getObjetivosEstrategicos($linea){
	  
	  $this->objetivose = array();
	  $sql = "SELECT * FROM PL_PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$linea' ORDER BY ORDEN";
	  
	  //$objetivos = database::executeQuery($sql);
		 
		//while  ($row = mssql_fetch_array($objetivos, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
	    $this->objetivose[] = $row;
		
        }
	  
	 }
	
	  function getObjetivoEstrategico($id){
		
		$sql = "SELECT * FROM PL_PESTRATEGICOS_OBJETIVOSE WHERE PK1 = '$id'  ORDER BY ORDEN";

        $row = database::getRow($sql);
		
		if($row){
			return $row['OBJETIVO'];
		}else{
			return FALSE;
		}
	
     }
	 
	 
	 function getResponsable($id){
	 	
		$sql = "SELECT CONCAT(TITULO,' ',NOMBRE,' ',APELLIDOS) AS RESPONSABLE FROM PL_USUARIOS WHERE PK1 = '$id'";

        $row = database::getRow($sql);
		
		if($row){
			return $row['RESPONSABLE'];
		}else{
			return FALSE;
		}
	 	
	 }
	 
	 
	 
	 
	 function getMedios($id){
		
		$this->medios = array();
		
        $sql = "SELECT * FROM PL_POPERATIVOS_MEDIOS WHERE PK_OTACTICO = '$id' ORDER BY ORDEN";	
	    //$result = database::executeQuery($sql);
		
	    //while  ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
	    $this->medios[] = $row;
		
        }
		
     	}
		
		
		
		function getEvidencias($id){
		
		$evidencias = "";
        $sql = "SELECT * FROM PL_POPERATIVOS_EVIDENCIAS WHERE PK_OTACTICO = '$id' ORDER BY ORDEN";	
	    
		//$result = database::executeQuery($sql);
	    
		
		$cont=1;
	    //while ($row =  mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
			$evidencias .= $cont;
			$evidencias .=". ".$row['EVIDENCIA'];
			$evidencias .=" ";
			$cont++;
        }
     	
	
		return $evidencias;
		
		}
	
}

?>