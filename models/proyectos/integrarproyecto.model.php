<?php
require 'libs/PHPMailer/PHPMailerAutoload.php';

class integrarProyectoModel {


	private $idProyecto;
	private $nomProyecto;
	private $descripcion;
    private $contPlanE;
	private $estaEnplanO;
	private $estaPpto;


    var $planes;
	var $totalnum;
	var $totalPag;
	var $lineas;
	var $objetivosE;
	var $resultados;

	private $campos;

	//upload
	private $tipo;
	private $titulo;
	private $descripcionModal;
	private $imagen;
	private $adjunto;

	var $archivos;
	var $objetivosEspecificos;
	var $distribucion_Inversion;
	var $comentarios;




	function __construct() {

	}


	function getProyecto($id){

	  $sql = "SELECT * FROM PROYECTOS WHERE PK1='$id'";
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}

	 function getObjetivosEspecificos($id){



		$this->objetivosEspecificos = array();

		$sql = "SELECT * FROM OBJETIVOS_ESPECIFICOS WHERE PK_PROYECTO = '$id' ORDER BY ORDEN";

		database::newConnection('UANAHUACSQL01','webapp2','P@$$w0rd','proyectos');
	    //$result = database::executeQuery($sql);
	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
			$this->objetivosEspecificos[] = $row;

        }


    }


	function getDistribucionInversion($id){
		$this->distribucion_Inversion = array();

		$sql = "SELECT * FROM DISTRIBUCION_INVERSION WHERE PK_PROYECTO = '$id' ORDER BY ORDEN";

	    //$result = database::executeQuery($sql);
	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

			$this->distribucion_Inversion[] = $row;

        }
    }


	function getPlanE($id){

	    $sql = "SELECT * FROM PL_PESTRATEGICOS WHERE PK1='$id'";

		database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}

	function getPlanO($id){


	    $sql = "SELECT * FROM PL_POPERATIVOS WHERE PK1='$id'";
		database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}


	function getInversion_Interna($id){

	  $sql = "SELECT * FROM FINVERSION_INTERNA WHERE PK_PROYECTO='$id'";
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}

   function getInversion_Externa($id){

	  $sql = "SELECT * FROM FINVERSION_EXTERNA WHERE PK_PROYECTO='$id'";
		$row = database::getRow($sql);

		if($row){
			return $row;
		}else{
			return FALSE;
		}
	}


	function getLineasPlane($id){

		$this->lineas = array();

		$sql = "SELECT * FROM PL_PESTRATEGICOS_LINEASE WHERE PK_PESTRATEGICO = '$id' ORDER BY ORDEN";

		  database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
	    //$result = database::executeQuery($sql);
	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

			$this->lineas[] = $row;

        }

     	}

		function getLineaPlane($idLe,$id){


		$sql = "SELECT LINEA FROM PL_PESTRATEGICOS_LINEASE WHERE PK1 = '$idLe' AND PK_PESTRATEGICO = '$id' ";

		  database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
		  $row = database::getRow($sql);
		    if($row){
		    	return $row['LINEA'];
		   }else{
			return '';
		    }

     	}

		function getObjetivoE($idOE,$id){

		   $sql = "SELECT OBJETIVO FROM PL_PESTRATEGICOS_OBJETIVOSE WHERE PK1 = '$idOE' AND PK_LESTRATEGICA = '$id'";

		   database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');

	     $row = database::getRow($sql);
		    if($row){
		    	return $row['OBJETIVO'];
		   }else{
			return '';
		    }

		}
		 function getObjetivosE($id){


		   $this->objetivosE = array();

		   $sql = "SELECT * FROM PL_PESTRATEGICOS_OBJETIVOSE WHERE PK_LESTRATEGICA = '$id' ORDER BY ORDEN";

		   database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
	       //$result = database::executeQuery($sql);

	        //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			foreach(database::getRows($sql) as $row){

	         $this->objetivosE[] = $row;

            }



   	    }

		function getResultado($idRes,$idPlan){

		$strLineaE = "";
	/*	if(isset($_GET['idLineaE'])){
			$strLineaE = "AND PK_LESTRATEGICA = '".$_GET['idLineaE']."' ";
		}else{
			$strLineaE = "";
		}*/

		$sql = "SELECT * FROM PL_POPERATIVOS_OBJETIVOST WHERE PK1 = '$idRes' AND PK_POPERATIVO = '$idPlan' $strLineaE ";

		    $row = database::getRow($sql);
		    if($row){
		    	return $row['OBJETIVO'];
		   }else{
			return '';
		    }

    	  }









		function getResultados($idPlan){

		$this->resultados = array();
		$strLineaE = "";
	/*	if(isset($_GET['idLineaE'])){
			$strLineaE = "AND PK_LESTRATEGICA = '".$_GET['idLineaE']."' ";
		}else{
			$strLineaE = "";
		}*/

		$sql = "SELECT * FROM PL_POPERATIVOS_OBJETIVOST WHERE PK_POPERATIVO = '$idPlan' $strLineaE ORDER BY ORDEN";

		    database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
	        //$result = database::executeQuery($sql);
	        //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			foreach(database::getRows($sql) as $row){

	         $this->resultados[] = $row;

             }
    	  }


		 function eliminarInversionInterna($idProyecto){

			$sql = "SELECT * FROM FINVERSION_INTERNA WHERE PK_PROYECTO='$idProyecto'";
			$row = database::getRow($sql);

			if($row){
			   $sql = "DELETE FROM FINVERSION_INTERNA WHERE PK_PROYECTO = '$idProyecto'";
	   		   database::executeQuery($sql);
      	       return true;

			}


	     }

		  function eliminarInversionExterna($idProyecto){

			$sql = "SELECT * FROM FINVERSION_EXTERNA WHERE PK_PROYECTO='$idProyecto'";
			$row = database::getRow($sql);

			if($row){
			   $sql = "DELETE FROM FINVERSION_EXTERNA WHERE PK_PROYECTO = '$idProyecto'";
	   		   database::executeQuery($sql);
      	       return true;

			}


	     }

		function getEstadoProyecto($id){


			$estado="";
			$sql = "SELECT ESTADO FROM PROYECTOS WHERE PK1 = '$id' ";


		    $row = database::getRow($sql);

		    switch(trim($row['ESTADO'])){

				case "E"://G
					$estado = '<span class="label label-warning">Elaborando</span>';
			  		break;


			    case "RP":
					$estado = '<span class="label label-warning">Revisión Preliminar</span>';

			  		break;

				case "R":
					$estado = '<span class="label label-warning">Revisando Centro</span>';
			  		break;


				case "S":
					$estado = '<span class="label label-success">Elaborando Informe</span>';
			  		break;


				case "I":
					$estado = '<span class="label label-revision">Revisando Informe</span>';
			  		break;

				case "T":
					$estado = '<span class="label label-important">Terminado</span>';
			  		break;

			  	default:
				$estado = '<span class="label label-warning">Pendiente</span>';
			  		break;
			  }


			  return $estado;

		 }




		function UploadFile($tipo, $titulo, $descripcion, $idproyecto, $imagen, $adjunto,$nomRImage){

		$this->tipo	= $tipo;
		$this->titulo =	$titulo;
		$this->descripcionModal = $descripcion;
		$this->idproyecto = $idproyecto;
		$this->imagen = $imagen;
		$this->adjunto = $adjunto;



		$usuario = $_SESSION['session']['user'];

		$idArchivo=uniqid($this->tipo);
		//echo 'entro aqui model'.$idArchivo;

		$this->campos = array('PK1'=>$idArchivo,
		                     'NOMBRE'=>$nomRImage,
	                         'TITULO'=>$this->titulo,
							 'ORDEN'=>'',
							 'DESCRIPCION'=>$this->descripcionModal,
							 'PK_PROYECTO'=>$this->idproyecto,
							 'TIPO'=>$this->tipo,
							 'IMAGEN'=>$this->imagen,
							 'ADJUNTO'=>$this->adjunto,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );

		database::insertRecords("ADJUNTOS_PROYECTO",$this->campos);

	}

	function buscarArchivos($num){

		$this->archivos = array();
       // maximo por pagina


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
			$categorias = "AND TIPO IN( $filter ) ";

		}else{
			$categorias = "";
		}

		$adjunto="";

	   if($num == 1){$adjunto = "media/proyectos/analisisM/%";}
	   else if($num == 2){$adjunto = "media/proyectos/analisisF/%";}
	   else{$adjunto = "media/proyectos/anexos/%";}



	$sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY FECHA_R ) AS RowNum, *
          FROM      ADJUNTOS_PROYECTO
          WHERE     ADJUNTO like '$adjunto'
        ) AS RowConstrainedResult
