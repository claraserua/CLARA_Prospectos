<?php

class asignacionesModel {

	var $articulos;
	var $tutoriales;
	var $lineamientos;
	var $links;
	var $usuarios;
	var $noticias;
	var $totalnum;
	var $totalPag;
	var $ids;



	function __construct() {

	}


	function buscarUsuarios(){

		$this->usuarios = array();
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



		$proyecto = $_GET['IDProyecto'];

  	$sql = "WITH CTE AS
(
  SELECT  A.PK1 AS ID,U.IMAGEN,U.PK1,U.NOMBRE,U.APELLIDOS,U.EMAIL,U.PK_JERARQUIA,U.DISPONIBLE,A.PK_USUARIO,A.PK_PROYECTO,A.ROL,
     ROW_NUMBER() OVER ( ORDER BY U.FECHA_R ) AS RowNum
  FROM PROYECTOS_ASIGNACIONES A, USUARIOS U
  WHERE   U.PK1 = A.PK_USUARIO AND A.PK_PROYECTO = '$proyecto'
)
SELECT * FROM CTE
WHERE RowNum >= $offset AND RowNum < $limit";





	   if(isset($_GET['q']) && $_GET['q']!= ""){
			$sql .= "AND (NOMBRE LIKE '%".$_GET['q']."%') ";
		}

		//echo $sql;

        //$result = database::executeQuery($sql);

        $total = database::getNumRows($sql);
	    $this->totalnum = $total;


	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
			$this->usuarios[] = $row;
        }

	    //CALCULAMOS EL TOTAL DE PAGINAS
	    $this->totalPag = ceil($total/$limit);

     	}


		function Eliminar(){


		foreach($this->ids as $id){

		$sql = "DELETE FROM PROYECTOS_ASIGNACIONES WHERE PK1 = '$id' ";
        $result = database::executeQuery($sql);

				}



     	}



		function getRol($id){

		$sql = "SELECT ROLE FROM ROLES WHERE PK1 = '$id'";
		$row = database::getRow($sql);
		if($row){
			return $row['ROLE'];
		}else{
			return FALSE;
		}

		}

		function getTipoRol($id){

		$sql = "SELECT TIPO FROM ROLES WHERE PK1 = '$id'";
		$row = database::getRow($sql);
		if($row){
			return $row['TIPO'];
		}else{
			return FALSE;
		}

		}


}

?>