<?php
header('Content-Type: application/json; charset=utf-8');

define('HOST','100.64.44.68:1433');
define('DB', 'prospectos');
define('USERDB', 'prospectos');
define('PWDDB', 'P@$$w0rd');
define('TYPE', 'mssql');

date_default_timezone_set('America/Los_Angeles');
require 'libs/PHPMailer/PHPMailerAutoload.php';

require_once('libs/nusoap/nusoap.php');



switch($_GET['method']){


  case "Guardar":
         Guardar();
         break;

  case "EnviarCRM":
         EnviarCRM();
         break;
         
  case "Enviar":
         Enviar();
         break;
       

   case "getNiveles":
         getNiveles();
   break;

   case "getPrograms":
			getPrograms();
			break;
			
	 case "getProgramsPos":
			getProgramsPos();
			break;		
						
   case "getUniversidades":
        getUniversidades();
		break;

	case "getEstados":
		getEstados();
		break;
	
	case "getMunicipios":
		$p_estado = $_GET['estado'];
		getMunicipios($p_estado);
		break;
		
	case "getUniversidadesPos":
		getUniversidadesPos();
		break;	
		
		
			
   default:	
	      
		  break;

}





	function Guardar()
	{
		
		$idnivel = $_GET['nivel'];
		$idprograma = $_GET['programa'];//

		$idprograma =  $idprograma == 'NONE' ? NULL : $idprograma;

		$idcampus = $_GET['campus'];
		//$idcampus =  $idcampus == 'NONE' ? NULL : $idcampus ;

		$idcampus = trim($idcampus);
		$nombre= $_GET['nombre'];
		$apellidos = $_GET['apellidos'];
		$correo = $_GET['correo'];
		$telefono = $_GET['telefono'];
		$ciudad = $_GET['ciudad'];
		$url = $_GET['url'];
		
		$campos = array(
			'PK_NIVEL'=>$idnivel,
			'PK_PROGRAMA'=>$idprograma,
			'PK_CAMPUS'=>$idcampus,
			'NOMBRE'=>$nombre,
			'APELLIDOS'=>$apellidos,
			'CORREO'=>$correo,
			'TELEFONO'=>$telefono,
			'CIUDAD'=>$ciudad,
			'URL'=>$url,
		);
		
		
		$result =  database::insertRecords("PROSPECTOS",$campos);

		$sql="SELECT @@IDENTITY AS NewSampleId";
		$rowID = database::getRow($sql);
		$idprospecto = $rowID['NewSampleId'];
		
		if($idnivel==3){//Maestrías en línea

			if($idcampus == "AP"){  SendWebServiceAP(); }
			else{
				Enviar2($idprospecto,$idcampus,$idnivel);
				if($idcampus == "UAN"){	  SendWebServiceFlowCRM(); }
			}
		}
		else if($idnivel==4||$idnivel==5|| $idnivel==6){//Maestrías presenciales, Doctorados y especialidades
			Enviar2($idprospecto,$idcampus,$idnivel);
			if($idcampus == "UAN"){   SendWebServiceFlowCRM(); }
		}
		else{
			Enviar2($idprospecto,$idcampus,$idnivel);
			
		}
		
		echo $_GET['callback']."('$idprospecto')";
		
	}
	
	//  --- END SEND CRM ---
	
	function EnviarCRM()
	{
		echo $_GET['callback']."('";
		
			$idnivel = $_GET['nivel'];
			$campus = $_GET['campus'];
			
			$result_crm='0';

			if($idnivel==3 || $idnivel==4 || $idnivel==5 || $idnivel==6){
				//Maestrías en línea
				//Maestrías presenciales, Doctorados y especialidades
			}
			else if($campus != 'UAT'){
				$result_crm = enviarProspectoCRM();
			}
			
			echo ",$result_crm";
			
		echo "')";
	}
	

	function pedirToken()
	{
		$secreto = base64_encode('$2a$12$PXtAWIwXLGUvR2RWngt.f.fBSDYltLpoIKRoHG2AF8AFbvkm15Qk.');
		$usuario = base64_encode('Rhino:'); 
		
		$authorizationHeader = $usuario.$secreto;
		
		$URL = 'http://crmbanner2.azurewebsites.net/o/Server';
		
		$crl = curl_init();

		$headr = array();
		$headr[] = 'content-type: application/json';
		$headr[] = 'Host: crmbanner2.azurewebsites.net';
		$headr[] = 'Content-length: 45';
		$headr[] = 'Authorization: Basic '.$authorizationHeader;
		
		$data = 'grant_type=password&username=Banner&password=';
		
		curl_setopt($crl, CURLOPT_URL,$URL);
		curl_setopt($crl, CURLOPT_POST,true);
		curl_setopt($crl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($crl, CURLOPT_HEADER, false); //debugear
		curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
		
		$rest = curl_exec($crl);
		
		if ($rest == false)
		{
			// throw new Exception('Curl error: ' . curl_error($crl));
			print_r('Curl error: ' . curl_error($crl));
		}
	 
		curl_close($crl);
	  
		$obj = json_decode($rest);
		//$access_token = $obj['access_token'];
		$access_token = $obj->access_token;
		return $access_token;
	}
	
	function construirJson()
	{
		$arrNombres = explode(' ',$_GET['nombre']);
		$nombre1 = $arrNombres[0];
		$nombre2 = (1<sizeof($arrNombres)) ? $arrNombres[1] : '';
		
		$telefono = $_GET['telefono'];
		if(strlen($telefono)==10){
			$telefonoLada = substr($telefono, 0, 2);
			$telefonoNum = substr($telefono, 2, 8);
		}
		else{
			$telefonoLada = '';
			$telefonoNum = '';
		}
		
		$data = array(
			  'Nombre'            => $nombre1
			, 'SegundoNombre'     => $nombre2
			, 'ApellidoPaterno'   => $_GET['apellidoPaterno']
			, 'ApellidoMaterno'   => $_GET['apellidoMaterno']
			, 'TelefonoLada'      => $telefonoLada
			, 'TelefonoNumero'    => $telefonoNum
			, 'CorreoElectronico' => $_GET['correo']
			, 'Nivel'             => $_GET['codigo']
			, 'Codigo'            => $_GET['programa']    // antes: 'code'
			, 'Descripcion'       => $_GET['descripcion']
			, 'Campus'            => $_GET['campus']
			, 'Estado'            => $_GET['claveEstado']
			, 'Municipio'         => $_GET['claveMunicipio']
			, 'OtroEstado'        => $_GET['otroEstado']
			, 'Origen'            => 'W'
			//, 'SubOrigen'         => $_GET['url']
			, 'SubOrigen'         => str_replace('\\', '', $_GET['url'])
			, 'VPD'               => $_GET['campus']
		);
		
		return json_encode($data);
	}
	
	function enviarJson($content, $access_token)
	{
		$URLServicio='http://crmbanner2.azurewebsites.net/api/CreatePreUniversitario';

		$ch = curl_init();
		
		$header = array();
		$header[] = 'content-type: application/json';
		$header[] = 'Host: crmbanner2.azurewebsites.net';
		$header[] = 'Content-length: '.strlen($content);
		$header[] = 'Authorization: bearer '.trim($access_token);
		
		curl_setopt($ch, CURLOPT_URL,$URLServicio);
		curl_setopt($ch, CURLOPT_POST,true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
		curl_setopt($ch, CURLOPT_HEADER, false); //debugear
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$result = curl_exec($ch);
		if ($result == false)
		{
			// throw new Exception('Curl error: ' . curl_error($crl));
			print_r('Curl error: ' . curl_error($ch));
		}
		curl_close($ch);
		return $result;
	}
	
	function enviarProspectoCRM()
	{
		$content = construirJson();
		
		echo $content;
		
		$access_token = pedirToken();
		
		$result = enviarJson($content, $access_token);
		
		
		if ($result == false);
		else{
			// _______ Guardar en tabla de Errores los datos del envio ___________
			$pos = strrpos($result, '"Message"', 0);
			if ($pos === false); // No se encontro ningun error.
			else{
				// Se encontro un error
				guardaErrorCRM( $result, $data_string);
			}
		}
		
		
		
		
		//----------------------
		/*
		echo $data_string;
		
		$ch = curl_init('http://crmbanneranahuac.azurewebsites.net/api/CreatePreUniversitario');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		$result = curl_exec($ch);
		curl_close ($ch);
		*/
		
		
		return $result;
	}
	
	
	function guardaErrorCRM($error, $salida)
	{
		$PK_PROSPECTO = $_GET['idprospecto'];
		$ENTRADA=
			   'nombre:"'           .$_GET['nombre']
			.'",apellidoPaterno:"'  .$_GET['apellidoPaterno']
			.'",apellidoMaterno:"'  .$_GET['apellidoMaterno']
			.'",telefono:"'         .$_GET['telefono']
			.'",correo:"'           .$_GET['correo']
			.'",codigo:"'           .$_GET['codigo']
			.'",programa:"'         .$_GET['programa']
			.'",descripcion:"'      .$_GET['descripcion']
			.'",campus:"'           .$_GET['campus']
			.'",claveEstado:"'      .$_GET['claveEstado']
			.'",claveMunicipio:"'   .$_GET['claveMunicipio']
			.'",otroEstado:"'       .$_GET['otroEstado']
			.'",url:"'              .$_GET['url']
			.'"'
		;
		
		$campos = array(
			 'PK_PROSPECTO' => $PK_PROSPECTO
			,'TIPO' => 'CRM'
			,'ERROR' => $error
			,'ENTRADA' => $ENTRADA
			,'SALIDA' => $salida
		);
		
		$result =  database::insertRecords("ERRORES",$campos);
		/*

		$sql="SELECT @@IDENTITY AS NewSampleId";
		$rowID = database::getRow($sql);
		$idprospecto = $rowID['NewSampleId'];		
		//*/
	}
	//  --- END SEND CRM ---
	
	
	
	function SendWebServiceFlowCRM(){
		
		
		
		      $nombre= $_GET['nombre']; 
		      $apellidos = $_GET['apellidos'];	
		      $apellidos = explode(" ", $apellidos);
		      $apellidop = ($apellidos[0] == NULL || $apellidos[0]== "" ) ? "" : $apellidos[0];
		      $correo = $_GET['correo'];
		      $verticalcode = $_GET['verticalcode'];//id de programa para crm
		      $telefono = $_GET['telefono'];	
		      
		   
			//$url = URL_TO_RECEIVING_PHP;
			
			$url = 'http://pruebacoco.com/crmnew2/Flow/landings/campaigns/API/scripts/savedata.php';

			$fields = array(
			        'nombre'=>$nombre,
			        'apellido_paterno'=>$apellidop,
			        'mail'=>$correo,
			        'programa'=>$verticalcode,
			        'telefono'=>$telefono
			);

			$postvars='';
			$sep='';
			foreach($fields as $key=>$value)
			{
			        $postvars.= $sep.urlencode($key).'='.urlencode($value);
			        $sep='&';
			}

			$ch = curl_init();

			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_POST,count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($ch);

			curl_close($ch);

			//echo $result;
			
			//return $result;
			
	}
	

	
	
	
	
	function SendWebServiceAP(){	
  
  
 				$idnivel = $_GET['nivel'];
 				$idprograma = $_GET['programa'];
 				
 				$code = $_GET['code'];
 				
 				$verticalcode = $_GET['verticalcode'];
 				
 				$idprograma =  $idprograma == 'NONE' ? NULL : $idprograma;
 				
 				$idcampus = $_GET['campus']; 				
 				//$idcampus =  $idcampus == 'NONE' ? NULL : $idcampus ;
 				
 				$idcampus = trim($idcampus);
 				$nombre= $_GET['nombre']; 			
 				$apellidos = $_GET['apellidos'];
 				$correo = $_GET['correo'];
 				$telefono = $_GET['telefono'];	
 				$ciudad = $_GET['ciudad'];
 				$url = $_GET['url'];
 				
 				$apellidos = explode(" ", $apellidos);	
 				
 				
 				
 				$ERROR_MSG = '';

$s_WSPROTOCOL = 'http';
$s_WSHOSTNAME = 'anahuacleads.estudiaradistancia.info';
$s_WSPORT = '';
$s_WSPATHNAME = 'WcfSAnahuacLeads.Leads.svc?singleWsdl';         
$s_WSTIPOOP = 'SubmitLead';


$parameters['UserName'] = "anahuac@online.anahuac.mx";
$parameters['Password'] = "Leads!Anahuac$11";

$parameters['LIndustryVerticalCode'] = $verticalcode;
$parameters['LProgramCode'] = $code;
$parameters['FirstName'] = $nombre;
$parameters['LastName'] = $apellidos[0];
$parameters['SecondaryLastName'] = ($apellidos[1] == NULL || $apellidos[1]== "" ) ? "" : $apellidos[1];
$parameters['HmEmail'] = $correo;
$parameters['HmPh_Number'] = $telefono;
$parameters['WebUrl'] = $url;



//echo $s_WSTIPOOP."<br />";
//echo $s_WSPROTOCOL."://".$s_WSHOSTNAME.$s_WSPORT."/".$s_WSPATHNAME."<br /><br /><br />";     
$client = new nusoap_client($s_WSPROTOCOL."://".$s_WSHOSTNAME.$s_WSPORT."/".$s_WSPATHNAME);
$client->soap_defencoding = 'UTF-8';

$namespace = "http://tempuri.org/";
$soapAction = "http://tempuri.org/ILeads/SubmitLead";


$result = $client->call($s_WSTIPOOP, $parameters, $namespace, $soapAction);

if ($client->fault) {
	
//echo '<h2>Fault (Expect - The request contains an invalid SOAP body)</h2><pre>'; print_r($result); echo '</pre>';

} else {
$err = $client->getError();
if ($err) {
  //echo '<h2>Error</h2><pre>' . $err . '</pre>';
} else {
	
   //echo '<br></br><h2>Result</h2><pre>'; print_r($result); echo '</pre>';
}
}
			
	//return $client->response;		                 
								 
		
	}
	
	
	
	
	function BuscarPrograma($idprograma){
		
		$sql = "SELECT DESCRIPCION FROM PROGRAMAS WHERE PK1 = '$idprograma'";   
		
		$row = database::getRow($sql);
	
		if($row){
			return $row['DESCRIPCION'];
		}else{
			return FALSE;
		}
		}
		
		
		function BuscarNivel($idnivel){
		
		$sql = "SELECT DESCRIPCION FROM NIVELES WHERE PK1 = '$idnivel'";   
		
		$row = database::getRow($sql);
	
		if($row){
			return $row['DESCRIPCION'];
		}else{
			return FALSE;
		}
		}
		
		
		function BuscarCampus($idcampus){
		
		$sql = "SELECT DESCRIPCION FROM UNIVERSIDADES WHERE PK1 = '$idcampus'";   
		
		$row = database::getRow($sql);
	
		if($row){
			return $row['DESCRIPCION'];
		}else{
			return FALSE;
		}
		}
	
	
	//CORREO
	
	function RolResponsable($rol,$responsable){
		
		 $sql = "SELECT * FROM ROLES_USUARIO WHERE PK_ROLE = '$rol' AND PK_USUARIO = '$responsable' ";			            
		
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}	
	
	
	
		function Enviar2($idprospecto,$campus,$nivel){		
	
	          
	         //  $cc = 'jose.ruiz@anahuac.mx';
		    	$cc='';		    
				    
				    $rol = '';
				    if($nivel == 2){ $rol = 'R56B4F9E14D887'; }//L
					else if($nivel == 3){ $rol = 'R56B4F9D5148FE'; }//ME
					else if($nivel == 4){ $rol = 'R56B4F9C7EF369'; }//MP
					else if($nivel == 5){ $rol = 'R56B4F9B15ACFD'; }//D	
					else if($nivel == 6){ $rol = 'R57361514E428F'; }// Esp cambio
				    		    
				    		 
					if($nivel == 2||$nivel == 3||$nivel == 4||$nivel == 5||$nivel == 6){		
						
						  $sql = "SELECT PK1 FROM USUARIOS WHERE PK_JERARQUIA='$campus'"; 						
						
					}else{						
						   $sql = "SELECT PK1 FROM USUARIOS";//no se usa		
						 						
					} 					 
					 
			
					$responsables = database::getRows($sql);				
					$numresp = sizeof($responsables);			       
	   	
		         if($numresp != 0){	  		
	  			
					 foreach($responsables AS $responsable)
					 {	
					 						       		
					       	$trol =	RolResponsable($rol,$responsable['PK1']); 
					       				       								  
					       	if($trol){		       						
					       								  
							     EnviarCorreo('',$responsable['PK1'],$idprospecto,$cc,$nivel);							  
					       						       		
					       	}	     		
					       				
					       
					       
					    
				     }	
			     } 
		     
			      
		
	
		
	 // EnviarCorreo($de,$responsable,$idprospecto,$cc);
		
		
       }
	
	
	
		
		function Enviar($idprospecto,$campus){	
		
		
		//$idprospecto = 13;
		//$campus = 'UAN';
		
		//$idprospecto = 13;
	//	$campus = 'UAS';
	
	
	
	     // $cc = 'edgar.trejo@anahuac.mx';
	    $cc = 'francisco.vega@anahuac.mx';
	
				$responsable = '';
				switch($campus){


				   case "UAN":
				    //  $responsable = 'edgar.trejo@anahuac.mx';
				         $responsable = 'luisfrancisco89@gmail.com';     // $responsable = 'jose.gea@anahuac.mx';
				   break;

				   case "UAS":
				      //  $responsable = 'luisfrancisco89@gmail.com';
				         // $responsable = 'paulina.anahuati@anahuac.mx';
				         // $responsable = 'adrian.gadsden@anahuac.mx';
				            
				   break;


				   case "IEST":
				     //  $responsable = 'luisfrancisco89@gmail.com';
							 // $responsable = 'myrna.nunez@iest.edu.mx';
							break;
							
				   case "IJPII":
				     // $responsable = 'luisfrancisco89@gmail.com';
				          // $responsable = ': maria.lizarraga@familia.edu.mx';
						break;
							
							
					case "UAC":
					  $responsable = 'luisfrancisco89@gmail.com';
				      //  $responsable = 'jose.gea@anahuac.mx';
						break;
						
					case "UAM":
					 // $responsable = 'luisfrancisco89@gmail.com';
				      //  $responsable = 'anunciata.lopez@anahuac.mx';
						break;
						
					case "UAO":
					//  $responsable = 'luisfrancisco89@gmail.com';
				      //  $responsable = 'elizabeth.felix@anahuac.mx';
						break;	
						
						
					case "UAP":
					 // $responsable = 'luisfrancisco89@gmail.com';
				      //  $responsable = 'luis.ibanez@anahuac.mx';
						break;
						
						
					case "UAQ":
					//  $responsable = 'luisfrancisco89@gmail.com';
				      //  $responsable = 'karina.romero@anahuac.mx';
						break;	
						
					case "UAX":
					//  $responsable = 'luisfrancisco89@gmail.com';
				     //   $responsable = 'edgar.perez@uax.edu.mx';
						break;						
							
				   default:						      
						  break;

				}
		              
	   
		
		$de= '';
		//$para = $responsable
		//EnviarCorreo($de,$para,$idprospecto);
		
	  EnviarCorreo($de,$responsable,$idprospecto,$cc);
		
		
		
		
       }
	
	
	function EnviarCorreo($de,$responsable,$idprospecto,$cc,$nivel){     

                              

                //$sql = "SELECT * FROM USUARIOS WHERE PK1 = '$de'";  

   // $rowde = database::getRow($sql);

               

                $sql = "SELECT * FROM USUARIOS WHERE PK1 = '$responsable'";
                $rowpara = database::getRow($sql);     

               

               $sql = "SELECT * FROM PROSPECTOS WHERE PK1 = '$idprospecto'";  

               $row = database::getRow($sql);
     
               // $nivel = 'PK_NIVEL';           
                //$grado = 'LICENCIATURA';
                
                $grado = BuscarNivel($row['PK_NIVEL']);  
                $programa = BuscarPrograma($row['PK_PROGRAMA']);   
                $descampus = BuscarCampus($row['PK_CAMPUS']);              
                $campus = $row['PK_CAMPUS'];
                
                
              
               
                
                if($nivel==2){	//L				
					
					  $campus2 = $row['PK_CAMPUS'];
					
				}else{
					
					if($nivel==3){	//ML
					
					   $campus2 = 'Maestrías en Línea';
					
					}
					else if($nivel==4){	//					
						
						$campus2 = 'Maestrías Presenciales';
						
					}
					else if($nivel==5){						
						
						$campus2 = 'Doctorados';
					}
					
					else if($nivel==6){						
						
						$campus2 = 'Especialidad';
					}			
					
					
				}
                
                
                $nombre = $row['NOMBRE'];               
                $apellidos = $row['APELLIDOS'];
                $correo = $row['CORREO'];
                $telefono = $row['TELEFONO'];
                $ciudad =  $row['CIUDAD'];
                             

                $mail = new PHPMailer;

                $para = trim($rowpara['EMAIL']);
              // $para = trim($responsable);

 

 

//$mail->SMTPDebug  = 2;

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.office365.com';  // Specify main and backup server 
 
$mail->SMTPAuth = true;                               // Enable SMTP authentication 

$mail->Username = 'prospectos@redanahuac.mx';                            // SMTP username

$mail->Password = 'P1$$w0rd';                           // SMTP password

$mail->SMTPSecure = 'tls';

$mail->Port = '587';                            // Enable encryption, 'ssl' also accepted

 

$mail->From = 'prospectos@redanahuac.mx';

$mail->FromName = 'Prospecto '.$campus2;

$mail->addAddress($para);  // Add a recipient

//$mail->addAddress('jose.ruiz@redanahuac.mx');               // Name is optional

//$mail->addReplyTo('planeacion@redanahuac.mx');

//$mail->addCC('cc@example.com');

$mail->addBCC('prospectos@redanahuac.mx');

 //$mail->addBCC($cc);

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->isHTML(true);                                  // Set email format to HTML

 

$mail->Subject =  $nombre;

$mail->Body    = '

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title>Sistema de Prospectos de la RUA</title>

 

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

<h1 style="font-family:Segoe UI, Tahoma, sans-serif; margin:0px; font-size:12pt; line-height:19px; color:#072B60; font-weight:normal;color:#ffffff;">'.htmlentities($nombre, ENT_QUOTES, "ISO-8859-1").' '.utf8_encode($apellidos).'</h1>

<p style="margin:0;font-size:11pt;font-family:Segoe UI, Tahoma, sans-serif;color:#000;color:#ffffff;"></p>

                               </td>

                               <td width="15" style="background:#E66500; border-top:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="205" align="right" valign="middle" style="background:#E66500; border-top:1px solid #e3e3e3; padding:18px 0; line-height:1px;">

<img src="http://redanahuac.mx/app/prospectos/skins/default/img/logo_anahuac.png"  alt="Red de Universidades Anahuac" border="0">

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

 

 

<!-- START AMPSCRIPT  -->

<table cellpadding="0" cellspacing="0" border="0" style="font-family:\'Segoe UI\', Tahoma, sans-serif; font-size:10pt; margin:0px;">

              <tr>

                </tr>

                             

</table></BR>

<!-- START AMPSCRIPT  -->

<table cellpadding="0" cellspacing="0" border="0" style="font-family:\'Segoe UI\', Tahoma, sans-serif; font-size:10pt; margin:0px;">

           
                     <tr>  
                        <td><h3>PROSPECTO:</h3></td>
                     </tr>
                     <tr>  
                        <td><strong>Nivel: </strong>'.$grado.'</td>
                     </tr>
                     <tr>
                        <td><strong>Programa: </strong>'.htmlentities($programa, ENT_QUOTES, "ISO-8859-1").'</td>  
                     </tr> 
                     <tr>                     
					    <td><strong>Campus:</strong> '.$campus.' | '.$descampus.' </td>
					 </tr> 
					 <tr>
					   <td>&nbsp;</td>
				    </tr>
					 <tr> 
					    <td><strong>Nombre: </strong>'.htmlentities($nombre, ENT_QUOTES, "ISO-8859-1").' <strong>Apellidos: </strong>'.utf8_encode($apellidos).'</td>
					 </tr>
					 <tr>
					    <td>&nbsp;</td>
					 </tr>
					 <tr>
					    <td><strong>Correo: </strong>'.$correo.'</td>
					 </tr>
					 <tr>
					    <td><strong>Telefono: </strong>'.$telefono.'</td>
					 </tr>
					 <tr>
					    <td><strong>Ciudad: </strong>'.$ciudad.'</td> 
					 </tr>      
        

</table></br>



  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">

                <tr>

 

                 <td style="font-family:Segoe UI, Tahoma, sans-serif; font-size:12pt; text-align:center; color:#557eb9; padding:5px 0px 5px 15px;">&nbsp;</td>

               

             <!--      <td style="padding:0px 15px; font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;"><a href="http://redanahuac.mx/apreu/"  title="http://redanahuac.mx/rua" style="color:#072b60;">http://redanahuac.mx/apreu/</a></td>-->

                </tr>

  </table>

  

 

<p style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">Atentamente, <br />Red de Universidades An&aacute;huac <br/>



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

                                                                                              <p style="font-family:Segoe UI, Tahoma, sans-serif; margin:0px 0px 0px 5px; color:#000; font-size:10px;">Red de Universidades An&agrave;huac | &copy; Copyright 2016. Todos los derechos reservados. <br /> Este mensaje se ha enviado desde una direcci&oacute;n de correo electr&oacute;nico no supervisada. No responda a este mensaje.<br /> <span style="color:#072B60;"><a href="#"  title="Privacidad" style="color:#072B60; text-decoration:none">Privacidad</a> | <a href="#"  title="Informaci&oacute;n legal" style="color:#072B60; text-decoration:none">Informaci&oacute;n legal</a></span></p>

                                                                              </td>

                                                                              <td width="20">&nbsp;</td>

                                                                              <td width="127"><img src="http://redanahuac.mx/apreu/multimedia_user/templates/33/media/base/menu_derecha.png"  alt="Red de Universidades Anáhuac" border="0"></td>

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

$mail->send();                      

                              

  }
	
	
	
	
	


function getNiveles(){

	$sql = "SELECT * FROM NIVELES ORDER BY ORDEN";
	$rows = database::getRows($sql);
	$html ='<option value="NONE">Nivel de Estudios</option>';

	foreach($rows as $row)
	{
		$PK1=$row['PK1'];
		$CODIGO=$row['CODIGO'];
		$DESCRIPCION=htmlentities($row['DESCRIPCION']);
		
		//$html.= '<option value="'.$row['PK1'].'" data-codigo="'.$row['CODIGO'].'" >'.htmlentities($row['DESCRIPCION']).'</option>';
		$html.= "<option value='$PK1' data-codigo='$CODIGO' >$DESCRIPCION</option> \n";
	}

	$html = json_encode($html);	

	echo $_GET['callback'] . '(' . $html . ')';
	
}

function getProgramsPos(){

   $idnivel = $_GET['nivel']; 
   $campus = $_GET['campus'];   
  
   	
   $sql = "SELECT DISTINCT CAST(D.DESCRIPCION AS VARCHAR) AS DESCRIPCION, D.PK1 FROM PROGRAMAS P, DIVISIONES D, NIVELES N
WHERE P.PK_DIVISION = D.PK1 AND D.PK_NIVEL = N.PK1 AND D.PK_NIVEL = '$idnivel' AND P.UNIVERSIDAD LIKE '%$campus%' ";
   $rows = database::getRows($sql);
   $html ='<option value="NONE">Programa</option>';
   
   foreach($rows as $row){
         
		 $html.= '<optgroup label="'.htmlentities($row['DESCRIPCION']).'">';
	   
		    $division = $row['PK1'];
		    $sql2 = "SELECT * FROM PROGRAMAS WHERE PK_DIVISION = '$division' AND UNIVERSIDAD LIKE '%$campus%' ORDER BY ORDEN";
            $rows2 = database::getRows($sql2);
			    foreach($rows2 as $row2){
				 
				     $html.= '<option value="'.$row2['PK1'].'"  data-code="'.$row2['CODIGO'].'" data-verticalcode="'.$row2['VERTICALCODE'].'">'.utf8_encode(str_replace("?","-",$row2['DESCRIPCION'])).'</option>';
				 
				 }
		$html .= '</optgroup>';
		    
        }
        
         $html = json_encode($html);	
         echo $_GET['callback'] . '(' . $html . ')';
		

}


function getPrograms(){

   $idnivel = $_GET['nivel'];
   
   
   
   if($idnivel == 2 || $idnivel == 4|| $idnivel == 5|| $idnivel == 6){
   	
   $sql = "SELECT * FROM DIVISIONES WHERE PK_NIVEL = '$idnivel' ORDER BY ORDEN";
   $rows = database::getRows($sql);
   $html ='<option value="NONE">Programa</option>';
   
   foreach($rows as $row){
         
		 $html.= '<optgroup label="'.htmlentities($row['DESCRIPCION']).'">';
	   
		    $division = $row['PK1'];
		    $sql2 = "SELECT * FROM PROGRAMAS WHERE PK_DIVISION = '$division' ORDER BY ORDEN";
            $rows2 = database::getRows($sql2);
			    foreach($rows2 as $row2){
				 
				     $html.= '<option value="'.$row2['PK1'].'"  data-code="'.$row2['CODIGO'].'" data-verticalcode="'.$row2['VERTICALCODE'].'">'.utf8_encode(str_replace("?","-",$row2['DESCRIPCION'])).'</option>';
				 
				 }
		$html .= '</optgroup>';
		    
        }
   	
   	//htmlentities($nombre, ENT_QUOTES, "ISO-8859-1").' <strong>Apellidos: </strong>'.utf8_encode($apellidos)
   	
   }
   
    else if($idnivel == 3){   	
   	           
		        $sql2 = "SELECT P.* FROM PROGRAMAS P, DIVISIONES D, NIVELES N WHERE P.PK_DIVISION = D.PK1  AND D.PK_NIVEL = N.PK1 AND D.PK_NIVEL = '$idnivel'";
		   
                $rows2 = database::getRows($sql2);
            
                $html ='<option value="NONE">Programa...</option>';	 
			    foreach($rows2 as $row2){
				 
				     $html.= '<option value="'.$row2['PK1'].'"  data-code="'.$row2['CODIGO'].'" data-verticalcode="'.$row2['VERTICALCODE'].'"  >'.htmlentities($row2['DESCRIPCION']).'</option>';
				 
				 }  	
   	
    }  
    
   /*else if($idnivel == 4){   	
   	           
		        $sql2 = "SELECT P.* FROM PROGRAMAS P, DIVISIONES D, NIVELES N WHERE P.PK_DIVISION = D.PK1  AND D.PK_NIVEL = N.PK1 AND D.PK_NIVEL = '$idnivel'";
		   
                $rows2 = database::getRows($sql2);
            
                $html ='<option value="NONE">Programa...</option>';	 
			    foreach($rows2 as $row2){
				 
				     $html.= '<option value="'.$row2['PK1'].'">'.htmlentities($row2['DESCRIPCION']).'</option>';
				 
				 }  
   	
    }  */
   
   
   
   


         $html = json_encode($html);	
         echo $_GET['callback'] . '(' . $html . ')';
		

}



 function getUniversidadesPos(){      
	
	  $nivel = $_GET['nivel'];
	  
	  $sql = "SELECT P.UNIVERSIDAD FROM PROGRAMAS P, DIVISIONES D, NIVELES N WHERE P.PK_DIVISION = D.PK1  AND D.PK_NIVEL = N.PK1 AND D.PK_NIVEL = '".$nivel. "'";
	  $rows = database::getRows($sql); 	 
	 
	  $arraytotaluni = array();//para guardar	
	
	  $j=TRUE;
	  foreach($rows as $row)
	  { 	    
	       $arrayuni = array();//para comparar
			    
		   $arrayuni = explode(',', trim($row['UNIVERSIDAD']));	  
		   $countuni = count($arrayuni);
		   
		   if($j==TRUE){  $arraytotaluni[] = $arrayuni[0]; }		 		   	
			    
			    for($i=0;$i<$countuni;$i++)
			    {			    
			          $uni = trim($arrayuni[$i]);
			  
					  if (!in_array($uni, $arraytotaluni)) {					  	
					  	 $arraytotaluni[] = $uni;				            
				      }	         
			    }  
		  $j=FALSE;		          
	 } 
	   
	 $strunicomp = implode(",", $arraytotaluni);         
	 $uniscadena = "'".str_replace(",","','",$strunicomp)."'";         
	        
	 $sql = "SELECT * FROM UNIVERSIDADES WHERE PK1 IN($uniscadena) ";
	 $rows = database::getRows($sql); 
	 
	 $html ='<option value="NONE">Campus de Inter&eacute;s</option>'; 				 	
			 	
		 foreach($rows as $row){ 
		 			     						
			$html.= '<option value="'.$row['PK1'].'">'.htmlentities($row['DESCRIPCION']).'</option>'; 							
		} 	
		   
	     $html = json_encode($html);	
	     echo $_GET['callback'] . '(' . $html . ')';	 

  }


 function getUniversidades(){
      
	  $idprograma = $_GET['programa'];
	  $nivel = $_GET['nivel'];
	  
	  $sql = "SELECT * FROM PROGRAMAS WHERE PK1 = $idprograma";
	  $row = database::getRow($sql); 
	  
		  
	  $arrayuni = array();
	  
	  $arrayuni = explode('*', $row['UNIVERSIDAD']);	  
	  $countuni = count($arrayuni);	
	  
	   $html ='<option value="NONE">Campus de Inter&eacute;s</option>'; 	  
	
	    
	    for($i=0;$i<$countuni;$i++){  
	  
	          $strunicomp = $arrayuni[$i];     
	          $uniscadena = "'".str_replace(",","','",$strunicomp)."'"; 
	          
	            if(trim($strunicomp) == "AP"){		       	
		       	
		       	  $html = '<option value="AP">Campus de Inter&eacute;s...</option>';
		       	
		       }else{
	  
				  $sql = "SELECT * FROM UNIVERSIDADES WHERE PK1 IN($uniscadena) ";
			      $rows = database::getRows($sql); 	
			      
					 	
			 	
			 	  foreach($rows as $row){ 		       
			       
			     		       	
			            if($i!=0){			            
			       
			      $html.= '<option  value="'.$row['PK1'].'">'.htmlentities($row['DESCRIPCION']).'<strong>*</strong></option>';     	
					   	}else{						
						    $html.= '<option value="'.$row['PK1'].'">'.htmlentities($row['DESCRIPCION']).'</option>'; 
						}			   	
						
					 	    
				} 		
			
			
		 }	
			  
			   	   
	  } 
	   
		   
	     $html = json_encode($html);	
	     echo $_GET['callback'] . '(' . $html . ')';	 

   }
   
   
   

   
     function getUniversidadesPos2(){
      
	  $nivel = $_GET['nivel'];	  
	
	   $sql = "SELECT * FROM UNIVERSIDADES WHERE DISPOPNIBLE = 1 ";
       $rows = database::getRows($sql);
       $html ='<option value="NONE">Campus de Inter&eacute;s</option>';
   
       foreach($rows as $row){
    
	      $html.= '<option value="'.$row['PK1'].'">'.htmlentities($row['DESCRIPCION']).'</option>';
	   }
	   	  
	   	   
	     $html = json_encode();	
	     echo $_GET['callback'] . '(' . $html . ')';	  
	 

   }
   
   




  /* function getUniversidades(){
      
	  $idprograma = $_GET['programa'];
	  
	  $sql = "SELECT * FROM PROGRAMAS WHERE PK1 = $idprograma";
	  $row = database::getRow($sql);
	  $unis = "'".str_replace(",","','",$row['UNIVERSIDAD'])."'";
	  
	   $sql = "SELECT * FROM UNIVERSIDADES WHERE PK1 IN($unis) ";
       $rows = database::getRows($sql);
       $html ='<option value="NONE">Campus de Inter&eacute;s</option>';
   
       foreach($rows as $row){
    
	      $html.= '<option value="'.$row['PK1'].'">'.htmlentities($row['DESCRIPCION']).'</option>';
	   }
	     $html = json_encode($html);	
	     echo $_GET['callback'] . '(' . $html . ')';
	 

   }*/

function getEstados()
{
	$sql = "SELECT DISTINCT(d_estado) AS 'ESTADO', c_estado AS 'ID_ESTADO', cod_banner AS 'CLAVE' FROM SEPOMEX ORDER BY c_estado";
	$rows = database::getRows($sql);

	$html = "<option value=\"NONE\">Estado</option>";
	foreach($rows as $row){
		$ID_ESTADO = $row['ID_ESTADO'];
		$ESTADO = htmlentities($row['ESTADO']);
		$CLAVE = $row['CLAVE'];
		$html.= "<option value='$ID_ESTADO' data-clave='$CLAVE'>$ESTADO</option>";
	}

	$html = json_encode($html);	

	echo $_GET['callback'] . '(' . $html . ')';
}

function getMunicipios($p_estado)
{
	//$sql = "SELECT DISTINCT(d_ciudad) AS 'CIUDAD', c_cve_ciudad AS 'CLAVE_CIUDAD' FROM SEPOMEX WHERE c_estado='$p_estado' AND d_ciudad <> ''";
	//$sql = "SELECT DISTINCT(d_ciudad) AS 'CIUDAD' FROM SEPOMEX WHERE c_estado='$p_estado' AND d_ciudad <> '' ORDER BY CIUDAD";
	//$sql = "SELECT DISTINCT(D_mnpio) AS 'MUNICIPIO' FROM SEPOMEX WHERE c_estado='$p_estado' ORDER BY MUNICIPIO";
	$sql = "SELECT DISTINCT(D_mnpio) AS 'MUNICIPIO',mun_banner AS 'CLAVE' FROM SEPOMEX WHERE c_estado='$p_estado' ORDER BY MUNICIPIO";
	$rows = database::getRows($sql);

	$html = '<option value="NONE">Delegacion o municipio</option>';
	foreach($rows as $row)
	{
		$MUNICIPIO = htmlentities($row['MUNICIPIO']);
		$CLAVE = ''.$row['CLAVE'];
		$html.= "<option value='0' data-clave='$CLAVE'>$MUNICIPIO</option>";
	}
	$html = json_encode($html);

	echo $_GET['callback'] . '(' . $html . ')';
}



class database {
	
	
	public $pdo=false;
	public $type='mssql';
	public $username='';
	public $password='';
	public $host='localhost';
	public $database='';
	public $persistent=false;
	public $showErrors=false;
	public $queryCounter=0;
	private $connected=false;
	public $filas = '';
 
    private static $instance = null; 
    private $connection;
    var $queryCache = array();
    var $dataCache = array();
    var $result;
	 
    
    public static function getInstance() 

    { 
        if(self::$instance == null) 
        { 
            self::$instance = new self; 
        }    
        return self::$instance;          
    } 
    
	 
    
    public function __construct($type=TYPE,$host=HOST,$database=DB,$username=USERDB,$password=PWDDB,$showErrors=true,$persistent=false)
    {
    	$this->type=$type;
		$this->host=$host;
		$this->database=$database;
		$this->username=$username;
		$this->password=$password;
		$this->showErrors=$showErrors;
		$this->persistent=$persistent;
    	
         $this->newConnection();		
    }
 
 
 
 
    public function __destruct(){
		$this->dbDisconnect();
	}
 
    
   
    function newConnection()
    {
		 
	   switch($this->type){
			case 'mysql':
				
				if(extension_loaded('pdo_mysql')){
					$this->pdo=new PDO('mysql:'.$connectLine,$this->username,$this->password,array(PDO::ATTR_PERSISTENT=>$this->persistent,PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\''));
					if($this->pdo){
						$this->connected=true;
					} else {
						trigger_error('Cannot connect to database',E_USER_ERROR);
					}
				} else {
					trigger_error('PDO MySQL extension not enabled',E_USER_ERROR);
				}
				break;
			case 'sqlite':
				
				if(extension_loaded('pdo_sqlite')){
					$this->pdo=new PDO('sqlite:'.$connectLine,$this->username,$this->password,array(PDO::ATTR_PERSISTENT=>$this->persistent));
					if($this->pdo){
						$this->connected=true;
					} else {
						trigger_error('Cannot connect to database',E_USER_ERROR);
					}
				} else {
					trigger_error('PDO SQLite extension not enabled',E_USER_ERROR);
				}
				break;
			case 'postgresql':
				
				if(extension_loaded('pdo_pgsql')){
					$this->pdo=new PDO('pgsql:'.$connectLine,$this->username,$this->password,array(PDO::ATTR_PERSISTENT=>$this->persistent));
					if($this->pdo){
						$this->pdo->exec('SET NAMES \'UTF8\'');
						$this->connected=true;
					} else {
						trigger_error('Cannot connect to database',E_USER_ERROR);
					}
				} else {
					trigger_error('PDO PostgreSQL extension not enabled',E_USER_ERROR);
				}
				break;
			case 'oracle':
				
				if(extension_loaded('pdo_oci')){
					$this->pdo=new PDO('oci:'.$connectLine.';charset=AL32UTF8',$this->username,$this->password,array(PDO::ATTR_PERSISTENT=>$this->persistent));
					if($this->pdo){
						$this->connected=true;
					} else {
						trigger_error('Cannot connect to database',E_USER_ERROR);
					}
				} else {
					trigger_error('PDO Oracle extension not enabled',E_USER_ERROR);
				}
				break;
			case 'mssql':
				
				if(extension_loaded('pdo_mssql')){
					$this->pdo=new PDO('dblib:'.$connectLine,$this->username,$this->password,array(PDO::ATTR_PERSISTENT=>$this->persistent));
					if($this->pdo){
						$this->pdo->exec('SET NAMES \'UTF8\'');
						$this->connected=true;
					} else {
						trigger_error('Cannot connect to database',E_USER_ERROR);
					}
				} else if(extension_loaded('mssql')) {
					
					
					if(!($this->connection = mssql_connect($this->host, $this->username, $this->password))){
		    
				echo 'Error inesperado al conectarse a la base de datos.\n'; 
                die('MSSQL error: ' . mssql_get_last_message());
				exit();
				
      
	  
                 }else{
	   	
		           mssql_select_db($this->database, $this->connection);
	   	
	              }
					

					
				}else if(extension_loaded('sqlsrv')){
					
				$connectionInfo = array( "Database"=>$this->database, "UID"=>$this->username, "PWD"=>$this->password);
				
				   $this->connection = sqlsrv_connect($this->host, $connectionInfo);
				   if($this->connection){
				   	
				   	
				   }else{
				   	echo "Connection could not be established.<br />";
                    die( print_r( sqlsrv_errors(), true));
				   }
				   	 
					
				}
				
				break;
			default:
				
				trigger_error('This database type is not supported',E_USER_ERROR);
				break;
		}
	   
       
    }
 
      
     public static function getRow($query)
    {
    	
       $database = self::GetInstance(); 
       
        switch($database->type){
			case 'mysql':
			break;
			
			case 'mssql':
			
			if(extension_loaded('pdo_mssql')){
			
			}else if(extension_loaded('mssql')){
				
				$result = mssql_query($query); 
                if (!$result ) 
                {     
                 echo 'Error in statement execution.\n'; 
                 die('MSSQL error: ' . mssql_get_last_message().$query);
                 }
                if (mssql_num_rows($result))
                {
                $row = mssql_fetch_array($result, MSSQL_ASSOC);
                 return $row;
                 }else{
                 return FALSE;
                 }
				
				
			}else if(extension_loaded('sqlsrv')){
				
				$params = array();
				$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$result=sqlsrv_query($database->connection,$query,$params,$options);
				
                if (!$result )
                {     
                 echo 'Error in statement execution s.\n'; 
                 die("Problemas en el select:".sqlsrv_errors()."QUERY:".$query);
                 }
                 
                $row_count = sqlsrv_num_rows( $result );
                 
                if ($row_count)
                {
                	
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                 return $row;
                 }else{
                 return FALSE;
                 }

			}
			

			break;
			
		default:
				// Error is triggered for all other database types
				//trigger_error('This database type is not supported',E_USER_ERROR);
				break;
			
			}
       
       
      
                 
    }
 
 
    public static function getRowDate($date)
    {
    	
       $database = self::GetInstance(); 
       
        switch($database->type){
			case 'mysql':
			break;
			
			case 'mssql':
			
			if(extension_loaded('pdo_mssql')){
			
			}else if(extension_loaded('mssql')){//linux				
				
				/*if($date!=""){
					
					
				}*/
				
				 return $date;  	
				
				
			}else if(extension_loaded('sqlsrv')){//microsoft			
				
				 return ($date->format('Y-m-d')); 
                 
			}
			

			break;
			
		default:
				// Error is triggered for all other database types
				//trigger_error('This database type is not supported',E_USER_ERROR);
				break;
			
			}
       
       
      
                 
    }
 
    public static function getRows($query)
    {
       $database = self::GetInstance(); 
       
       $database->filas = array();
       
        switch($database->type){
			case 'mysql':
			break;
			
			case 'mssql':
			
			if(extension_loaded('pdo_mssql')){
			
			}else if(extension_loaded('mssql')){
				
				$result = mssql_query($query); 
                if (!$result ) 
                {     
                 echo 'Error in statement execution.\n'; 
                 die('MSSQL error: ' . mssql_get_last_message().$query);
                 }else{
				 	
				
              //  if (mssql_num_rows($result))
               // {
				 while ($rows = mssql_fetch_array($result, MSSQL_ASSOC)) {
	                $database->filas[] = $rows;
                     }
				 
                 return $database->filas;
               /*  }else{
                 return FALSE;
                 }*/
                 
                }
				
				
			}else if(extension_loaded('sqlsrv')){
				
				$result=sqlsrv_query($database->connection,$query);
				
				
				//echo $query;
				
                if (!$result ) 
                {     
                 echo 'Error in statement execution s.\n'; 
                 die("Problemas en el select:".sqlsrv_errors().$query);
                 }else{
                 	
                    while ($rows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
		
	                $database->filas[] = $rows;
		
                     }

                     return $database->filas;
				 	
				 }
                                 

			}
			

			break;
			
		default:
				// Error is triggered for all other database types
				//trigger_error('This database type is not supported',E_USER_ERROR);
				break;
			
			}
    }
 
    
    
    public static function executeQuery($query,$params=""){
       
       $database = self::GetInstance(); 
       
        switch($database->type){
			case 'mysql':
			break;
			
			case 'mssql':
			
			if(extension_loaded('pdo_mssql')){
			
			}else if(extension_loaded('mssql')){
				
				$result = mssql_query($query); 
                if (!$result ) 
                 {     
             echo 'Error in statement execution.\n'; 
             die('MSSQL error: ' . mssql_get_last_message());
                 }
                return $result;
				
				
			}else if(extension_loaded('sqlsrv')){
				
				
				$result=sqlsrv_query($database->connection,$query);
				
                if (!$result ) 
                {     
                 echo 'Error in statement execution s.\n'; 
                 die("Problemas en el insert:".sqlsrv_errors()."QUERY:".$query);
                }
                return $result;
			}
			
			break;
			
		default:
				// Error is triggered for all other database types
				//trigger_error('This database type is not supported',E_USER_ERROR);
				break;
			
			}
      
	 
    }
 
    
	   
    public static function getNumRows($query)
    {
       $database = self::GetInstance(); 
       
         switch($database->type){
			case 'mysql':
			break;
			
			case 'mssql':
			
			if(extension_loaded('pdo_mssql')){
			
			}else if(extension_loaded('mssql')){
				
				$result = mssql_query( $query); 

        if (!$result ) 
        {     
            echo 'Error in statement execution.\n'; 
            die('MSSQL error: ' . mssql_get_last_message());
        }
        
        $row_count = mssql_num_rows($result);        
        return $row_count;
				
				
			}else if(extension_loaded('sqlsrv')){
				
				$params = array();
				$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$result=sqlsrv_query($database->connection,$query,$params,$options);
				
				
                if (!$result ) 
                {     
                 echo 'Error in statement execution s.\n'; 
                 die("Problemas en el select:".sqlsrv_errors());
                }
                
                $row_count = sqlsrv_num_rows( $result );
                
                if($row_count){return $row_count; }else{ return 0;}
                
			}
			
			break;
			
		default:
				
				//trigger_error('This database type is not supported',E_USER_ERROR);
				break;
			
			}

    }
 
 
    public static function executeStoreProcedure($storep,$params,$type){
    	
    	$database = self::GetInstance(); 
       
        switch($database->type){
			case 'mysql':
			break;
			
			case 'mssql':
			
			if(extension_loaded('pdo_mssql')){
			
			}else if(extension_loaded('mssql')){

				$proc = mssql_init($storep, $database->connection);
                $proc_result = mssql_execute($proc);
				
                if (!$result ) 
                 {     
             echo 'Error in statement execution.\n'; 
             die('MSSQL error: ' . mssql_get_last_message());
                 }
                return $result;
				
				
			}else if(extension_loaded('sqlsrv')){
				
				
				$result=sqlsrv_query($database->connection,$query,$store,$params);
				
                if ($result === false ) 
                {     
                 echo 'Error in statement execution s.\n'; 
                 die("Problemas en el store:".sqlsrv_errors());
                }else{
                     if($type == "get"){
					    $arr = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
					    return $arr;	
					 }else{
					 	return $result; 
					 }
				    
				}
                
			}
			
			break;
			
		default:
				// Error is triggered for all other database types
				//trigger_error('This database type is not supported',E_USER_ERROR);
				break;
			
			}
		
	}
 
    function cacheQuery( $queryStr )
    {
        if( !$result = $this->connections[$this->activeConnection]->query( $queryStr ) )
        {
            trigger_error('Error al ejecutar y cachear a la consulta: '.$this->connections[$this->activeConnection]->error, E_USER_ERROR);
            return -1;
        }
        else
        {
            $this->queryCache[] = $result;
            return count($this->queryCache)-1;
        }
    }
 
    /**
     * Obtiene el número de filas de la caché
     * @param int El puntero de la consulta en caché
     * @return int the number of rows
     */
    function numRowsFromCache( $cache_id )
    {
        return $this->queryCache[$cache_id]->num_rows;
    }
 
    /**
     * Recibe las filas de una consulta en la caché
     * @param int El puntero de la consulta en caché
     * @return array the row
     */
    function resultsFromCache( $cache_id )
    {
        return $this->queryCache[$cache_id]->fetch_array(MYSQLI_ASSOC);
    }
 
    /**
     * Guardar los datos en caché para su posterior uso
     * @param array Los datos
     * @return int El total de registros almacenados en la caché
     */
    function cacheData( $data )
    {
        $this->dataCache[] = $data;
        return count( $this->dataCache )-1;
    }
 
    
    function dataFromCache( $cache_id )
    {
        return $this->dataCache[$cache_id];
    }
 
   
    public static function deleteRecords( $table, $condition, $limit )
    {
        $limit = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
        $delete = "DELETE FROM {$table} WHERE {$condition} {$limit}";
       // echo $delete;
        database::executeQuery( $delete );
    }
 
    
     public static function	 updateRecords( $table, $changes, $condition )
    {
       $update = "UPDATE " . $table . " SET ";
        foreach( $changes as $field => $value )
        {
		
		 $value =  mb_convert_encoding($value, "ISO-8859-1", "UTF-8");
         $update .= "" . $field . "='{$value}',";
        }
 
        
        $update = substr($update, 0, -1);
        if( $condition != '' )
        {
            $update .= " WHERE " . $condition;
        }
       
      // echo $update;
        database::executeQuery($update);
        return true;
 
    }
 
   
    public static function insertRecords( $table, $data )
    {

        // Configuración de variables para campo y valor
        $fields  = "";
        $values = "";
 
        // Rellena las variables con los campos y sus valores
        foreach ($data as $f => $v)
        {
            $v =  mb_convert_encoding($v, "ISO-8859-1", "UTF-8");
            $fields  .= "$f,";
            $values .= ( is_numeric( $v ) && ( intval( $v ) == $v ) ) ? $v."," : "'$v',";
 
        }
 
        // Quitamos la coma del final
        $fields = substr($fields, 0, -1);
        // Quitamos la coma del final
        $values = substr($values, 0, -1);
 
        $insert = "INSERT INTO $table ({$fields}) VALUES({$values})";
        
		//echo $insert;
		
		database::executeQuery($insert);
        return true;
    }
 
    
 
    /**
     * Obtiene el número de las filas afectadas en la última consulta realizada
     * @return int the number of affected rows
     */
    function affectedRows()
    {
        return $this->$this->connections[$this->activeConnection]->affected_rows;
    }
 
    /**
     * Desinfecta los datos
     * @param String Datos a desinfectar
     * @return String Los datos desinfectados
     */
     function sanitizeData( $data )
    {
        return $this->connections[$this->activeConnection]->real_escape_string( $data );
    }
	
	
	
  
       public function dbDisconnect($resetQueryCounter=false){
	
		
		if($this->connected && !$this->persistent){
			
			if($resetQueryCounter){
				$this->queryCounter=0;
			}
			$this->pdo=null;
			$this->connected=false;
			return true;
		} else {
			return false;
		}
		
	}
	
	
	
	private function dbErrorCheck($query,$queryString=false,$variables=array()){
	
		
		if($this->connected){
			if($this->showErrors){
				
				$errors=$query->errorInfo();
				if($errors && !empty($errors)){
					
					if(!empty($variables)){
						trigger_error('QUERY:'."\n".$this->dbDebug($queryString,$variables)."\n".'FAILED:'."\n".$errors[2],E_USER_WARNING);
					} else {
						trigger_error('QUERY:'."\n".$queryString."\n".'FAILED:'."\n".$errors[2],E_USER_WARNING);
					}
				}
			}
		} else {
			trigger_error('Database not connected',E_USER_ERROR);
		}
		
		
		return true;
		
	}
  
   
}

?>>