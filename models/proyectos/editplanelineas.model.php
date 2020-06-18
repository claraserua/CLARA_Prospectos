<?php

class editplanelineasModel {
	

	var $titulo;
	var $descripcion;
	var $jerarquia;
    var $disponible;
	var $fechai;
	var $fechat;
    var $usuario;
	var $idplan;
	var $lineas;
	var $objetivosE;
	
	
	var $campos;
	
	
	function __construct() {
		
	}
     
	 function getLineasPlane($id){
		
		$this->lineas = array();
   	
		$sql = "SELECT * FROM PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO = '$id' ORDER BY ORDEN";		
	    //$result = database::executeQuery($sql);
		
	    foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		
	   $this->lineas[] = $row;
		
        }

     	}
		
		
		function getObjetivosE($id){
		
		$this->objetivosE = array();
    
		$sql = "SELECT * FROM PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$id' ORDER BY ORDEN";	
	    //$result = database::executeQuery($sql);
		
	    foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		
	    $this->objetivosE[] = $row;
		
        }
     	}


   function isActivo($id){
   	
	    $sql = "SELECT * FROM POPERATIVOS WHERE PK_PESTRATEGICO = '$id' ";   
		$row = database::getRow($sql);

		if($row){
			return TRUE;
		}else{
			return FALSE;
		}
	
	
   }

	
	 function getPlan($id){
		
		$sql = "SELECT * FROM PESTRATEGICOS WHERE PK1 = '$id' ";   
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}
		
		
		
		function GuardarLinea(){
		
		$plane =  $this->idplan;
		
		$fecha = date("Y-m-d H:i:s");
		$usuario = $_SESSION['session']['user'];
		
		
		$sql = "SELECT PK1 FROM PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO = '$plane'";
	    $numolineasbase =  database::getNumRows($sql);
		
		$numlineas = sizeof($this->lineas)-1;
		
		if($numolineasbase>$numlineas){
			
		for($i=$numlineas;$i<=$numolineasbase;$i++){
		
		$sql = "SELECT PK1 FROM PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO='$plane' AND ORDEN = '$i'";   
		$row = database::getRow($sql);
		
		$pklinea = $row['PK1'];
		$sql = "DELETE FROM PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$pklinea'";	
		database::executeQuery($sql);
		
		
		$sql = "DELETE FROM PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO = '$plane' AND ORDEN='$i'";	
		database::executeQuery($sql);
			
			}
		
		}
		
		
	
		for($i=0;$i<sizeof($this->lineas)-1;$i++){
				
		$sql = "SELECT * FROM PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO='$plane' AND ORDEN = '$i'";   
		$row = database::getRow($sql);
				
	    if($row){
		
		$idlineae = $row['PK1'];
		$linea = $this->lineas[$i];
		
		 $this->campos = array('LINEA'=>$linea,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
		
		 $condition = "PK_PESTRATEGICO='$plane' AND ORDEN = '$i'";
		 
		database::updateRecords("PESTRATEGICOS_LINEASE",$this->campos,$condition);
		
		}else{

		$idlineae =  strtoupper(substr(uniqid('LE'), 0, 15));
	    
		$this->campos = array('PK1'=>$idlineae,
	                         'LINEA'=>$this->lineas[$i],
							 'ORDEN'=>$i,
							 'PK_PESTRATEGICO'=>$this->idplan,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
	

		$result = database::insertRecords("PESTRATEGICOS_LINEASE",$this->campos);
				    
		   }		
		   
		$this->GuardarObjetivos($idlineae,$i);	
			
			}
		
		
		}
	
	
	
	
	function GuardarObjetivos($idlineae,$i){
		
		$fecha = date("Y-m-d H:i:s");
		$usuario = $_SESSION['session']['user'];
	
        $objetivosestrategicos = explode("|",$this->objetivos[$i]);
		
		
		$sql = "SELECT PK1 FROM PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$idlineae'";
	    $numobjetivosbase =  database::getNumRows($sql);
		
		$numobjetivos = sizeof($objetivosestrategicos)-1;
		
		if($numobjetivosbase>$numobjetivos){
			
		for($i=$numobjetivos;$i<=$numobjetivosbase;$i++){
		
		$sql = "DELETE FROM PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$idlineae' AND ORDEN='$i'";	
		database::executeQuery($sql);
			}
		
		}

		for($i=0;$i<sizeof($objetivosestrategicos)-1;$i++){
				
		$objetivo =	$objetivosestrategicos[$i];
			
	    $sql = "SELECT * FROM PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$idlineae' AND ORDEN = '$i'";
		$row = database::getRow($sql);
		
		 		
	    if($row){
		 	 
		 $this->campos = array('OBJETIVO'=>$objetivo,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
		
		 $condition = "PK_LESTRATEGICA = '$idlineae' AND ORDEN = '$i'";
		 
		database::updateRecords("PESTRATEGICOS_OBJETIVOSE",$this->campos,$condition);
		 
		 
		 
			
		}else{
				
			$idobjetivo =  strtoupper(substr(uniqid('OE'), 0, 15));
			$this->campos = array('PK1'=>$idobjetivo,
	                         'OBJETIVO'=>$objetivo,
							 'ORDEN'=>$i,
							 'PK_LESTRATEGICA'=>$idlineae,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
	
		$result = database::insertRecords("PESTRATEGICOS_OBJETIVOSE",$this->campos);
			}
			
			}
			
			
			
		
		}
	
	
}

?>