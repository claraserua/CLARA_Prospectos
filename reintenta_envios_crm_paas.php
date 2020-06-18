
<?php
header('Content-Type: application/json; charset=utf-8');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


date_default_timezone_set('America/Los_Angeles');
require 'libs/PHPMailer/PHPMailerAutoload.php';

require_once('libs/nusoap/nusoap.php');

echo "hello world\n";
  $ambiente = file_get_contents('ambiente.txt');
  echo 'ambiente = '. $ambiente;



$connStr = getenv('SQLAZURECONNSTR_ConnectionString-prospectos');
$connArray = connStrToArray($connStr);
function connStrToArray($connStr){
	
	$stringParts = explode(";", $connStr);
	foreach($stringParts as $part){
		$temp = explode("=", $part);
		$connArray[$temp[0]] = $temp[1];
    }
    //print_r($connArray);
	return $connArray;
}

/* The name of the database */
define('DB', $connArray['Initial Catalog']);
 
/* MySQL database username */
define('USERDB', $connArray['User ID']);
 
/* MySQL database password */
define('PWDDB', $connArray['Password']);
 
/* MySQL hostname */
define('HOST', $connArray['Data Source']);

define('TYPE', 'sqlsrv');



if (strcmp(trim($ambiente),trim('PRUEBAS'))==0)
	{
	echo '\nENTRO A PRUEBAS';

	// define('HOST','claradbp.database.windows.net');//claradbp.database.windows.net  service-claradb.database.windows.net
	// define('DB', 'prospectos-php73');//prospectos    prospectos-prod
	// define('USERDB', 'testprospecto');//adminserver    claradb-01
	// define('PWDDB', 'Pr0sp3ct0-t3sT');//U_p1ck_1T      Cl@r@-DB-01
	// define('TYPE', 'sqlsrv');
		define('AMBIENTE','pruebas');		

	///$AMBIENTE = 'PRUEBAS';	
	
	
	
	
	$URL_CRM = 'https://crmapreup.redanahuac.mx/o/Server';   //PRUEBAS
    $HEDER_CRM = 'Host: crmapreup.redanahuac.mx'; //PRUEBAS
	$URL_SERVICIO_CRM='https://crmapreup.redanahuac.mx/api/srvAltaPreUniversitarioWeb';  //se cambio el dia (27-03-2017)
	$HEDER_CRM_SERVICIO = 'Host: crmapreup.redanahuac.mx';
	
	/*$URL_CRM = 'http://crmbanner2.azurewebsites.net/o/Server';   //PRUEBAS
    $HEDER_CRM = 'Host: crmbanner2.azurewebsites.net'; //PRUEBAS
	$URL_SERVICIO_CRM='http://crmbanner2.azurewebsites.net/api/srvAltaPreUniversitarioWeb';  //se cambio el dia (27-03-2017)
	$HEDER_CRM_SERVICIO = 'Host: crmbanner2.azurewebsites.net'; //PRUEBAS*/
	
	
	/*$URL_CRM = 'https://crmbannerq.azurewebsites.net/o/Server';   //PRUEBAS
    $HEDER_CRM = 'Host: crmbannerq.azurewebsites.net'; //PRUEBAS
    $URL_SERVICIO_CRM='https://crmbannerq.azurewebsites.net/api/srvAltaPreUniversitarioWeb';  //PRUEBAS
    $HEDER_CRM_SERVICIO = 'Host: crmbannerq.azurewebsites.net'; //PRUEBAS*/
		
	
	//$WEBSERVICEURL = 'http://leads-p.azurewebsites.net/api/leads';
	
	
	}
	
	
	if (strcmp(trim($ambiente),trim('PRODUCCION'))==0)
	{
		echo '\nENTRO A PROD';*/
		////$s = guardaambiente('redanahuac.mx');
	/*
		define('HOST','service-claradb.database.windows.net');
	    define('DB', 'prospectos-prod');
	    define('USERDB', 'prospectos');
	    define('PWDDB', 'Pr0sp3ct0S01');
	    define('TYPE', 'sqlsrv');	*/
		define('AMBIENTE','produccion');		
		
		////$AMBIENTE = 'PRODUCCION';
		
		/*
		$URL_CRM = 'https://crmapreu.redanahuac.mx/o/Server';   //PRODUCCION
		$HEDER_CRM = 'Host: crmapreu.redanahuac.mx'; //PRODUCCION
		$URL_SERVICIO_CRM='https://crmapreu.redanahuac.mx/api/srvAltaPreUniversitarioWeb';  //se cambio el dia (27-03-2017)
		$HEDER_CRM_SERVICIO = 'Host: crmapreu.redanahuac.mx'; //PRODUCCION
	  
		*/
		
		/*$URL_CRM = 'http://crmbannere.azurewebsites.net/o/Server';   
		$HEDER_CRM = 'Host: crmbannere.azurewebsites.net'; 
		$URL_SERVICIO_CRM='http://crmbannere.azurewebsites.net/api/srvAltaPreUniversitarioWeb';  //se cambio el dia (27-03-2017)
		$HEDER_CRM_SERVICIO = 'Host: crmbannere.azurewebsites.net'; */
	


	}
	
	
	
	reintenta();
	
	
	function reintenta()
{

      echo " \ncomienza reintentos \n";
   		//$sql = "SELECT * FROM PROSPECTOS WHERE ENVIADO_CRM ='NO' AND PK_NIVEL = 2 AND PK_CAMPUS <> 'ISF'  AND PK_CAMPUS <> 'UAT' ";//AND PK1 = 46590 
		
		$sql = "SELECT * FROM(
	     SELECT P.*
	      ,(SELECT UNIVPARCIAL FROM
			(SELECT PK1,
			(CASE 
				WHEN (CHARINDEX('*',UNIVERSIDAD) > 0) 
				THEN    SUBSTRING(UNIVERSIDAD, (CHARINDEX('*',UNIVERSIDAD)+1),(LEN(UNIVERSIDAD)-CHARINDEX('*',UNIVERSIDAD)))
				ELSE ''
				END) AS UNIVPARCIAL	
			 FROM PROGRAMAS WHERE  (CASE 
				WHEN (CHARINDEX('*',UNIVERSIDAD) > 0) 
				THEN    SUBSTRING(UNIVERSIDAD, (CHARINDEX('*',UNIVERSIDAD)+1),(LEN(UNIVERSIDAD)-CHARINDEX('*',UNIVERSIDAD)))
				ELSE ''
				END) <> '' ) AS X 
				WHERE X.PK1 = P.PK_PROGRAMA AND X.UNIVPARCIAL LIKE '%'+P.PK_CAMPUS+'%') AS UNIVPARCIAL
	FROM PROSPECTOS P WHERE P.ENVIADO_CRM ='NO' AND P.PK_NIVEL = 2 AND P.PK_CAMPUS <> 'ISF' AND P.PK_CAMPUS <> 'UAT'
	)Y
	WHERE UNIVPARCIAL IS NULL or UNIVPARCIAL = '' ";		
		
		  $row = database::getRows($sql);
		echo "Cantidad de reintentos=".  count($row). "\n";
      foreach ($row as $valor)
       {
        
          //echo enviarProspectoCRM($valor);
		  enviarProspectoCRM($valor);
		  
       }

}



