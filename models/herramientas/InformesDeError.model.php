<?php

class InformesDeErrorModel {

	var $fichas;
	var $totalnum;
	var $totalPag;
	var $idficha;

	function __construct() { }
	
	function buscarFichas(){
		
		// maximo por pagina
        $limit = $_GET["s"];
		$tamaño = $_GET["s"];
		// pagina pedida
        $pag = (int) $_GET["p"];
        if ($pag < 1) $pag = 1;

		$offset = ($pag-1) * $limit;

		$limit = $limit * $pag;

		if(isset($_GET['sort'])){
			switch($_GET['sort']){
				case 1:
				$order = " FECHA_R DESC ";
				break;
			}
		}

		if(isset($_GET['q']) && $_GET['q']!= ""){
			$frase = $_GET['q'];
			$buscar = " WHERE (PK_PROSPECTO LIKE '%$frase%' OR ERROR LIKE '%$frase%') ";
		}else{
			$buscar = "";
		}
		
		$sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY $order ) AS RowNum, *
          FROM  ERRORES
           $buscar
        ) AS RowConstrainedResult
WHERE   RowNum > $offset
    AND RowNum <= $limit
ORDER BY $order";


		$sqlcount = "SELECT PK1 FROM ERRORES $buscar";

	    $this->totalnum = database::getNumRows($sqlcount);

		$this->fichas = array();
		foreach(database::getRows($sql) as $row)
			$this->fichas[] = $row;
		
		//CALCULAMOS EL TOTAL DE PAGINAS
		$this->totalPag = ceil($this->totalnum/$tamaño);
	}
}

?>