ORDER BY $order";



		   if(isset($_GET['q']) && $_GET['q']!= ""){
			$sql .= "AND (TITULO LIKE '%".$_GET['q']."%') ";
		    }


        //$result = database::executeQuery($sql);

        $total = database::getNumRows($sql);
	    $this->totalnum = $total;


	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

			$this->archivos[] = $row;

        }


	  }

	  function buscarArchivosEdit($num, $idProyecto){

		$this->archivos = array();
       // maximo por pagina


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
			$categorias = "AND TIPO IN( $filter ) ";

		}else{
			$categorias = "";
		}

		$adjunto="";
		 if($num == 1){$adjunto = "media/proyectos/analisisM/%";}
	   else if($num == 2){$adjunto = "media/proyectos/analisisF/%";}
	   else if($num == 3){$adjunto = "media/proyectos/anexos/%";}
	   else if($num == 4){$adjunto = "media/proyectos/conclusiones/%";}
	  else{$adjunto = "media/proyectos/aspectosL/%";}



	$sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY FECHA_R ) AS RowNum, *
          FROM      ADJUNTOS_PROYECTO
          WHERE     ADJUNTO like '$adjunto' AND PK_PROYECTO = '$idProyecto'
        ) AS RowConstrainedResult
ORDER BY $order";



		   if(isset($_GET['q']) && $_GET['q']!= ""){
			$sql .= "AND (TITULO LIKE '%".$_GET['q']."%') ";
		    }


        //$result = database::executeQuery($sql);

        $total = database::getNumRows($sql);
	    $this->totalnum = $total;


	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

	    $this->archivos[] = $row;

        }


	  }



		 function EditFile($idArchivo,$tipo, $titulo, $descripcionModal, $idProyecto, $imagen, $adjunto, $nomRImage){

			//$idevidencia = $this->idevidencia;
		$this->tipo	= $tipo;
		$this->titulo =	$titulo;
		$this->descripcionModal = $descripcionModal;
		$this->idProyecto = $idProyecto;
		$this->imagen = $imagen;
		$this->adjunto = $adjunto;



			$usuario = $_SESSION['session']['user'];

			$this->campos = array('NOMBRE'=>$nomRImage,
			                 'TITULO'=>$this->titulo,
							 'DESCRIPCION'=>$this->descripcionModal,
							 'PK_PROYECTO'=>$this->idProyecto,
							 'TIPO'=>$this->tipo,
							 'IMAGEN'=>$this->imagen,
							 'ADJUNTO'=>$this->adjunto,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );

		    $condition = "PK1 = '$idArchivo'";

		    database::updateRecords("ADJUNTOS_PROYECTO",$this->campos,$condition);

		}


	  function EliminarArchivo($idArchivo){

		$sql = "DELETE FROM ADJUNTOS_PROYECTO WHERE PK1 = '$idArchivo'";
	    database::executeQuery($sql);
        return true;

	}

	function getArchivo($id){

		/*$adjunto="";

	   if($num == 1){$adjunto = "media/proyectos/analisisM/%";}
	   else if($num == 2){$adjunto = "media/proyectos/analisisF/%";}
	   else{$adjunto = "media/proyectos/anexos/%";}*/


		$sql = "SELECT * FROM ADJUNTOS_PROYECTO WHERE PK1 = '$id'";
		$row = database::getRow($sql);
		if($row){
			return $row;
		}else{
			return FALSE;
		}
	 }



	/*function GuardarProyectoModel($idProyecto, $nomProyecto , $descripcion="", $contPlanE, $estaEnplanO, $estaPpto) {

	  $this->idProyecto = $idProyecto;
	  $this->nomProyecto = $nomProyecto;
	  $this->descripcion = $descripcion;
      $this->contPlanE = $contPlanE;
	  $this->estaEnplanO = $estaEnplanO;
	  $this->estaPpto = $estaPpto;




	}	*/


    function GuardarProyecto(){

		$idProyecto = $_POST['idProyecto'];
		$nomProyecto = $_POST['nomProyecto'];
		$descripcion = $_POST['descripcion'];
		$contPE = $_POST['contPE'];
		$estaEnPO = $_POST['estaEnPO'];
		$estaPpto = $_POST['estaPpto'];
		$totalInv = $_POST['totalInv'];

		$ban = false;

		   if(isset($_POST['ftesInvInt_array'])){
		   	     $ftesInvInt_array = $_POST['ftesInvInt_array'];
				    for($i=0;$i < count($ftesInvInt_array);$i++){
					   if($ftesInvInt_array[$i] == 1){$ban = true;}
			        }
		     }

		if((isset($_POST['fIIM'])&& $_POST['fIIM']!= "") || $ban == true){

			$fIIM = $_POST['fIIM'];

			//  $idFInversion_Interna = strtoupper(substr(uniqid('II'), 0, 15));
			$idFInversion_Interna = $this->fuentesInversionInterna($idProyecto, $fIIM, $ftesInvInt_array);


		}else{
			//corroborar si se actualiza los datos en blanco
		$this->eliminarInversionInterna($idProyecto);

			$fIIM = "";
			$idFInversion_Interna = "";
		}


		$ban2 = false;
	if(isset($_POST['ftesInvExt_array'])){
	    $ftesInvExt_array = $_POST['ftesInvExt_array'];
		  for($i=0;$i < count($ftesInvExt_array);$i++){
		    if($ftesInvExt_array[$i] == 1){$ban2 = true;}
	      }
	   }


		if((isset($_POST['fIEM'])&& $_POST['fIEM']!= '') || $ban2 == true){
			$fIEM = $_POST['fIEM'];
			// $idFInversion_Externa = strtoupper(substr(uniqid('IE'), 0, 15));

			$idFInversion_Externa = $this->fuentesInversionExterna($idProyecto, $fIEM, $ftesInvExt_array);


		}else{

			//corroborar si se actualiza los datos en blanco
		    $this->eliminarInversionExterna($idProyecto);

			$fIIM = "";
			$idFInversion_Externa = "";
		}

		$tEjecucion = (string)$_POST['tEjecucion'];
		$jerarquia = $_POST['jerarquia'];
		$estado = $_POST['estado'];;
		$antecedentes = $_POST['antecedentes'];
		$iMI = $_POST['iMI'];
		$idPlanE = $_POST['idPlanE'];
		$idPlanO = $_POST['idPlanO'];
		$idLineaE = $_POST['idLineaE'];
		$idObjE = $_POST['idObjE'];
		$idResultado = $_POST['idResultado'];
		$contLineaObj = $_POST['contLineaObj'];
		//$estaPresAnual = $_POST['estaPresAnual'];
		//$mtoPres = $_POST['mtoPres'];
		//$partida = $_POST['partida'];
		//$iPA = $_POST['iPA'];
		$pNEstatutos = $_POST['pNEstatutos'];
		$objGral = $_POST['objGral'];

		$dCProyecto = $_POST['dCProyecto'];
		$participantes = $_POST['participantes'];
		$proveedores = $_POST['proveedores'];
		$oferta = $_POST['oferta'];
		$demanda = $_POST['demanda'];
		$balOfertaDeman = $_POST['balOfertaDeman'];
		$sPrecios = $_POST['sPrecios'];
		$canalDist = $_POST['canalDist'];
		$promocion = $_POST['promocion'];
		$ftesInf = $_POST['ftesInf'];
		$localizacion = $_POST['localizacion'];
		$dispRecursos = $_POST['dispRecursos'];
		$consLegales = $_POST['consLegales'];
		$consJuridicas = $_POST['consJuridicas'];
		$consPatrimoniales = $_POST['consPatrimoniales'];
		//$planInversion = $_POST['planInversion'];
		$descInterna = $_POST['descInterna'];
		$descExterna = $_POST['descExterna'];

		//$evalFinanciera = $_POST['evalFinanciera'];
		$vPN = $_POST['vPN'];
		$rBC = $_POST['rBC'];
		$tIR = $_POST['tIR'];
		$ptoEqui = $_POST['ptoEqui'];
		$eResponsable = $_POST['eResponsable'];
		$conclusiones = $_POST['conclusiones'];
		$consideraciones = $_POST['consideraciones'];

		//checar validacion
		if(isset($_POST['seguimiento'])&& $_POST['seguimiento'] != ''){
			$objEspec = explode("|",$_POST['seguimiento']);
			$this->guardarObjetivosEspecificos($idProyecto, $objEspec);
		}



		if(isset($_POST['seguimiento2'])&& $_POST['seguimiento2'] != ''){
			$dIString =  explode("|",$_POST['seguimiento2']);
			$this->guardarDistribucionInversion($idProyecto, $dIString);
		}




		$sql = "SELECT * FROM PROYECTOS WHERE PK1 = '$idProyecto'";
		$row = database::getRow($sql);


		if($row){


			$this->campos = array(
	                         'PROYECTO'=>$nomProyecto,
							 'DESCRIPCION'=>$descripcion,
							 'CONT_PE'=>$contPE,
							 'CONT_PO'=>$estaEnPO,
							 'INC_PRESUPUESTO'=>$estaPpto,
							 'INVERSION'=>$totalInv,
							 'PK_FINVERSION_INTERNA'=>$idFInversion_Interna,
							 'PK_FINVERSION_EXTERNA'=>$idFInversion_Externa,
							 'TIEMPO_EJECUCION'=>$tEjecucion,
							 'PK_JERARQUIA'=>$jerarquia,
							 'ANTECEDENTES'=>$antecedentes,
							 'IMI'=>$iMI,
							 'PK_PESTRATEGICO'=>$idPlanE,
							 'PK_POPERATIVO'=>$idPlanO,
							 'PK_LESTRATEGICA'=>$idLineaE,
							 'PK_OESTRATEGICA'=>$idObjE,
							 'PK_RESULTADO'=>$idResultado,
							 'CONT_PROYECTO'=>$contLineaObj,
							 //'CONS_PRESUPUESTO'=>$estaPresAnual,
							 //'MONTO_PRESUPUESTADO'=>$mtoPres,
							 //'PARTIDA'=>$partida,
							 //'IMPLICACIONES'=>$iPA,
							 'PROTOCOLOS'=>$pNEstatutos,
							 'OBJETIVO_GENERAL'=>$objGral,
							 'CARACTERISTICAS'=>$dCProyecto,
							 'PARTICIPANTES'=>$participantes,
							 'PROVEEDORES'=>$proveedores,
							 'OFERTA'=>$oferta,
							 'DEMANDA'=>$demanda,
							 'BOFERTA'=>$balOfertaDeman,
							 'SPRECIOS'=>$sPrecios,
							 'CDISTRIBUCION'=>$canalDist,
							 'PROMOCION'=>$promocion,
							 'FINFORMACION'=>$ftesInf,
							 'LOCALIZACION'=>$localizacion,
							 'DRECURSOS'=>$dispRecursos,
							 'CLEGALES'=>$consLegales,
							 'CJURIDICAS'=>$consJuridicas,
							 'CPATRIMONIALES'=>$consPatrimoniales,
							 //'PINVERSIONES'=>$planInversion,
							 'DESC_INTERNA'=>$descInterna,
							 'DESC_EXTERNA'=>$descExterna,
							// 'EFINANCIERA'=>$evalFinanciera,
							 'VPN'=>$vPN,
							 'RBC'=>$rBC,
							 'TIR'=>$tIR,
							 'PUNTOE'=>$ptoEqui,
							 'EDIRECTIVO'=>$eResponsable,
						     'CONCLUSIONES'=>$conclusiones,
							 'CONSIDERACIONES'=>$consideraciones,
							 'ESTADO'=>$estado,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );


			$condition = "PK1 = '$idProyecto' ";

		    database::updateRecords("PROYECTOS",$this->campos,$condition);

		}
		else{

			$this->campos = array('PK1'=>$idProyecto,
	                         'PROYECTO'=>$nomProyecto,
							 'DESCRIPCION'=>$descripcion,
							 'CONT_PE'=>$contPE,
							 'CONT_PO'=>$estaEnPO,
							 'INC_PRESUPUESTO'=>$estaPpto,
							 'INVERSION'=>$totalInv,
							 'PK_FINVERSION_INTERNA'=>$idFInversion_Interna,
							 'PK_FINVERSION_EXTERNA'=>$idFInversion_Externa,
							 'TIEMPO_EJECUCION'=>$tEjecucion,
							 'PK_JERARQUIA'=>$jerarquia,
							 'ANTECEDENTES'=>$antecedentes,
							 'IMI'=>$iMI,
							 'PK_PESTRATEGICO'=>$idPlanE,
							 'PK_POPERATIVO'=>$idPlanO,
							 'PK_LESTRATEGICA'=>$idLineaE,
							 'PK_OESTRATEGICA'=>$idObjE,
							 'PK_RESULTADO'=>$idResultado,
							 'CONT_PROYECTO'=>$contLineaObj,
							 //'CONS_PRESUPUESTO'=>$estaPresAnual,
							 //'MONTO_PRESUPUESTADO'=>$mtoPres,
							 //'PARTIDA'=>$partida,
							 //'IMPLICACIONES'=>$iPA,
							 'PROTOCOLOS'=>$pNEstatutos,
							 'OBJETIVO_GENERAL'=>$objGral,
							 'CARACTERISTICAS'=>$dCProyecto,
							 'PARTICIPANTES'=>$participantes,
							 'PROVEEDORES'=>$proveedores,
							 'OFERTA'=>$oferta,
							 'DEMANDA'=>$demanda,
							 'BOFERTA'=>$balOfertaDeman,
							 'SPRECIOS'=>$sPrecios,
							 'CDISTRIBUCION'=>$canalDist,
							 'PROMOCION'=>$promocion,
							 'FINFORMACION'=>$ftesInf,
							 'LOCALIZACION'=>$localizacion,
							 'DRECURSOS'=>$dispRecursos,
							 'CLEGALES'=>$consLegales,
							 'CJURIDICAS'=>$consJuridicas,
							 'CPATRIMONIALES'=>$consPatrimoniales,
							 //'PINVERSIONES'=>$planInversion,
							 'DESC_INTERNA'=>$descInterna,
							 'DESC_EXTERNA'=>$descExterna,
							 //'EFINANCIERA'=>$evalFinanciera,
							 'VPN'=>$vPN,
							 'RBC'=>$rBC,
							 'TIR'=>$tIR,
							 'PUNTOE'=>$ptoEqui,
							 'EDIRECTIVO'=>$eResponsable,
							 'CONCLUSIONES'=>$conclusiones,
							 'CONSIDERACIONES'=>$consideraciones,
							 'ESTADO'=>$estado,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );

		database::insertRecords("PROYECTOS",$this->campos);

		}





	}


	function guardarObjetivosEspecificos($idProyecto, $objEspec){


		     $sql = "SELECT * FROM OBJETIVOS_ESPECIFICOS WHERE PK_PROYECTO = '$idProyecto'";
			 $numobjetivosbase =  database::getNumRows($sql);
		     $numObjEspec = sizeof($objEspec)-1;

	                    	if($numobjetivosbase>$numObjEspec){
		                    for($x=$numObjEspec;$x<=$numobjetivosbase;$x++){
	                     	$sql = "DELETE FROM OBJETIVOS_ESPECIFICOS WHERE PK_PROYECTO = '$idProyecto' AND ORDEN='$x'";
		                    database::executeQuery($sql);
		                       }
		                    }


			 if($numobjetivosbase){
			 if($numObjEspec>$numobjetivosbase){


		                    for($i=$numobjetivosbase;$i< $numObjEspec;$i++){
								$idObjEspec1 =  strtoupper(substr(uniqid('OE'), 0, 15));
		                     $campos = array('PK1'=>$idObjEspec1,
			   				 'OBJETIVO'=>$objEspec[$i],
	                         'PK_PROYECTO'=>$idProyecto,
							 'ORDEN'=>$i,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );

		                  database::insertRecords("OBJETIVOS_ESPECIFICOS",$campos);
		                  }
	                    }

			for($i=0;$i<sizeof($objEspec)-1;$i++){

		           $campos = array('OBJETIVO'=>$objEspec[$i],
	                         //'PK_PROYECTO'=>$idProyecto,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );

		           $condition = "PK_PROYECTO = '$idProyecto' AND ORDEN = '$i'";

		           database::updateRecords("OBJETIVOS_ESPECIFICOS",$campos,$condition);
		        }


		}else{

			for($i=0;$i<sizeof($objEspec)-1;$i++){

		       $idObjEspec =  strtoupper(substr(uniqid('OE'), 0, 15));

		       $campos = array('PK1'=>$idObjEspec,
			   				 'OBJETIVO'=>$objEspec[$i],
	                         'PK_PROYECTO'=>$idProyecto,
							 'ORDEN'=>$i,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );


		database::insertRecords("OBJETIVOS_ESPECIFICOS",$campos);
		}


		}


	}


	function guardarDistribucionInversion($idProyecto, $dIString){

		 $sql = "SELECT * FROM DISTRIBUCION_INVERSION WHERE PK_PROYECTO = '$idProyecto'";
			 $numDInversionbase =  database::getNumRows($sql);
		     $numDInversion = sizeof($dIString)-1;

	                    	if($numDInversionbase>$numDInversion){
		                    for($x=$numDInversion;$x<=$numDInversionbase;$x++){
	                     	$sql = "DELETE FROM DISTRIBUCION_INVERSION WHERE PK_PROYECTO = '$idProyecto' AND ORDEN='$x'";
		                    database::executeQuery($sql);
		                       }
		                    }


			 if($numDInversionbase){


				 if($numDInversion>$numDInversionbase){

		         for($i=$numDInversionbase;$i< $numDInversion;$i++){
			   $dInversion = explode("^",$dIString[$i]);

		       $idDInversion =  strtoupper(substr(uniqid('DI'), 0, 15));
		       $campos = array('PK1'=>$idDInversion,
	                         'CONCEPTO'=>$dInversion[0],
							 'MONTO'=>$dInversion[1],
							 'PK_PROYECTO'=>$idProyecto,
							 'ORDEN'=>$i,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );


		database::insertRecords("DISTRIBUCION_INVERSION",$campos);
		                  }
	                    }

				for($i=0;$i<sizeof($dIString)-1;$i++){

		      $dInversion = explode("^",$dIString[$i]);

		      $idDInversion =  strtoupper(substr(uniqid('DI'), 0, 15));

		       $campos = array(
			                 'CONCEPTO'=>$dInversion[0],
							 'MONTO'=>$dInversion[1],
							 'PK_PROYECTO'=>$idProyecto,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );

		           $condition = "PK_PROYECTO = '$idProyecto' AND ORDEN = '$i'";
		           database::updateRecords("DISTRIBUCION_INVERSION",$campos,$condition);


			 }

			}else{

		      for($i=0;$i<sizeof($dIString)-1;$i++){

		      $dInversion = explode("^",$dIString[$i]);

		       $idDInversion =  strtoupper(substr(uniqid('DI'), 0, 15));
		       $campos = array('PK1'=>$idDInversion,
	                         'CONCEPTO'=>$dInversion[0],
							 'MONTO'=>$dInversion[1],
							 'PK_PROYECTO'=>$idProyecto,
							 'ORDEN'=>$i,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );


		database::insertRecords("DISTRIBUCION_INVERSION",$campos);
		          }

			 }


	}


	function fuentesInversionInterna($idProyecto, $fIIM, $ftesInvInt_array){


		$sql = "SELECT * FROM FINVERSION_INTERNA WHERE PK_PROYECTO = '$idProyecto'";
		$row = database::getRow($sql);

		$idFInversion_Interna="";

		if($row){


			$campos = array(// 'PK_PROYECTO'=>$idProyecto,
			   				 'PRESUPUESTO'=>$ftesInvInt_array[0],
							 'AHORRO'=>$ftesInvInt_array[1],
							 'SUBEJERCICIO'=>$ftesInvInt_array[2],
							 'TRASPASO'=>$ftesInvInt_array[3],
							 'AMPLIACION'=>$ftesInvInt_array[4],
	                         'MONTO'=>$fIIM,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );

				$condition = "PK_PROYECTO = '$idProyecto' ";

		    database::updateRecords("FINVERSION_INTERNA",$campos,$condition);

 //para el id de inversion guardar en la tabla proyectos por si se guardaron datos vacios en PK_FINVERSION_INTERNA
			   $idFInversion_Interna = trim($row['PK1']);

		}else{
			 $idFInversion_Interna = strtoupper(substr(uniqid('II'), 0, 15));
			$campos = array('PK1'=>$idFInversion_Interna,
			   				 'PK_PROYECTO'=>$idProyecto,
			   				 'PRESUPUESTO'=>$ftesInvInt_array[0],
							 'AHORRO'=>$ftesInvInt_array[1],
							 'SUBEJERCICIO'=>$ftesInvInt_array[2],
							 'TRASPASO'=>$ftesInvInt_array[3],
							 'AMPLIACION'=>$ftesInvInt_array[4],
	                         'MONTO'=>$fIIM,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );


		database::insertRecords("FINVERSION_INTERNA",$campos);

		}

		return $idFInversion_Interna;
	}

	function fuentesInversionExterna($idProyecto, $fIEM, $ftesInvExt_array){

		$sql = "SELECT * FROM FINVERSION_EXTERNA WHERE PK_PROYECTO = '$idProyecto'";
		$row = database::getRow($sql);
		$idFInversion_Externa="";

		if($row){

			 $campos = array(//'PK_PROYECTO'=>$idProyecto,
			   				 'DONATIVOPRES'=>$ftesInvExt_array[0],
							 'DONATIVONOPRES'=>$ftesInvExt_array[1],
							 'CREDITO'=>$ftesInvExt_array[2],
							 'OTROS'=>$ftesInvExt_array[3],
	                         'MONTO'=>$fIEM,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );

			$condition = "PK_PROYECTO = '$idProyecto' ";

		    database::updateRecords("FINVERSION_EXTERNA",$campos,$condition);
	//para el id de inversion guardar en la tabla proyectos por si se guardaron datos vacios en PK_FINVERSION_externa
			   $idFInversion_Externa = trim($row['PK1']);


		}else{
			$idFInversion_Externa = strtoupper(substr(uniqid('IE'), 0, 15));
			$campos = array('PK1'=>$idFInversion_Externa,
			   				 'PK_PROYECTO'=>$idProyecto,
			   				 'DONATIVOPRES'=>$ftesInvExt_array[0],
							 'DONATIVONOPRES'=>$ftesInvExt_array[1],
							 'CREDITO'=>$ftesInvExt_array[2],
							 'OTROS'=>$ftesInvExt_array[3],
	                         'MONTO'=>$fIEM,
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 'FECHA_M'=>NULL,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 );


		database::insertRecords("FINVERSION_EXTERNA",$campos);

		}
		return $idFInversion_Externa;

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

		 //SELECT PK_JERARQUIA FROM USUARIOS_JERARQUIA WHERE PK_USUARIO = 'red'

		 $row = database::getRow($sql);

		 $jeararquias = "'".str_replace(",","','",$row['JERARQUIAS'])."'";

		 $filter = " AND PK_JERARQUIA IN( $jeararquias )";
		}


        $sql = "SELECT PK1, TITULO, DESCRIPCION, PK_JERARQUIA, DISPONIBLE,FECHA_I,FECHA_T,FECHA_R,PK_USUARIO,ELIMINADO
                FROM (select PK1, TITULO, DESCRIPCION, PK_JERARQUIA, DISPONIBLE,FECHA_I,FECHA_T,FECHA_R,PK_USUARIO,ELIMINADO, row_number()
                OVER (order by  $order) AS
                RowNumber FROM PL_PESTRATEGICOS	)
                Derived WHERE RowNumber BETWEEN '$offset' AND '$limit' $filter ";



		if(isset($_GET['q']) && $_GET['q']!= ""){
			$sql .= "AND (TITULO LIKE '%".$_GET['q']."%') ";
		}

		//echo $sql;

	    database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
        //$result = database::executeQuery($sql);

        $total = database::getNumRows($sql);
	    $this->totalnum = $total;


	    //while ($row =  mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

	    $this->planes[] = $row;

        }

	//CALCULAMOS EL TOTAL DE PAGINAS
	$this->totalPag = ceil($total/$limit);

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

		$filter="";

	    if(isset($_GET['filter'])){

			$jeararquias = "'".str_replace(";","','",$_GET['filter'])."'";
			$filter = " AND PK_JERARQUIA IN( $jeararquias )";

		}/*else{
			$nivel =  $_SESSION['session']['nodo'];
			$filter = "'$nivel' ";
		}*/


		 if(isset($_GET['q']) && $_GET['q']!= ""){
			$buscar = "AND (TITULO LIKE '%".$_GET['q']."%') ";
		}else{
			$buscar = "";
		}

		 $idPlanE = $_GET['idplanE'];
		 //echo $idPlanE;


	  $sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY $order ) AS RowNum, *
          FROM      PL_POPERATIVOS
          WHERE      PK_PESTRATEGICO = '$idPlanE' $filter $buscar
        ) AS RowConstrainedResult