function enviarProspectoCRM($datos)
	{
       // echo 'datos=';
      //  print_r($datos);
		$content = construirJson($datos);

		echo 'json armado='.$content;
		
       // $content_decode = json_decode($content);
    //     envialeads($content_decode);
	     
		
		
		$access_token = pedirToken();

		$result = enviarJson($content, $access_token);


		
     echo $result."\n";


   if ($result == false)
    {
       echo " debug 1 \n";      
      actualizaFlagsEnviadoCRM('NO',$datos['PK1']);
    
    }
    
   else
    {
         echo " debug 2 \n";      
			$result = str_replace("'", "", $result);
			// _______ Guardar en tabla de Errores los datos del envio ___________
			$pos = strrpos($result, '"Message"', 0);
			$pos_error = strrpos($result, 'Error', 0);
			
			
			
		  if ($pos === false && $pos_error === false) // No se encontro ningun error y si se mando
		  {
			  echo " debug 3 \n";      
		     actualizaFlagsEnviadoCRM('SI',$datos['PK1']);
		  
		   }
			 else
			{
				  echo " debug 4 \n";      
						   // Se encontro un error							 
							   actualizaFlagsEnviadoCRM('NO',$datos['PK1']);
							     guardaErrorCRM( $result,$content,$datos);
							  // guardaErrorCRM( $result, $data_string,$content);
							   
							  $result='';
		    }
	}




	return $result;
	}



