<?php

class addlineaspeModel {
	

	var $titulo;
	var $descripcion;
	var $jerarquia;
    var $disponible;
	var $fechai;
	var $fechat;
    var $usuario;
	var $idplan;
	
	var $lineas;
	var $objetivos;
	
	
	var $campos;
	

	
	
	function __construct() {
		
	}

    
	
	
	function GuardarLinea(){
		
	
		for($i=0;$i<sizeof($this->lineas)-1;$i++){
				
			$idlineae =  strtoupper(substr(uniqid('LE'), 0, 15));
			$this->campos = array('PK1'=>$idlineae,
	                         'LINEA'=>$this->lineas[$i],
							 'ORDEN'=>$i,
							 'PK_PESTRATEGICO'=>$this->idplan,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
	

		$result = database::insertRecords("PESTRATEGICOS_LINEASE",$this->campos);
			
	     $this->GuardarObjetivos($idlineae,$i);
			
			}
		
		
		}
	
	
	
	
	function GuardarObjetivos($idlineae,$i){
		
	
        $objetivosestrategicos = explode("|",$this->objetivos[$i]);

		for($i=0;$i<sizeof($objetivosestrategicos)-1;$i++){
				
			
			$idobjetivo =  strtoupper(substr(uniqid('OE'), 0, 15));
			$this->campos = array('PK1'=>$idobjetivo,
	                         'OBJETIVO'=>$objetivosestrategicos[$i],
							 'ORDEN'=>$i,
							 'PK_LESTRATEGICA'=>$idlineae,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );
	
		$result = database::insertRecords("PESTRATEGICOS_OBJETIVOSE",$this->campos);
			
			}
		
		
		}
	
	
	
	
	
		function getPlanEstrategico($id){
	
      	$sql = "SELECT * FROM PESTRATEGICOS WHERE PK1 = '$id' ";   
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
     	}
	
	
}

?>