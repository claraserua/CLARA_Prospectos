<?php

class adjuntosModel {
	

	var $planes;
	var $totalnum;
	var $totalPag;
	var $archivos;

	
	
	function __construct() {
		
	}

   
   
   
   function buscarArchivos(){
		
		$this->archivos = array();
       // maximo por pagina
        $limit = $_GET["s"];
		// pagina pedida
        $pag = (int) $_GET["p"];
        if ($pag < 1)
        {
        $pag = 1;
        }
        
		$offset = ($pag-1) * $limit;
		
        if(isset($_GET['sort'])){
		    
			switch($_GET['sort']){
				case 1:
				$order = "FECHA_R DESC ";	
				break;
			}
			
		}else{
			$order = "FECHA_R DESC ";	
		}
		
	
	     
		$idPlan =  $_GET['IDPlan'];
	
	
	    if(isset($_GET['filter'])){
			$filter = "'".str_replace(";","','",$_GET['filter'])."'";
			$categorias = "AND TIPO IN( $filter ) ";
	
		}else{
			$categorias = "";
		}
		
			
				
	$sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY FECHA_R ) AS RowNum, *
          FROM      PESTARTEGICOS_ADJUNTOS
          WHERE     PK_PESTRATEGICO = '$idPlan' $categorias 
        ) AS RowConstrainedResult
WHERE   RowNum >= $offset
    AND RowNum <= $limit
ORDER BY $order";			
	

				
		   if(isset($_GET['q']) && $_GET['q']!= ""){ 
			$sql .= "AND (TITULO LIKE '%".$_GET['q']."%') ";	
		}
		
		
        //$result = database::executeQuery($sql);
	
        $total = database::getNumRows($sql);      
	    $this->totalnum = $total;
	
	
	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {	
		
	    $this->archivos[] = $row;
		
        }
		
	//CALCULAMOS EL TOTAL DE PAGINAS
	$this->totalPag = ceil($total/$limit);

     	}
		
		
		
		
		
	
		function getPlan($id){
		
		$sql = "SELECT * FROM PESTRATEGICOS WHERE PK1='$id'";   
		
		 $params = array($id);
		 $row = database::getRow($sql,$params); 
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}
		
		
		
		function UploadFile(){
		
		$usuario = $_SESSION['session']['user'];
		$this->campos = array('PK1'=>uniqid($this->tipo),
	                         'TITULO'=>$this->titulo,
							 'DESCRIPCION'=>$this->descripcion,
							 'AUTOR'=>$this->autor,
							 'TIPO'=>$this->tipo,
							 'IMAGEN'=>$this->imagen,
							 'ADJUNTO'=>$this->adjunto,
							 'PK_PESTRATEGICO'=>$this->idplan,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );
	
		database::insertRecords("PESTARTEGICOS_ADJUNTOS",$this->campos);
		
	}
	
	
	function EditFile(){
		 	
			$idevidencia = $this->idevidencia;
			
			$usuario = $_SESSION['session']['user'];
			
			$this->campos = array('PK1'=>uniqid($this->tipo),
	                         'TITULO'=>$this->titulo,
							 'DESCRIPCION'=>$this->descripcion,
							 'AUTOR'=>$this->autor,
							 'TIPO'=>$this->tipo,
							 'IMAGEN'=>$this->imagen,
							 'ADJUNTO'=>$this->adjunto,
							 'PK_PESTRATEGICO'=>$this->idplan,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );
		 	
		 	
		    $condition = "PK1 = '$idevidencia' ";
		 
		    database::updateRecords("PESTARTEGICOS_ADJUNTOS",$this->campos,$condition);
			
		}
   	
	
	   function Eliminar($idevidencia){
	
		$sql = "DELETE FROM PESTARTEGICOS_ADJUNTOS WHERE PK1 = '$idevidencia'";
	    database::executeQuery($sql);
        return true;
		
	}
	
	
}

?>