function construirJson($datos)
{   
    
    
    
   $apellidos = explode( ' ', $datos['APELLIDOS'] );
       
    
    
    $arrNombres = explode(' ',trim($datos['NOMBRE']));

		$contador  = sizeof($arrNombres);

		$segundo_nombre = '';
		if($contador>1){

			for($i=1;$i<$contador;$i++){
				$segundo_nombre .= $arrNombres[$i];
                if($i<($contador-1))
				  $segundo_nombre .= ' ';
			}
		}


		$nombre1 = $arrNombres[0];
		//$nombre2 = (1<sizeof($arrNombres)) ? $arrNombres[1] : '';


		$sustituye   = array('\n\r', '\r\n', '\n', '\r');
	    $nombre2 = trim(str_replace($sustituye,'',$segundo_nombre));


		$telefono = $datos['TELEFONO'];
		if(strlen($telefono)==10){
			$telefonoLada = substr($telefono, 0, 2);
			$telefonoNum = substr($telefono, 2, 8);
		}
		else{
			$telefonoLada = '';
			$telefonoNum = '';
		}

	
	    $claveEstado = $datos['CLAVE_ESTADO'];
		$claveMunicipio = $datos['CLAVE_MUNICIPIO'];   
		
		if(trim($claveEstado) != ""){             
					
					$Pais = '99';			
					
		}		
		else{

					$claveEstado = '';
					$claveMunicipio = '';
					$Pais = '';
		}	



         $periodo = "";
         if($datos['PERIODO']==""||$datos['PERIODO']=="NONE"){
			 $periodo = "";			 
		 }else{			 
			 $periodo = $datos['PERIODO'];
		 }	

			

		try{	
			  $year_temp = trim($datos['ANIO']);
              $mes_temp = trim($datos['MES']);
              $day_temp = trim($datos['DIA']);			  
			

			 if (($year_temp ==''|| $year_temp == 'null')&& ($mes_temp =='' || $mes_temp =='null')&& ($day_temp ==''||$day_temp =='null') )
			 {
				 echo '\nentronull';
				 
				  $fechaN = null;
			 }
			 
			 else
			 {
				 	 echo '\nentronot null';
				 
									
					$fechaN = new Fecha;					
					$fechaN->Year = $year_temp;
					$fechaN->Month = $mes_temp;
					$fechaN->Day = $day_temp;
					
					
			 }	

		}catch (Exception $e) {  echo 'Excepción capturada: ',  $e->getMessage(), "\n"; $fechaN = null; }		 
		
		
		
		
		
        if($datos['PK_NIVEL']==2)
            {
                $nivel='LC';
            }
			
$data = array(
              'Nombre'              => utf8_encode($nombre1)
            , 'Segundo_Nombre'      => utf8_encode($nombre2)
            , 'Apellido_Paterno'    => utf8_encode($datos['APELLIDO_PATERNO'])
            , 'Apellido_Materno'    => utf8_encode($datos['APELLIDO_MATERNO'])
            , 'Telefono_Lada'       => utf8_encode($telefonoLada)
            , 'Telefono_Numero'     => utf8_encode($telefonoNum)
            , 'Correo_Electronico'  => utf8_encode($datos['CORREO'])
            , 'Nivel'               => utf8_encode($nivel)
            , 'Codigo'              => utf8_encode($datos['PK_PROGRAMA'])      // antes: 'code'
            , 'Descripcion'         => utf8_encode($datos['DESCRIPCION'])
            , 'Campus'              => utf8_encode($datos['PK_CAMPUS'])
            , 'Estado'              => utf8_encode($claveEstado)
            , 'Municipio'           => utf8_encode($claveMunicipio)
            , 'Pais'                => utf8_encode($Pais)
            //, 'OtroEstado'            => $_GET['otroEstado']
            , 'Origen'              => utf8_encode('1')
            , 'SubOrigen'           => utf8_encode(str_replace('\\', '', $datos['URL']))
            , 'VPD'                 => utf8_encode($datos['PK_CAMPUS'])
        //  , 'ua_nombre'           => $_GET['campus']

    /* vdelacruz */
        , 'Periodo' => utf8_encode($periodo)
		,'Sexo'	=> utf8_encode($datos['SEXO'])//
	    ,'FechaNacimiento' =>$fechaN

        );



		        return json_encode($data);
	}
	
	
	
	function pedirToken()
	{
		$secreto = base64_encode('$2a$12$PXtAWIwXLGUvR2RWngt.f.fBSDYltLpoIKRoHG2AF8AFbvkm15Qk.');
		$usuario = base64_encode('Rhino:');

		$authorizationHeader = $usuario.$secreto;
		
		global $URL_CRM, $HEDER_CRM;
		

		  $URL = $URL_CRM;

	   /* CALIDAD Q*/// $URL = 'http://crmbannerq.azurewebsites.net/o/Server'; se cambioo 27-03-2017

	   /*PRODUCCION $URL = 'http://crmbannere.azurewebsites.net/o/Server';*/

		$crl = curl_init();


	//	curl_setopt($crl, CURLOPT_PROXY, '127.0.0.1:8888');

		$headr = array();
		$headr[] = 'content-type: application/json';
	    //$headr[] = 'Host: crmbanner2.azurewebsites.net'; //PRUEBAS
		$headr[] = $HEDER_CRM;
		//$headr[] = 'Host: crmbannere.azurewebsites.net';  //produccion
	//	$headr[] = 'Host: crmbannerq.azurewebsites.net'; //CALIDAD Q
		$headr[] = 'Content-length: 45';
		$headr[] = 'Authorization: Basic '.$authorizationHeader;

		$data = 'grant_type=password&username=Banner&password=';

		curl_setopt($crl, CURLOPT_URL,$URL);
		curl_setopt($crl, CURLOPT_POST,true);
		curl_setopt($crl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($crl, CURLOPT_HEADER, false); //debugear
		curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($crl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);


		//curl_setopt($crl, CURLOPT_PROXY, '127.0.0.1:8888');



		$rest = curl_exec($crl);

		if ($rest == false)
		{
			print_r('Curl error: ' . curl_error($crl));
		}

		curl_close($crl);

		$obj = json_decode($rest);
		$access_token = $obj->access_token;
		return $access_token;
	}
	
	
	
	function enviarJson($content, $access_token)
	{		
		
			global $URL_SERVICIO_CRM, $HEDER_CRM_SERVICIO;

		   $URLServicio = $URL_SERVICIO_CRM;		      
		
	

		$ch = curl_init();



		$header = array();
		$header[] = 'content-type: application/json';
	    $header[] = $HEDER_CRM_SERVICIO;		
		$header[] = 'Content-length: '.strlen($content);
		$header[] = 'Authorization: bearer '.trim($access_token);

		curl_setopt($ch, CURLOPT_URL,$URLServicio);
		curl_setopt($ch, CURLOPT_POST,true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
		curl_setopt($ch, CURLOPT_HEADER, false); //debugear
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		

		$result = curl_exec($ch);
		
		// echo $result."\n";
		
		
		if ($result == false)
		{
			// throw new Exception('Curl error: ' . curl_error($crl));
			print_r('Curl error: ' . curl_error($ch));
		}	
		
		curl_close($ch);
		return $result;
	}
	
	
	
	
	
	
	
	function envialeads($datos)
	{
		
		
		/*
		
		 'Nombre'              => utf8_encode($nombre1)
            , 'Segundo_Nombre'      => utf8_encode($nombre2)
            , 'Apellido_Paterno'    => utf8_encode($datos['APELLIDO_PATERNO'])
            , 'Apellido_Materno'    => utf8_encode($datos['APELLIDO_MATERNO'])
            , 'Telefono_Lada'       => utf8_encode($telefonoLada)
            , 'Telefono_Numero'     => utf8_encode($telefonoNum)
            , 'Correo_Electronico'  => utf8_encode($datos['CORREO'])
            , 'Nivel'               => utf8_encode($nivel)
            , 'Codigo'              => utf8_encode($datos['PK_PROGRAMA'])      // antes: 'code'
            , 'Descripcion'         => utf8_encode($datos['DESCRIPCION'])
            , 'Campus'              => utf8_encode($datos['PK_CAMPUS'])
            , 'Estado'              => utf8_encode($datos['CLAVE_ESTADO'])
            , 'Municipio'           => utf8_encode($datos['CLAVE_MUNICIPIO'])
            , 'Pais'                => utf8_encode($Pais)
            //, 'OtroEstado'            => $_GET['otroEstado']
            , 'Origen'              => utf8_encode('1')
            , 'SubOrigen'           => utf8_encode(str_replace('\\', '', $datos['URL']))
            , 'VPD'                 => utf8_encode($datos['PK_CAMPUS'])
        //  , 'ua_nombre'           => $_GET['campus']
		*/
		
		
		
		$apellidos[0]= $datos['Apellido_Paterno'];
		$apellidos[1]= $datos['Apellido_Materno'];
		$nombre = $datos['Nombre'].' '.$datos['Segundo_Nombre'];
        $code =  $datos['Codigo'];		
		$correo =  $datos['Correo_Electronico'];		
		$telefono = $datos['Telefono_Lada'].' '.$datos['Telefono_Numero'];
		$url =  $datos['SubOrigen'];	
		
		
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
		
		
		
	}
	

	
	


function actualizaFlagsEnviadoCRM($tipo,$idprospecto)
	{
   
    if($tipo=='SI')
    {
      $fecha = date("Y-m-d H:i:s"); 
    }
    
	  if(is_null($tipo))
    {
      $tipo = 'NO';
        $fecha = null; 
    }
    
      if($tipo=='NO')
      {
         $tipo= 'NO';
         $fecha = null; 
      }
	  
	    
	  
	  
	    echo 'console.log(entro a actualizaFlagsEnviadoCRM='. $tipo .'-----'.$idprospecto.');';
	
		$PK_PROSPECTO = $idprospecto;
    $campos = array(
		   'ENVIADO_CRM' => $tipo
		   ,'FECHA_M' => date("Y-m-d H:i:s")
           ,'FECHA_ENVIADO_CRM' => $fecha
      );
    $cond='PK1 = ' .$PK_PROSPECTO;
    database::updateRecords('PROSPECTOS',$campos,$cond);
		
	}

	function guardaErrorCRM($error,$content,$datos)
	{
		$jsonenviado = $content;
		$PK_PROSPECTO = $datos['PK1'];
		
		$codigo = "LC";
		
		$ENTRADA=
			   'nombre:"'			.$datos['NOMBRE']
			.'",apellidoPaterno:"'	.$datos['APELLIDO_PATERNO']
			.'",apellidoMaterno:"'	.$datos['APELLIDO_MATERNO']
			.'",telefono:"'			.$datos['TELEFONO']
			.'",correo:"'			.$datos['CORREO']
			.'",codigo:"'			.$codigo
			.'",programa:"'			.$datos['PK_PROGRAMA']
			.'",descripcion:"'		.$datos['DESCRIPCION']
			.'",campus:"'			.$datos['PK_CAMPUS']
			.'",claveEstado:"'		.$datos['CLAVE_ESTADO']
			.'",claveMunicipio:"'	.$datos['CLAVE_MUNICIPIO']
			//.'",otroEstado:"'		.$datos['otroEstado']
			.'",url:"'				.$datos['URL']
			.'"'
		;

		$campos = array(
			 'PK_PROSPECTO' => $PK_PROSPECTO
			,'TIPO' => 'CRM'
			,'ERROR' => str_replace("'", "''", $error)
			,'ENTRADA' => str_replace("'", "''", $ENTRADA)
			//	,'SALIDA' => $salida
			//,'SALIDA' =>str_replace("'", "''", $salida)
		);

		$result =  database::insertRecords("ERRORES",$campos);

    /*inicio vdelacruz */

    $de= '';
    //$para = $responsable
    //EnviarCorreo($de,$para,$idprospecto);
    $idprospecto = $PK_PROSPECTO;
//    EnviarCorreoError($campos);
 EnviarCorreoError($campos,$jsonenviado );

 
 }

 function EnviarCorreoError($campos,$json)
       {

                $pkprospecto = $campos['PK_PROSPECTO'];
                $tipo = $campos['TIPO'];
                $error = $campos['ERROR'];
                $entrada = $campos['ENTRADA'];
               // $salida = $campos['SALIDA'];
                $mail = new PHPMailer;

        //$mail->SMTPDebug	= true;
        // $mail->ClearAllRecipients();
         $mail->isSMTP();									  // Set mailer to use SMTP

         $mail->Host = 'smtp.office365.com';	 // Specify main and backup server

         $mail->SMTPAuth = true;								  // Enable SMTP authentication

         $mail->Username = 'prospectos@redanahuac.mx';							 // SMTP username

         $mail->Password = 'P1$$w0rd';							// SMTP password

         $mail->SMTPSecure = 'tls';

         $mail->Port = '587';	


		//$mail->SingleTo   = true;
		//$mail->CharSet    = "UTF-8";
		 // Enable encryption, 'ssl' also accepted

         $mail->From = 'prospectos@redanahuac.mx';

         $mail->FromName = 'Prospecto';

         //$mail->addAddress($para);  // Add a recipient
         // $mail->addAddress('virgil85@gmail.com');  // Add a recipient
      //   $mail->addAddress('vdelacruz@anahuac.mx');  // Add a recipient
       // $mail->addAddress('rmoyao@anahuac.mx');  // Add a recipient
        //$mail->addAddress('jmartinez@anahuac.mx');  // Add a recipient
         //$mail->addAddress('vdelacruz@anahuac.mx');				  // Name is optional
         //$mail->addAddress('lvenegas@anahuac.mx');				  // Name is optional
		 
		 //if(strcmp(trim($line),trim('PRODUCCION'))==0)
		if(AMBIENTE == "produccion"){
			 
			     $mail->addAddress('rmoyao@anahuac.mx');  // Add a recipient
                 $mail->addAddress('jmartinez@anahuac.mx');  // Add a recipient
				 $mail->addAddress('lvenegas@anahuac.mx');
				 $mail->addAddress('maximo.cruz@anahuac.mx');
				 echo 'correos prod';
		 }		
		else	
		 {
			 $mail->addAddress('edgar.trejo@anahuac.mx');  // Add a recipient
			  // $mail->addAddress('jmartinez@anahuac.mx');
          //   $mail->addAddress('lvenegas@anahuac.mx');			 
           //  $mail->addAddress('edgar.trejo.sanchez@gmail.com'); 			 
			 echo 'correos pruebas';
		 }
		 
         //$mail->addReplyTo('planeacion@redanahuac.mx');

         //$mail->addCC('cc@example.com');

         $mail->addBCC('prospectos@redanahuac.mx');

          //$mail->addBCC($cc);

         $mail->WordWrap = 50;								  // Set word wrap to 50 characters

         //$mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments

         //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

         $mail->isHTML(true);								  // Set email format to HTML



         $mail->Subject = 'Error al enviar datos mediante el Formulario Apreu num prospecto = '. $pkprospecto. ' en el ambiente '.AMBIENTE;

         $mail->Body	   =
         '<html><head>'.
          '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>'.
         '</head>'.
         '<body>'.
         '<div>Ocurri&oacute; un error cuando el prospecto num '. $pkprospecto. ' envio sus datos mediante el formulario APREU'.'</div>'.
          // Encoding::fixUTF8($error).
         '<div>El error fue el siguiente: <b>'. $error. '</div>'.
'<div>El error fue el siguiente: <b>'. $error. '</div>'.
	     '<div>JSON Enviado</div>'.
            '<div>'.
           serialize($json).
		    '</div>'.
            '</br>'.
              '</br>'.
         '<div>Detalles del error</div>'.
              '<div>'.
                  '<br>'.'error='. $error . '</br>'.
                  '<br>'.'pk prospecto='. $pkprospecto . '</br>'.
                  '<br>'.'tipo='.$tipo . '</br>'.
                  '<br>'.'error='.$error . '</br>'.
                  '<br>'.'entrada='.$entrada . '</br>'.
                  '<br></div>';// '<br>'.'salida='.$salida . '</br></div>';
                  '</body></html>'.

         $mail->send();
		//$mail->ClearAllRecipients();



       }
	
	
	  class Fecha {
					public $Year;
					public $Month;
					public $Day;
			      };	





class database
{
    public $pdo = false;
    public $type = 'mssql';
    public $username = '';
    public $password = '';
    public $host = 'localhost';
    public $database = '';
    public $persistent = false;
    public $showErrors = false;
    public $queryCounter = 0;
    private $connected = false;
    public $filas = '';
    private static $instance = null;
    private $connection;
    var $queryCache = array();
    var $dataCache = array();
    var $result;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function __construct($type = TYPE, $host = HOST, $database = DB, $username = USERDB, $password = PWDDB, $showErrors = true, $persistent = false)
    {
        $this->type       = $type;
        $this->host       = $host;
        $this->database   = $database;
        $this->username   = $username;
        $this->password   = $password;
        $this->showErrors = $showErrors;
        $this->persistent = $persistent;
        $this->newConnection();
    }
    public function __destruct()
    {
        $this->dbDisconnect();
    }
    function newConnection()
    {
        switch ($this->type) {
            case 'mysql':
                if (extension_loaded('pdo_mysql')) {
                    $this->pdo = new PDO('mysql:' . $connectLine, $this->username, $this->password, array(
                        PDO::ATTR_PERSISTENT => $this->persistent,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                    ));
                    if ($this->pdo) {
                        $this->connected = true;
                    } else {
                        trigger_error('Cannot connect to database', E_USER_ERROR);
                    }
                } else {
                    trigger_error('PDO MySQL extension not enabled', E_USER_ERROR);
                }
                break;
            case 'sqlite':
                if (extension_loaded('pdo_sqlite')) {
                    $this->pdo = new PDO('sqlite:' . $connectLine, $this->username, $this->password, array(
                        PDO::ATTR_PERSISTENT => $this->persistent
                    ));
                    if ($this->pdo) {
                        $this->connected = true;
                    } else {
                        trigger_error('Cannot connect to database', E_USER_ERROR);
                    }
                } else {
                    trigger_error('PDO SQLite extension not enabled', E_USER_ERROR);
                }
                break;
            case 'postgresql':
                if (extension_loaded('pdo_pgsql')) {
                    $this->pdo = new PDO('pgsql:' . $connectLine, $this->username, $this->password, array(
                        PDO::ATTR_PERSISTENT => $this->persistent
                    ));
                    if ($this->pdo) {
                        $this->pdo->exec('SET NAMES \'UTF8\'');
                        $this->connected = true;
                    } else {
                        trigger_error('Cannot connect to database', E_USER_ERROR);
                    }
                } else {
                    trigger_error('PDO PostgreSQL extension not enabled', E_USER_ERROR);
                }
                break;
            case 'oracle':
                if (extension_loaded('pdo_oci')) {
                    $this->pdo = new PDO('oci:' . $connectLine . ';charset=AL32UTF8', $this->username, $this->password, array(
                        PDO::ATTR_PERSISTENT => $this->persistent
                    ));
                    if ($this->pdo) {
                        $this->connected = true;
                    } else {
                        trigger_error('Cannot connect to database', E_USER_ERROR);
                    }
                } else {
                    trigger_error('PDO Oracle extension not enabled', E_USER_ERROR);
                }
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                    $this->pdo = new PDO('dblib:' . $connectLine, $this->username, $this->password, array(
                        PDO::ATTR_PERSISTENT => $this->persistent
                    ));
                    if ($this->pdo) {
                        $this->pdo->exec('SET NAMES \'UTF8\'');
                        $this->connected = true;
                    } else {
                        trigger_error('Cannot connect to database', E_USER_ERROR);
                    }
                } else if (extension_loaded('mssql')) {
                    if (!($this->connection = mssql_connect($this->host, $this->username, $this->password))) {
                        echo 'Error inesperado al conectarse a la base de datos.\n';
                        die('MSSQL error: ' . mssql_get_last_message());
                        exit();
                    } else {
                        mssql_select_db($this->database, $this->connection);
                    }
                } else if (extension_loaded('sqlsrv')) {
                    $connectionInfo = array(
                        "Database" => $this->database,
                        "UID" => $this->username,
                        "PWD" => $this->password
                    );
                    $this->connection = sqlsrv_connect($this->host, $connectionInfo);
                    if ($this->connection) {
                    } else {
                        echo "Connection could not be established.<br />";
                        die(print_r(sqlsrv_errors(), true));
                    }
                }
                break;
            default:
                trigger_error('This database type is not supported', E_USER_ERROR);
                break;
        }
    }
    public static function getRow($query)
    {
        $database = self::GetInstance();
        switch ($database->type) {
            case 'mysql':
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                } else if (extension_loaded('mssql')) {
                    $result = mssql_query($query);
                    if (!$result) {
                        echo 'Error in statement execution.\n';
                        die('MSSQL error: ' . mssql_get_last_message() . $query);
                    }
                    if (mssql_num_rows($result)) {
                        $row = mssql_fetch_array($result, MSSQL_ASSOC);
                        return $row;
                    } else {
                        return FALSE;
                    }
                } else if (extension_loaded('sqlsrv')) {
                    $params  = array();
                    $options = array(
                        "Scrollable" => SQLSRV_CURSOR_KEYSET
                    );
                    $result  = sqlsrv_query($database->connection, $query, $params, $options);
                    if (!$result) {
                        echo 'Error in statement execution s.\n';
                        die("Problemas en el select:" . sqlsrv_errors() . "QUERY:" . $query);
                    }
                    $row_count = sqlsrv_num_rows($result);
                    if ($row_count) {
                        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                        return $row;
                    } else {
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
        switch ($database->type) {
            case 'mysql':
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                } else if (extension_loaded('mssql')) { //linux
                    /*if($date!=""){
                    }*/
                    return $date;
                } else if (extension_loaded('sqlsrv')) { //microsoft
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
        switch ($database->type) {
            case 'mysql':
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                } else if (extension_loaded('mssql')) {
                    $result = mssql_query($query);
                    if (!$result) {
                        echo 'Error in statement execution.\n';
                        die('MSSQL error: ' . mssql_get_last_message() . $query);
                    } else {
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
                } else if (extension_loaded('sqlsrv')) {
                    $result = sqlsrv_query($database->connection, $query);
                    //echo $query;
                    if (!$result) {
                        echo 'Error in statement execution s.\n';
                        die("Problemas en el select:" . sqlsrv_errors() . $query);
                    } else {
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
    public static function executeQuery($query, $params = "")
    {
        $database = self::GetInstance();
        switch ($database->type) {
            case 'mysql':
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                } else if (extension_loaded('mssql')) {
                    $result = mssql_query($query);
                    if (!$result) {
                        echo 'Error in statement execution.\n';
                        die('MSSQL error: ' . mssql_get_last_message());
                    }
                    return $result;
                } else if (extension_loaded('sqlsrv')) {
                    $result = sqlsrv_query($database->connection, $query);
                    if (!$result) {
                        echo 'Error in statement execution s.\n';
                        die("Problemas en el insert:" . sqlsrv_errors() . "QUERY:" . $query);
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
        switch ($database->type) {
            case 'mysql':
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                } else if (extension_loaded('mssql')) {
                    $result = mssql_query($query);
                    if (!$result) {
                        echo 'Error in statement execution.\n';
                        die('MSSQL error: ' . mssql_get_last_message());
                    }
                    $row_count = mssql_num_rows($result);
                    return $row_count;
                } else if (extension_loaded('sqlsrv')) {
                    $params  = array();
                    $options = array(
                        "Scrollable" => SQLSRV_CURSOR_KEYSET
                    );
                    $result  = sqlsrv_query($database->connection, $query, $params, $options);
                    if (!$result) {
                        echo 'Error in statement execution s.\n';
                        die("Problemas en el select:" . sqlsrv_errors());
                    }
                    $row_count = sqlsrv_num_rows($result);
                    if ($row_count) {
                        return $row_count;
                    } else {
                        return 0;
                    }
                }
                break;
            default:
                //trigger_error('This database type is not supported',E_USER_ERROR);
                break;
        }
    }
    public static function executeStoreProcedure($storep, $params, $type)
    {
        $database = self::GetInstance();
        switch ($database->type) {
            case 'mysql':
                break;
            case 'mssql':
            case 'sqlsrv':
                if (extension_loaded('pdo_mssql')) {
                } else if (extension_loaded('mssql')) {
                    $proc        = mssql_init($storep, $database->connection);
                    $proc_result = mssql_execute($proc);
                    if (!$result) {
                        echo 'Error in statement execution.\n';
                        die('MSSQL error: ' . mssql_get_last_message());
                    }
                    return $result;
                } else if (extension_loaded('sqlsrv')) {
                    $result = sqlsrv_query($database->connection, $query, $store, $params);
                    if ($result === false) {
                        echo 'Error in statement execution s.\n';
                        die("Problemas en el store:" . sqlsrv_errors());
                    } else {
                        if ($type == "get") {
                            $arr = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                            return $arr;
                        } else {
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
    function cacheQuery($queryStr)
    {
        if (!$result = $this->connections[$this->activeConnection]->query($queryStr)) {
            trigger_error('Error al ejecutar y cachear a la consulta: ' . $this->connections[$this->activeConnection]->error, E_USER_ERROR);
            return -1;
        } else {
            $this->queryCache[] = $result;
            return count($this->queryCache) - 1;
        }
    }
    /**
     * Obtiene el n�mero de filas de la cach�
     * @param int El puntero de la consulta en cach�
     * @return int the number of rows
     */
    function numRowsFromCache($cache_id)
    {
        return $this->queryCache[$cache_id]->num_rows;
    }
    /**
     * Recibe las filas de una consulta en la cach�
     * @param int El puntero de la consulta en cach�
     * @return array the row
     */
    function resultsFromCache($cache_id)
    {
        return $this->queryCache[$cache_id]->fetch_array(MYSQLI_ASSOC);
    }
    /**
     * Guardar los datos en cach� para su posterior uso
     * @param array Los datos
     * @return int El total de registros almacenados en la cach�
     */
    function cacheData($data)
    {
        $this->dataCache[] = $data;
        return count($this->dataCache) - 1;
    }
    function dataFromCache($cache_id)
    {
        return $this->dataCache[$cache_id];
    }
    public static function deleteRecords($table, $condition, $limit)
    {
        $limit  = ($limit == '') ? '' : ' LIMIT ' . $limit;
        $delete = "DELETE FROM {$table} WHERE {$condition} {$limit}";
        // echo $delete;
        database::executeQuery($delete);
    }
    public static function updateRecords($table, $changes, $condition)
    {
        $update = "UPDATE " . $table . " SET ";
        foreach ($changes as $field => $value) {
            $value = mb_convert_encoding($value, "ISO-8859-1", "UTF-8");
            $update .= "" . $field . "='{$value}',";
        }
        $update = substr($update, 0, -1);
        if ($condition != '') {
            $update .= " WHERE " . $condition;
        }
        // echo $update;
        database::executeQuery($update);
        return true;
    }
    public static function insertRecords($table, $data)
    {
        // Configuraci�n de variables para campo y valor
        $fields = "";
        $values = "";
        // Rellena las variables con los campos y sus valores
        foreach ($data as $f => $v) {
            $v = mb_convert_encoding($v, "ISO-8859-1", "UTF-8");
            $fields .= "$f,";
            $values .= (is_numeric($v) && (intval($v) == $v)) ? $v . "," : "'$v',";
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
     * Obtiene el n�mero de las filas afectadas en la �ltima consulta realizada
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
    function sanitizeData($data)
    {
        return $this->connections[$this->activeConnection]->real_escape_string($data);
    }
    public function dbDisconnect($resetQueryCounter = false)
    {
        if ($this->connected && !$this->persistent) {
            if ($resetQueryCounter) {
                $this->queryCounter = 0;
            }
            $this->pdo       = null;
            $this->connected = false;
            return true;
        } else {
            return false;
        }
    }
    private function dbErrorCheck($query, $queryString = false, $variables = array())
    {
        if ($this->connected) {
            if ($this->showErrors) {
                $errors = $query->errorInfo();
                if ($errors && !empty($errors)) {
                    if (!empty($variables)) {
                        trigger_error('QUERY:' . "\n" . $this->dbDebug($queryString, $variables) . "\n" . 'FAILED:' . "\n" . $errors[2], E_USER_WARNING);
                    } else {
                        trigger_error('QUERY:' . "\n" . $queryString . "\n" . 'FAILED:' . "\n" . $errors[2], E_USER_WARNING);
                    }
                }
            }
        } else {
            trigger_error('Database not connected', E_USER_ERROR);
        }
        return true;
    }





}



 ?>
