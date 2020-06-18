<?php

class eventosModel {
	
    var $planes;
	var $totalnum;
	var $totalPag;

	
	
	function __construct() {
		
	}
	
	
	 function buscarPlanesOperativos(){
		
		$this->planes = array();
       // maximo por pagina
        $limit = $_GET["s"];
		// pagina pedida
        $pag = (int) $_GET["p"];
        if ($pag < 1)
        {
        $pag = 1;
        }
        
		$offset = ($pag-1) * $limit;
		
	    $limit =  ($limit * $pag);
   
		if(isset($_GET['sort'])){
		    
			switch($_GET['sort']){
				case 1:
				$order = "FECHA_R DESC ";	
				break;
			}
			
		}
		
		
		
	    if(isset($_GET['filter'])){
			
			$filter = "'".str_replace(";","','",$_GET['filter'])."'";
	
		}else{
			$nivel =  $_SESSION['session']['nodo'];
			$filter = "'$nivel' ";	
		}
		
		
		 if(isset($_GET['q']) && $_GET['q']!= ""){ 
			$buscar = "AND (TITULO LIKE '%".$_GET['q']."%') ";	
		}else{
			$buscar = "";
		}

				
	  $sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY $order ) AS RowNum, *
          FROM      POPERATIVOS
          WHERE     PK_JERARQUIA IN( $filter ) $buscar
        ) AS RowConstrainedResult
WHERE   RowNum > $offset
    AND RowNum <= $limit 
