<?php
require 'libs/PHPMailer/PHPMailerAutoload.php';
class maestriaspModel {
	

	var $proyectos;
	var $totalnum;
	var $totalPag;
	var $categorias;
	var $usuarios;
	var $campus;
	var $programa;
	var $grado;
	var $nombre;
	var $apellidos;
	var $telefono;
	var $correo;
	var $ciudad;
	var $responsables;
	var $usuario;
	var $divisiones;
	var $programas;
	

	
	
	function __construct() {
		
	}

    function buscarUsuarios()
	{
		// maximo por pagina
		$size = $_GET["s"];
		// pagina pedida
        $pag = (int) $_GET["p"];
        if ($pag < 1)
			$pag = 1;
        
		$offset = $size * ($pag-1);
		$limit = $size * $pag;
		
		$order = "";
		$filter = "";
		$buscar = "";
		
		$sort=$_GET['sort'];
		if(isset($_GET['sort'])&& $sort != "" && $sort != '-1')
			$order = " AND PK_PROGRAMA = '".$_GET['sort']."'";
		
	    if(isset($_GET['filter']))
			$filter = "'".str_replace(";","','",$_GET['filter'])."'";
		else
			$filter = "'".($_SESSION['session']['nodo'])."'";	
		
	    if(isset($_GET['q']) && $_GET['q']!= "")
			$buscar = " AND (NOMBRE LIKE '%".$_GET['q']."%') OR (APELLIDOS LIKE '%".$_GET['q']."%') ";

	
  		/*
	  $sql ="SELECT  *
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY FECHA_R DESC ) AS RowNum, *
          FROM      PROSPECTOS WHERE PK_NIVEL = 4 AND PK_CAMPUS IN( $filter ) $order  $buscar
        ) AS RowConstrainedResult
WHERE   RowNum > $offset
    AND RowNum <= $limit
ORDER BY FECHA_R DESC";
//*/
	  $sql ="SELECT  P.*, G.DESCRIPCION AS 'PROGRAMA'
FROM    ( SELECT ROW_NUMBER() OVER ( ORDER BY FECHA_R DESC ) AS RowNum, *
          FROM      PROSPECTOS WHERE PK_NIVEL = 4 AND PK_CAMPUS IN( $filter ) $order  $buscar
        ) AS P, PROGRAMAS G 
WHERE   RowNum > $offset
    AND RowNum <= $limit 
	AND P.PK_PROGRAMA=G.PK1
ORDER BY FECHA_R DESC";

		$sqlcount = "SELECT * FROM PROSPECTOS WHERE PK_NIVEL = 4  AND PK_CAMPUS IN( $filter ) $order $buscar";
		
		//	echo $sqlcount;	
	 	//$result = database::executeQuery($sql);
		
        $total = database::getNumRows($sqlcount);
	    $this->totalnum = $total;
		
		$rows = database::getRows($sql);
		$this->usuarios = array();
		foreach($rows as $row)
			$this->usuarios[] = $row;
		
		/*
	    while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
			$this->usuarios[] = $row;
        }
		//*/
		
		//CALCULAMOS EL TOTAL DE PAGINAS
		$this->totalPag = ceil($total/$size);
	}
     	
     	
     	 function getProspectosUniversidad(){		
		
		 $sql = "SELECT * FROM PROSPECTOS ";
         $this->divisiones = database::getRows($sql);	
		
		
		}
     	
       function BuscarNivelDivision(){		
		
		//$this->divisiones = array();
		
		 $sql = "SELECT * FROM DIVISIONES WHERE PK_NIVEL = '4' ORDER BY ORDEN";
         $this->divisiones = database::getRows($sql);	
		
		
		}
		
