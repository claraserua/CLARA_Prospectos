<?php

class apoyosModel {


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



		if(isset($_GET['filter'])){
			$filter = "'".str_replace(";","','",$_GET['filter'])."'";
			$categorias = "WHERE TIPO IN( $filter ) ";

		}else{
			$categorias = "";
		}



		$sql ="SELECT  *
FROM	( SELECT ROW_NUMBER() OVER ( ORDER BY FECHA_R ) AS RowNum, *
		  FROM	APOYOS
		   $categorias
		) AS RowConstrainedResult
WHERE	RowNum >= $offset
	AND RowNum <= $limit
ORDER BY $order";

		echo '<input type="hidden" value="'.$sql.'" />';

		if(isset($_GET['q']) && $_GET['q']!= ""){
			$sql .= "AND (TITULO LIKE '%".$_GET['q']."%') ";
		}


		$total = database::getNumRows($sql);
		$this->totalnum = $total;


		//$rows = ;
		foreach(database::getRows($sql) as $row)
			$this->archivos[] = $row;
		/*
		$result = database::executeQuery($sql);
		while ($row = mssql_fetch_array($result, MSSQL_ASSOC)){
			$this->archivos[] = $row;
		}
		//*/

		//CALCULAMOS EL TOTAL DE PAGINAS
		$this->totalPag = ceil($total/$limit);
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
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );

		database::insertRecords("APOYOS",$this->campos);

	}


	function EditFile($idArchivo){



			$usuario = $_SESSION['session']['user'];

			$this->campos = array(//'PK1'=>$idArchivo,
							 'TITULO'=>$this->titulo,
							 'DESCRIPCION'=>$this->descripcion,
							 'AUTOR'=>$this->autor,
							 'TIPO'=>$this->tipo,
							 'IMAGEN'=>$this->imagen,
							 'ADJUNTO'=>$this->adjunto,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );


			$condition = "PK1 = '$idArchivo' ";

			database::updateRecords("APOYOS",$this->campos,$condition);

		}


	   function Eliminar($idevidencia){

		$sql = "DELETE FROM APOYOS WHERE PK1 = '$idevidencia'";
		database::executeQuery($sql);
		return true;

	}


}

?>