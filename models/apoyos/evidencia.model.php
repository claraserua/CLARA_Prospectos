<?php

class evidenciaModel {

	var $comentarios;


	function __construct() {

	}


	 function getRecurso($id){

		$sql = "SELECT * FROM APOYOS WHERE PK1 = '$id' ";
		$row = database::getRow($sql);
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}













	  function getComentarios($id){

		$this->comentarios = array();
		$sql = "SELECT * FROM APOYOS_COMENTARIOS WHERE PK_APOYO = '$id' ORDER BY FECHA_R DESC";
		//$result = database::executeQuery($sql);

		$rows = database::getRows($sql);
		foreach($rows as $row)
			$this->comentarios[] = $row;
		/*
		while ($row =  mssql_fetch_array($result, MSSQL_ASSOC)) {
			$this->comentarios[] = $row;
		}
		//*/
	}





			function insertarComentario($comentario,$id){

			$fechar = date("Y-m-d H:i:s");
			$usuario = $_SESSION['session']['user'];

			$this->campos = array('COMENTARIO'=>$comentario,
										   'PK_APOYO'=>$id,
										   'PK_USUARIO'=>$usuario,
										   'FECHA_R'=>$fechar,
										   );

		   database::insertRecords("APOYOS_COMENTARIOS",$this->campos);


		 $sql = "SELECT TOP 1 PK1 FROM APOYOS_COMENTARIOS WHERE PK_USUARIO = '$usuario' AND PK_APOYO = '$id' AND FECHA_R = '$fechar' ";


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