		 function BuscarDivisionPrograma($division){		
		
		
		//$this->programas = array();
		
		 $sql = "SELECT * FROM PROGRAMAS WHERE PK_DIVISION = '$division'";
         $this->programas = database::getRows($sql);	
		
		
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
     	
     	
     	
     function Guardar(){						
			
			
			           $this->campos = array(
		                     'GRADO'=>$this->grado,   
	                         'PROGRAMA'=>$this->programa,	                         						
							 'CAMPUS'=>$this->campus,
							 'NOMBRE'=>$this->nombre,
							 'APELLIDOS'=>$this->apellidos,
							 'CORREO'=>$this->correo,
							 'TELEFONO'=>$this->telefono,
							 'CIUDAD'=>$this->ciudad,							
							 
							 );
			
			
		            database::insertRecords("PROSPECTOS",$this->campos);				      
									 
		
	}
	
	
		function BuscarProspecto($idprospecto){
		
		$sql = "SELECT * FROM PROSPECTOS WHERE PK1 = '$idprospecto'";   
		
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}
		
	
	   function Editar($idprospecto){						
			
			
			           $this->campos = array(
		                     'GRADO'=>$this->grado,   
	                         'PROGRAMA'=>$this->programa,	                         						
							 'CAMPUS'=>$this->campus,
							 'NOMBRE'=>$this->nombre,
							 'APELLIDOS'=>$this->apellidos,
							 'CORREO'=>$this->correo,
							 'TELEFONO'=>$this->telefono,
							 'CIUDAD'=>$this->ciudad,
							 'FECHA_M'=>date("Y-m-d H:i:s"),							
							 
							 );
			
			         $condition = "PK1 = '$idprospecto' ";		   
		   			 database::updateRecords("PROSPECTOS",$this->campos,$condition);       				      
									 
		
	}
	
	
	
	
	 function Eliminar(){						
			
						
		foreach($this->usuarios as $usuario){	 		
			
		    $sql = "DELETE FROM PROSPECTOS WHERE PK1 = '$usuario'" ;
		    $row = database::getRow($sql);
		               
	    }		
			       
		
	}

    
   
    function ObtenerUsuarios($ids){
	 	
	 	$ids = explode("|", $ids);
	 	array_pop($ids);
	 	$imagen = "";
	 	
	 	
	 	for($i=0;$i<sizeof($ids);$i++){
			
		$id = $ids[$i];
		$sql = "SELECT * FROM USUARIOS WHERE PK1 = '$id'" ;
	    $row = database::getRow($sql);
	    
	    if($row){
			$imagen.= $row['IMAGEN']."|";
		}
			
		}
	 	
		return $imagen;
	
		
	 }
		
		
		//CORREO
		
		
		
		function RolResponsable($responsable){
		
		 $sql = "SELECT * FROM ROLES_USUARIO WHERE PK_ROLE = 'R56B4F9E14D887' AND PK_USUARIO = '$responsable' ";//licenciaturas			            
		
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}
		
		function Enviar(){	
	
               
	        foreach($this->usuarios as $idprospecto){	 		
				
					$sql = "SELECT PK_CAMPUS FROM PROSPECTOS WHERE PK1='$idprospecto'";   
				    $usr = database::getRow($sql);				    
				    $campus = trim($usr['PK_CAMPUS']);			 
					 
					$sql = "SELECT PK1 FROM USUARIOS WHERE PK_JERARQUIA='$campus'";  
					//$responsable = database::getRow($sql);	
					$this->responsables = database::getRows($sql);				
					$numresp = sizeof($this->responsables);			       
	   	
		         if($numresp != 0){	  		
	  			
					 foreach($this->responsables AS $responsable)
					 {				
						 if($responsable['PK1']!='admin'){			       		
					       		
					          	$trol =	$this->RolResponsable($responsable['PK1']); 
					       				       								  
					       		if($trol){					       		
					       									  
							          $this->EnviarCorreo($_SESSION['session']['user'],$responsable['PK1'],$idprospecto);				       								  
							    }
							  
					     }   
					    
				     }	
			     }          
		    }	
		
       }
	
	
	function EnviarCorreo($de,$para,$idprospecto){     

                              

            //    $sql = "SELECT * FROM USUARIOS WHERE PK1 = '$de'";  

  //  $rowde = database::getRow($sql);

               

                $sql = "SELECT * FROM USUARIOS WHERE PK1 = '$para'";  

    $rowpara = database::getRow($sql);        

               

                $sql = "SELECT * FROM PROSPECTOS WHERE PK1 = '$idprospecto'";  

    $row = database::getRow($sql);  
                
                
                
              //  $grado = 'LICENCIATURA';                
                
                
                $grado = $this->BuscarNivel($row['PK_NIVEL']);  
                $programa = $this->BuscarPrograma($row['PK_PROGRAMA']);   
                $descampus = $this->BuscarCampus($row['PK_CAMPUS']);              
                $campus = $row['PK_CAMPUS'];
                $nombre = $row['NOMBRE'];               
                $apellidos = $row['APELLIDOS'];
                $correo = $row['CORREO'];
                $telefono = $row['TELEFONO'];
                $ciudad =  $row['CIUDAD'];
                
                
                
               /* $programa = $row['PROGRAMA'];
                $campus = $row['CAMPUS'];
                $nombre = $row['NOMBRE'];
                $campus = $row['APELLIDOS'];
                $correo = $row['CORREO'];
                $telefono = $row['TELEFONO'];
                $ciudad =  $row['CIUDAD'];*/
                             

                $mail = new PHPMailer;

    $para = trim($rowpara['EMAIL']);

 

 

//$mail->SMTPDebug  = 2;

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.office365.com';  // Specify main and backup server 
 
$mail->SMTPAuth = true;                               // Enable SMTP authentication 

$mail->Username = 'prospectos@redanahuac.mx';                            // SMTP username

$mail->Password = 'P1$$w0rd';                           // SMTP password

$mail->SMTPSecure = 'tls';

$mail->Port = '587';                            // Enable encryption, 'ssl' also accepted

 

$mail->From = 'prospectos@redanahuac.mx';

$mail->FromName = 'Prospecto';

$mail->addAddress($para);  // Add a recipient

//$mail->addAddress('jose.ruiz@redanahuac.mx');               // Name is optional

//$mail->addReplyTo('planeacion@redanahuac.mx');

//$mail->addCC('cc@example.com');

$mail->addBCC('prospectos@redanahuac.mx');

 

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

<h1 style="font-family:Segoe UI, Tahoma, sans-serif; margin:0px; font-size:12pt; line-height:19px; color:#072B60; font-weight:normal;color:#ffffff;">'.__toHtml($nombre, ENT_QUOTES, "ISO-8859-1").' '.utf8_encode($apellidos).'</h1>

<p style="margin:0;font-size:11pt;font-family:Segoe UI, Tahoma, sans-serif;color:#000;color:#ffffff;"></p>

                               </td>

                               <td width="15" style="background:#E66500; border-top:1px solid #e3e3e3;">&nbsp;</td>

                               <td width="205" align="right" valign="middle" style="background:#E66500; border-top:1px solid #e3e3e3; padding:18px 0; line-height:1px;">

<img src="<?php $rutaActual;?>skins/default/img/logo_anahuac.png"  alt="Red de Universidades Anahuac" border="0">

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
                        <td><strong>Programa: </strong>'.__toHtml($programa, ENT_QUOTES, "ISO-8859-1").'</td>  
                     </tr> 
                     <tr>                     
					    <td><strong>Campus:</strong> '.$campus.' | '.$descampus.' </td>
					 </tr> 
					 <tr>
					   <td>&nbsp;</td>
				    </tr>
					 <tr> 
					    <td><strong>Nombre: </strong>'.__toHtml($nombre, ENT_QUOTES, "ISO-8859-1").' <strong>Apellidos: </strong>'.utf8_encode($apellidos).'</td>
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
					    <td><strong>Ciudad: </strong>'.__toHtml($ciudad, ENT_QUOTES, "ISO-8859-1").'</td> 
					 </tr>      
        

</table></br>



  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;">

                <tr>

 

                  <td style="font-family:Segoe UI, Tahoma, sans-serif; font-size:12pt; text-align:center; color:#557eb9; padding:5px 0px 5px 15px;">&nbsp;</td>

               

                  <td style="padding:0px 15px; font-family:Segoe UI, Tahoma, sans-serif; font-size:10pt; color:#000;"><a href="<?php $rutaActual;?>apreu/"  title="<?php $rutaActual;?>apreu" style="color:#072b60;"><?php $rutaActual;?>apreu/</a></td>

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

                                                                              <td width="127"><img src="<?php $rutaActual;?>apreu/multimedia_user/templates/33/media/base/menu_derecha.png"  alt="Red de Universidades Anáhuac" border="0"></td>

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
		
		  
		  
	
	
	
	
}

?>