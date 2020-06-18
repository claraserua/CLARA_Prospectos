<?php

class jsonganttModel {


	private $idProyecto;


	private $campos;


	public $etapa;
	public $paso;
	public $finicial;
	public $ftermino;
	public $etapas;
	public $pasos;
	public $color;



	function __construct() {

	}


			function getEtapas($id){
			$this->etapas = array();
		    $sql = "SELECT * FROM ETAPAS WHERE PK_PROYECTO = '$id' ORDER BY PK1";
	        //$result = database::executeQuery($sql);
	        //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			foreach(database::getRows($sql) as $row){
				$this->etapas[] = $row;
            }
			}



	        function agregarEtapa(){


				$usuario = $_SESSION['session']['user'];
				$idproyecto = $_POST['idProyecto'];
				$fechar = date("Y-m-d H:i:s");


				$this->campos = array(
                             'ETAPA'=>$this->etapa,
							 'PK_PROYECTO'=>$idproyecto,
							 'F_REGISTRO'=>$fechar,
							 'PK_USUARIO'=>$usuario,
							 );

		        database::insertRecords("ETAPAS",$this->campos);


				$sql = "SELECT TOP 1 PK1 FROM ETAPAS WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idproyecto' AND F_REGISTRO = '$fechar' ";


		 $row = database::getRow($sql);


	   		if(!empty($row))
	   		{
	    		$data = $row['PK1'];
				echo trim($data);
         	}




			}






		function getPasos($id){

			$this->pasos = array();

		    $sql = "SELECT * FROM PASOS WHERE PK_ETAPA = '$id' ORDER BY PK1";
	        //$result = database::executeQuery($sql);
	        //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			foreach(database::getRows($sql) as $row){
				$this->pasos[] = $row;
            }
		}


	        function agregarPaso(){

				$this->campos = array(
                             'PASO'=>$this->paso,
							 'PK_ETAPA'=>$this->etapa,
							 'F_INICIO'=>$this->finicial,
							 'F_TERMINO'=>$this->ftermino,
							 'F_REGISTRO'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 'COLOR'=>$this->color
							 );

		        database::insertRecords("PASOS",$this->campos);


		        $sql = "SELECT TOP 1 PK1 FROM PASOS WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idproyecto' AND F_REGISTRO = '$fechar' ";


		 $row = database::getRow($sql);


	   		if(!empty($row))
	   		{
	    		$data = $row['PK1'];
				echo trim($data);
         	}

			}









}

?>