WHERE   RowNum > $offset
    AND RowNum <= $limit
ORDER BY $order";




	     database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');
        //$result = database::executeQuery($sql);

		$sqlcount = "SELECT PK1
                     FROM PL_POPERATIVOS WHERE  PK_PESTRATEGICO = '$idPlanE' $filter ";

		$total = database::getNumRows($sqlcount);
	    $this->totalnum = $total;


	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

	    $this->planes[] = $row;

        }

	//CALCULAMOS EL TOTAL DE PAGINAS
	$this->totalPag = ceil($total/$limit);

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

	  function getNumeroComentarios($id,$num){


	   if($num == 1){$tab = "Resumen";}
	   else if($num == 2){$tab = "Identificacion";}
	   else if($num == 3){$tab = "analisisM";}
	   else if($num == 4){$tab = "aspectosT";}
	   else if($num == 5){$tab = "aspectosL";}
	   else if($num == 6){$tab = "analisisF";}
	   else if($num == 7){$tab = "programa";}
	   else if($num == 8){$tab = "eDirectivo";}
	   else if($num == 9){$tab = "conclusiones";}
	   else if($num == 10){$tab = "anexos";}

		$sql = "SELECT * FROM PROYECTOS_COMENTARIOS WHERE PK_PROYECTO = '$id' AND TAB = '$tab' ";
		$num2 = database::getNumRows($sql);
		return $num2;
	 }


	 function getComentarios($id,$num){

		$this->comentarios = array();

	   if($num == 1){$tab = "Resumen";}
	   else if($num == 2){$tab = "Identificacion";}
	   else if($num == 3){$tab = "analisisM";}
	   else if($num == 4){$tab = "aspectosT";}
	   else if($num == 5){$tab = "aspectosL";}
	   else if($num == 6){$tab = "analisisF";}
	   else if($num == 7){$tab = "programa";}
	   else if($num == 8){$tab = "eDirectivo";}
	   else if($num == 9){$tab = "conclusiones";}
	   else if($num == 10){$tab = "anexos";}

		$sql = "SELECT * FROM PROYECTOS_COMENTARIOS WHERE PK_PROYECTO = '$id' AND TAB = '$tab' ORDER BY FECHA_R DESC";
	    //$result = database::executeQuery($sql);

	   //while ($row =  mssql_fetch_array($result, MSSQL_ASSOC)) {
		  foreach(database::getRows($sql) as $row){
	    $this->comentarios[] = $row;
        }
   	}

	function insertarComentario($comentario,$idProyecto,$num,$tipo){


	   if($num == 1){$tab = "Resumen";}
	   else if($num == 2){$tab = "Identificacion";}
	   else if($num == 3){$tab = "analisisM";}
	   else if($num == 4){$tab = "aspectosT";}
	   else if($num == 5){$tab = "aspectosL";}
	   else if($num == 6){$tab = "analisisF";}
	   else if($num == 7){$tab = "programa";}
	   else if($num == 8){$tab = "eDirectivo";}
	   else if($num == 9){$tab = "conclusiones";}
	   else if($num == 10){$tab = "anexos";}

			$fechar = date("Y-m-d H:i:s");
		    $usuario = $_SESSION['session']['user'];

			$this->campos = array('COMENTARIO'=>$comentario,
							               'PK_PROYECTO'=>$idProyecto,
										   'TAB'=>trim($tab),
										   'PK_USUARIO'=>$usuario,
							               'FECHA_R'=>$fechar,
										   'TIPO'=>$tipo,
							               );

		   database::insertRecords("PROYECTOS_COMENTARIOS",$this->campos);


         $sql = "SELECT TOP 1 PK1 FROM PROYECTOS_COMENTARIOS WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idProyecto' AND TAB = '$tab' AND FECHA_R = '$fechar' ";


		 $row = database::getRow($sql);


	   		if(!empty($row))
	   		{
	    		$data=$row['PK1'];
				return $data;
         	}



			//Agregarmos la alerta
		/*
		$this->campos = array('OBJETIVO'=>$comentario,
							 'TIPO'=>"COMEN",
							 'VISTO'=>'0',
							 'URL'=>"?execute=operativo&method=default&Menu=F2&SubMenu=SF21#&p=1&s=25&sort=1&q=&filter=".$JERARQUIA."",
							 'PK_JERARQUIA'=>$this->jerarquia,
							 'PK_USUARIO'=>$_SESSION['session']['user'],
							 'FECHA_R'=>date("Y-m-d H:i:s"),
							 );

		database::insertRecords("PL_NOTIFICACIONES",$this->campos);*/



   }



	function eliminarComentario($id_comentario){

		$sql = "DELETE FROM PROYECTOS_COMENTARIOS WHERE PK1 = '$id_comentario'";
	    $result = database::executeQuery($sql);
		return true;
	}

	 function getNumComentariosGralesProyecto($id){

		$sql = "SELECT * FROM PROYECTOS_COMENTARIOS_GENERALES WHERE PK_PROYECTO = '$id'";
		$num = database::getNumRows($sql);
		return $num;
	 }


     function getComentariosGralesProyecto($id){

		$this->comentarios = array();
		$sql = "SELECT * FROM PROYECTOS_COMENTARIOS_GENERALES WHERE PK_PROYECTO = '$id' ORDER BY FECHA_R DESC";
	    //$result = database::executeQuery($sql);

		//while ($row =  mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
	    $this->comentarios[] = $row;
        }
     	}




	 function insertarComentarioGralProyecto($comentario,$idproyecto,$tipo){

			$fechar = date("Y-m-d H:i:s");
		    $usuario = $_SESSION['session']['user'];

			$this->campos = array('COMENTARIO'=>$comentario,
							               'PK_PROYECTO'=>$idproyecto,
										   'PK_USUARIO'=>$usuario,
							               'FECHA_R'=>$fechar,
										   'TIPO'=>$tipo,
							               );

		   database::insertRecords("PROYECTOS_COMENTARIOS_GENERALES",$this->campos);


		 $sql = "SELECT TOP 1 PK1 FROM PROYECTOS_COMENTARIOS_GENERALES WHERE PK_USUARIO = '$usuario' AND PK_PROYECTO = '$idproyecto' AND FECHA_R = '$fechar' ";


		 $row = database::getRow($sql);


	   		if(!empty($row))
	   		{
	    		$data = $row['PK1'];
				return $data;
         	}

   }



	function eliminarComentarioGralProyecto($id_comentario){

		$sql = "DELETE FROM PROYECTOS_COMENTARIOS_GENERALES WHERE PK1 = '$id_comentario'";
	    $result = database::executeQuery($sql);
		return true;
	}



	function EnviarAgendarPropuesta($idProyecto,$estado){

		$usuario = $_SESSION['session']['user'];

			$this->campos = array(
							 'ESTADO'=>$estado,
							 'FECHA_M'=>date("Y-m-d H:i:s"),
							 'PK_USUARIO'=>$usuario,
							 );


			$condition = "PK1 = '$idProyecto' ";

		   database::updateRecords("PROYECTOS",$this->campos,$condition);

			$sql = "SELECT * FROM PROYECTOS_ASIGNACIONES WHERE PK_PROYECTO = '".$idProyecto."' ";

		//$result = database::executeQuery($sql);

	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){

					 $passport = new Authentication();

					 if($passport->getPrivilegioRol($row['ROL'],'P339')){

								//   if($passport->getPrivilegioRol($row['ROL'],'P80')){
					$this->EnviarCorreoAgendarPropuesta($_SESSION['session']['user'],$row['PK_USUARIO'],$idProyecto);
					                //}

			          }

		}



	}



	function EnviarCorreoAgendarPropuesta($de,$para,$idProyecto){



                $sql = "SELECT * FROM USUARIOS WHERE PK1 = '$de'";

    $rowde = database::getRow($sql);



                $sql = "SELECT * FROM USUARIOS WHERE PK1 = '$para'";

    $rowpara = database::getRow($sql);





                $sql = "SELECT PROYECTO FROM PROYECTOS WHERE PK1 = '$idProyecto'";

    $row = database::getRow($sql);

                $proyecto = $row['PROYECTO'];



                $mail = new PHPMailer;

    $para = trim($rowpara['EMAIL']);





//$mail->SMTPDebug  = 2;

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.office365.com';  // Specify main and backup server

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = 'proyectos@redanahuac.mx';                            // SMTP username

$mail->Password = 'P@$$w0rd';                           // SMTP password

$mail->SMTPSecure = 'tls';

$mail->Port = '587';                            // Enable encryption, 'ssl' also accepted



$mail->From = 'proyectos@redanahuac.mx';

$mail->FromName = 'Sistema de Gestión de Propuestas de la RUA';

$mail->addAddress($para);  // Add a recipient

//$mail->addAddress('jose.ruiz@redanahuac.mx');               // Name is optional

//$mail->addReplyTo('planeacion@redanahuac.mx');

//$mail->addCC('cc@example.com');

$mail->addBCC('proyectos@redanahuac.mx');



$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->isHTML(true);                                  // Set email format to HTML



$mail->Subject =  'Propuesta integrada para presentación';

$mail->Body    = '

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title>Sistema de Gesti&oacute;n de Propuestas de la RUA</title>



<style>

                table td {border-collapse:collapse;margin:0;padding:0;}

</style>

</head>



<body>



<table width="100%" cellpadding="0" cellspacing="0" border="0">

                <tr>

                               <td valign="top" width="50%"></td>

                               <td valign="top">





<table width="640" cellpadding="0" cellspacing="0" border="0">

                <tr>

                               <td width="1" style="background:#E66500; border-top:1px solid #e3e3e3;"></td>

                               <td width="24" style="background:#E66500; border-top:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="365" align="left" valign="middle" style="background:#E66500; border-top:1px solid #e3e3e3; color:#ffffff; padding:18px 0;">

<h1 style="font-family:Segoe UI, Tahoma, sans-serif; margin:0px; font-size:12pt; line-height:19px; color:#072B60; font-weight:normal;color:#ffffff;">Se ha enviado una propuesta integrada para presentaci&oacute;n</h1>

<p style="margin:0;font-size:11pt;font-family:Segoe UI, Tahoma, sans-serif;color:#000;color:#ffffff;"></p>

                               </td>

                               <td width="15" style="background:#E66500; border-top:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="205" align="right" valign="middle" style="background:#E66500; border-top:1px solid #e3e3e3; padding:18px 0; line-height:1px;">

<img src="http://redanahuac.mx/app/proyectos/skins/default/img/logo_anahuac.png"  alt="Red de Universidades Anahuac" border="0">

                               </td>

                               <td width="29" style="background:#E66500; border-top:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="1" style="background:#E66500; border-top:1px solid #e3e3e3;"></td>

                </tr>

</table>

<!---->



<table width="640" cellpadding="0" cellspacing="0" border="0">

                <tr>

                               <td width="1" style="background:#e3e3e3;"></td>

                               <td width="24">&nbsp;</td>

                               <td width="585" valign="top" colspan="2" style="border-bottom:1px solid #e3e3e3; padding:20px 0;">



                                               <table width="585" cellpadding="0" cellspacing="0" border="0">

                                                               <tr>

                                                                              <td>

<p style="margin-top:20px;font-family:Segoe UI, Tahoma, sans-serif;color:#000;font-size:10pt;">



<p style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">La propuesta: <strong>'.$proyecto.'</strong> ha sido integrada para presentaci&oacute;n por el usuario: </p>





<!-- START AMPSCRIPT  -->

<table cellpadding="0" cellspacing="0" border="0" style="font-family:\'Segoe UI\', Tahoma, sans-serif; font-size:10pt; margin:0px;">





                <tr>



                               <td><img src="http://redanahuac.mx/app/proyectos/media/usuarios/'.$rowde['IMAGEN'].'" height="40"  widht="40" />  </td>



                               <td style="font-family:\'Segoe UI\', Segoe, Tahoma, sans-serif; font-size:10pt; line-height:15px; color:#000000;">

                               <strong> &nbsp;'.$rowde['NOMBRE'].' '.$rowde['APELLIDOS'].'</strong></td>





                </tr>



                <!---->

</table>

<!-- END AMPSCRIPT -->

<div style="margin-top:20px;font-family:\'Segoe UI\', Tahoma, sans-serif; font-size:10pt; line-height:13pt; color:#000;">





                  <p style="color:#000; font-size:10pt;font-family:Segoe UI, Tahoma, sans-serif;">Tenga en cuenta que:</p>



                  <ul style="font-family:Segoe UI, Tahoma, sans-serif;color:#000;font-size:10pt;">

                    <li>La propuesta ser&aacute; presentada al Consejo Superior de la Red de Universidades An&aacute;huac.</li>



                    <li>Una vez presentada, se le har&aacute; llegar un correo electr&oacute;nico con la resoluci&oacute;n</li>

                  </ul>



 <!--

<br><p style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">Por favor vaya a la página de inicio de sesi&oacute;n del Sistema de Gesti&oacute;n de Propuestas e ingrese con su usuario y contrase&ntilde;a:  </p>



  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">

                <tr>



                  <td style="font-family:Segoe UI, Tahoma, sans-serif; font-size:12pt; text-align:center; color:#557eb9; padding:5px 0px 5px 15px;">&nbsp;</td>



                  <td style="padding:0px 15px; font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;"><a href="http://redanahuac.mx/app/proyectos/"  title="http://redanahuac.mx/app/proyectos/" style="color:#072b60;">http://redanahuac.mx/app/proyectos/</a>.</td>

                </tr>

  </table>-->







<p style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">Atentamente, <br />Direcci&oacute;n de Estrategia y Desarrollo Corporativo <br/>

Secretar&iacute;a Ejecutiva de la Red de Universidades An&aacute;huac</p>

                                                                              </td>

                                                               </tr>

                                               </table>



                               </td>

                               <td width="29">&nbsp;</td>

                               <td width="1" style="background:#e3e3e3;"></td>

                </tr>

                <tr>

                               <td width="1" style="background:#e3e3e3; border-bottom:1px solid #e3e3e3;"></td>

                               <td width="24" style="border-bottom:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="585" valign="top" colspan="2" style="border-bottom:1px solid #e3e3e3; padding:20px 0;">



                                               <table cellpadding="0" cellspacing="0" border="0" width="585">

                                                               <tr>

                                                                              <td width="438">

                                                                                              <p style="font-family:Segoe UI, Tahoma, sans-serif; margin:0px 0px 0px 5px; color:#000; font-size:10px;">Red de Universidades An&agrave;huac | &copy; Copyright 2014. Todos los derechos reservados. <br /> Este mensaje se ha enviado desde una direcci&oacute;n de correo electr&oacute;nico no supervisada. No responda a este mensaje.<br /> <span style="color:#072B60;"><a href="#"  title="Privacidad" style="color:#072B60; text-decoration:none">Privacidad</a> | <a href="#"  title="Informaci&oacute;n legal" style="color:#072B60; text-decoration:none">Informaci&oacute;n legal</a></span></p>

                                                                              </td>

                                                                              <td width="20">&nbsp;</td>

                                                                              <td width="127"><img src="http://redanahuac.mx/portal/img/logo.png"  alt="Red de Universidades An&aacute;huac" border="0"></td>

                                                               </tr>

                                               </table>



                               </td>

                               <td width="29" style="border-bottom:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="1" style="background:#e3e3e3; border-bottom:1px solid #e3e3e3;"></td>

                </tr>

</table>



<!--  -->



                               </td>

                               <td valign="top" width="50%"></td>

                </tr>

</table>







</body>

</html>

';

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';





$mail->send();



//if(!$mail->send()) {

  // echo 'Message could not be sent.';

  // echo 'Mailer Error: ' . $mail->ErrorInfo;

  // exit;

//}




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

	function getPasos($id){

			$this->pasos = array();

		    $sql = "SELECT * FROM PASOS WHERE PK_ETAPA = '$id' ORDER BY PK1";
	        //$result = database::executeQuery($sql);
	        //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			foreach(database::getRows($sql) as $row){
	        $this->pasos[] = $row;
            }
			}




}

?>