ORDER BY $order";	
				
		
	 

		  		  
        //$result = database::executeQuery($sql);
        
		$sqlcount = "SELECT PK1
                     FROM POPERATIVOS WHERE PK_JERARQUIA IN( $filter ) ";
		
		$total = database::getNumRows($sqlcount);      
	    $this->totalnum = $total;
	
	
	    foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		
	    $this->planes[] = $row;
		
        }
		
	//CALCULAMOS EL TOTAL DE PAGINAS
	$this->totalPag = ceil($total/$limit);

     	}
	
   
    function buscarPlanesEstrategicos(){
		
		$this->planes = array();
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
			
		}
		
	 $user =  $_SESSION['session']['user'];
	 $sql = "SELECT * FROM ROLES_USUARIO WHERE PK_USUARIO = '$user' AND PK_ROLE='R00'";
	 $result = database::getNumRows($sql);
		
	 if($result!=0){

	  $filter = "";
			
	}else{
			
		 
		 $sql = "DECLARE @jerarquia VARCHAR(8000) = ''
                   SELECT @jerarquia = @jerarquia + PK_JERARQUIA + ','
                   FROM USUARIOS_JERARQUIA 
                   where PK_USUARIO = 'red'

                   SELECT @jerarquia AS JERARQUIAS";
			
		 //SELECT PK_JERARQUIA FROM PL_USUARIOS_JERARQUIA WHERE PK_USUARIO = 'red'	
		 
		 $row = database::getRow($sql);
		 
		 $jeararquias = "'".str_replace(",","','",$row['JERARQUIAS'])."'";
			
		 $filter = " AND PK_JERARQUIA IN( $jeararquias )";
		}
		
	  	
        $sql = "SELECT PK1, TITULO, DESCRIPCION, PK_JERARQUIA, DISPONIBLE,FECHA_I,FECHA_T,FECHA_R,PK_USUARIO,ELIMINADO 
                FROM (select PK1, TITULO, DESCRIPCION, PK_JERARQUIA, DISPONIBLE,FECHA_I,FECHA_T,FECHA_R,PK_USUARIO,ELIMINADO, row_number() 
                OVER (order by  $order) AS 
                RowNumber FROM PESTRATEGICOS	) 
                Derived WHERE RowNumber BETWEEN '$offset' AND '$limit' $filter ";
				
		
		
		if(isset($_GET['q']) && $_GET['q']!= ""){ 
			$sql .= "AND (TITULO LIKE '%".$_GET['q']."%') ";	
		}
	    
		//echo $sql;
	
        //$result = database::executeQuery($sql);
	
        $total = database::getNumRows($sql);      
	    $this->totalnum = $total;
	
	
	    foreach(database::getRows($sql) as $row){ //foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		
	    $this->planes[] = $row;
		
        }
		
	//CALCULAMOS EL TOTAL DE PAGINAS
	$this->totalPag = ceil($total/$limit);

     	}
		
		
		
		//########ELIMINAMOS EL PLAN OPERATIVO#####//
		function Eliminar($id){
		
        $sql = "DELETE FROM POPERATIVOS WHERE PK1 = '$id' ";
        $result = database::executeQuery($sql);
	
	    if($result){
			$this->EliminarObjetivos($id);
		}else{
			return FALSE;
		}

     	}
		
		
		
		function EliminarObjetivos($PK_PLAN){
			
        $sql = "SELECT PK1 FROM POPERATIVOS_OBJETIVOST where PK_POPERATIVO = '$PK_PLAN' ";
        //$result = database::executeQuery($sql);
	
	    foreach(database::getRows($sql) as $row){ //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			   $id=$row['PK1'];
		       $this->eliminarEvidencias($id);
			   $this->eliminarMedios($id);
        }
		
		$sql = "DELETE FROM POPERATIVOS_OBJETIVOST where PK_POPERATIVO = '$PK_PLAN' ";
        $result = database::executeQuery($sql);
		
		
		$sql = "DELETE FROM POPERATIVOS_RESUMENE where PK_POPERATIVO = '$PK_PLAN' ";
        $result = database::executeQuery($sql);
        
        $sql = "DELETE FROM POPERATIVOS_AREAS WHERE PK_POPERATIVO = '$PK_PLAN' ";		
	    database::executeQuery($sql);
		
	    $sql = "DELETE FROM POPERATIVOS_FORTALEZAS WHERE PK_POPERATIVO = '$PK_PLAN' ";		
	    database::executeQuery($sql);
		
		
		$sql = "DELETE FROM POPERATIVOS_ASIGNACIONES where PK_POPERATIVO = '$PK_PLAN' ";
        $result = database::executeQuery($sql);
		
		
		$sql = "DELETE FROM POPERATIVOS_PERIODOS where PK_POPERATIVO = '$PK_PLAN' ";
        $result = database::executeQuery($sql);
		
		
		$sql = "DELETE FROM POPERATIVOS_COLABORADORES where PK_OPERATIVO = '$PK_PLAN' ";
        $result = database::executeQuery($sql);
		
		
		
		
		}
		
		
		
		
		function eliminarEvidencias($id){
			
		$sql = "DELETE FROM POPERATIVOS_EVIDENCIAS WHERE PK_OTACTICO = '$id' ";
        $result = database::executeQuery($sql);
	
	    if($result){
			//$this->EliminarEvidencias($PK_PLAN);
		}else{
			return FALSE;
		}
			
		}
		
		
		
		
		function eliminarMedios($id){
				
		$sql = "DELETE FROM POPERATIVOS_MEDIOS WHERE PK_OTACTICO = '$id' ";
        $result = database::executeQuery($sql);
	
	    if($result){
			//$this->EliminarEvidencias($PK_PLAN);
		}else{
			return FALSE;
		}
		
		}
		
		
		
		
		function getAsignacion($idplan,$idusuario){
		
		$sql = "SELECT * FROM POPERATIVOS_ASIGNACIONES WHERE PK_POPERATIVO = '$idplan' AND PK_USUARIO = '$idusuario'";   
		
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}
		
		
         
		function Salir(){
			
		$idplan = $_GET['IDPlan'];
			
		$camposM = array(
	              'APLICACION'=>'PLAN OPERATIVO',
			      'MODULO'=>'ELABORACION',
				  'MENSAJE'=>'EXIT PLAN OPERATIVO: '.$idplan,
				  'PK_USUARIO'=>$_SESSION['session']['user'],
				  'FECHA_R'=>date("Y-m-d H:i:s"),
							               );
	
	    database::insertRecords("ACTIVIDAD_USUARIO",$camposM);
			
		 	
		$user = $_SESSION['session']['user'];
		
		$sql = "SELECT * FROM POPERATIVOS WHERE PK1='$idplan' AND ACTIVO = '$user'";
		$row = database::getRow($sql);
	    
		
		if($row){
			$sql = "UPDATE POPERATIVOS SET ACTIVO = NULL WHERE PK1='$idplan'";	
	        $result = database::executeQuery($sql);
		}else{
			return FALSE;
		}
			
		 }		
		 
		 
		 
		 function Omitir(){
		 	

		$idplan = $_POST['idPlanOperativo'];
		$sql = "UPDATE POPERATIVOS SET ACTIVO = NULL WHERE PK1='$idplan'";	
	    $result = database::executeQuery($sql);
		
			
		 }
		 
}

?>