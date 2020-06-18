<?php

class printproyectoModel {
	

	var $idplan;
	var $pasos;
	var $etapas;
	
	function __construct() {
		
	}
     
	 
    function getProyectos($id){
		
		$sql = "SELECT * FROM PROYECTOS WHERE PK1 = '$id'";   
		$row = database::getRow($sql);
	
		if($row){
			return $row;
		}else{
			return FALSE;
		}
		}



    function getLineas(){
		
	
		 if(isset($_GET['idProyecto'])){
			$proyecto = $this->getProyectos($_GET['idProyecto']);
		}else{
            $proyectos =  explode("/",$_GET['execute']);
			$proyecto = $planes[1];		
			$proyecto = $this->getProyectos($proyecto);
		}
		 
		//$diferenciaFecha = $proyecto['FECHA_T'] - $proyecto['FECHA_I'];
		 
		 if($proyecto['CONT_PE']==0){$cont_PE="no";}
		 else{$cont_PE="sí";}
		 if($proyecto['CONT_PO']==0){$cont_PO="no";}
		 else{$cont_PO="sí";}
		 if($proyecto['INC_PRESUPUESTO']=='S'){$inc_Pres="sí";}
		  if($proyecto['INC_PRESUPUESTO']=='P'){$inc_Pres="una parte";}
		 else{$inc_Pres="no";}		 
		
		$html = "<div align=\"center\"><h2>".__toHtml($proyecto['PROYECTO'])."</h2></div><br/>";
	    
		$html .="<table>";
		
		 $html .= '  
			   <tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>Resumen Ejecutivo:</strong></td></tr>
			   <tr><td> </td></tr>
			   <tr><td><strong>1.1 Nombre del Proyecto:</strong></td></tr>
			   <tr>
			   <td class="title"><strong>'.__toHtml($proyecto['PROYECTO'], ENT_QUOTES, "ISO-8859-1").'</strong></td></tr><tr><td> </td></tr>
			    <tr><td class="title"> <strong>1.2 Folio:</strong></td></tr>
				 <tr><td class="title">'.$proyecto['FOLIO'].'</td></tr>
			   <tr><td class="title"> <strong>1.3 Descripción del Proyecto</strong>:</td></tr>
	           <tr><td>'.__toHtml($proyecto['DESCRIPCION'], ENT_QUOTES, "ISO-8859-1").' </td></tr> ';
					
	$html .= '<tr><td class="title"> <strong>1.4 ¿Contribuye a los Objetivos del Plan Estratégico?</strong>:</td></tr>
	<tr><td>'.$cont_PE.' </td></tr>
	 <tr><td> </td></tr>
	<tr><td class="title"> <strong>1.5 ¿Está en el plan Operativo del año?</strong>:</td></tr>
	<tr><td>'.$cont_PO.' </td></tr>
	 <tr><td> </td></tr>
	<tr><td class="title"> <strong>1.6 ¿Está incluido en el presupuesto del año?</strong>:</td></tr>
	<tr><td>'.__toHtml($inc_Pres, ENT_QUOTES, "ISO-8859-1").' </td></tr>
	 <tr><td> </td></tr>
	<tr><td class="title"> <strong>1.7 Total de Inversión</strong>:</td></tr>
	<tr><td>'.__toHtml($proyecto['INVERSION'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	 <tr><td> </td></tr>
	<tr><td class="title"> <strong>1.8 Fuentes de financiamiento</strong>:</td></tr>
	<tr><td><strong>Interna:</strong> </td></tr>
	'. $this->getInversion_Interna($_GET['idProyecto']).'  
    <tr><td> </td></tr>
	<tr><td><strong>Externa:</strong> </td></tr>
	'. $this->getInversion_Externa($_GET['idProyecto']).' 
    <tr><td> </td></tr>
	<tr><td class="title"> <strong>1.9 Tiempo estimado de Ejecución</strong>:</td></tr>
	<tr><td>'.__toHtml($proyecto['TIEMPO_EJECUCION'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	 <tr><td> </td></tr>
	<tr><td class="title"> <strong>1.10 Nivel principal al que pertenece el usuario dentro de la jerarquia institucional</strong>:</td></tr>	<tr><td>'.$proyecto['PK_JERARQUIA'].' </td></tr>
	</table><p></p>';
	 
	 $html .= ' <table>	 
	 	
   <tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>Identificación del Proyecto:</strong></td></tr>
   <tr><td> </td></tr>
	<tr><td class="title"> <strong>Antecedentes:</strong></td></tr>
	<tr><td>'.__toHtml($proyecto['ANTECEDENTES'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
    <tr><td> </td></tr>
	<tr><td class="title"><strong>2.2 Justificación</strong></td></tr>
	<tr><td class="title"><strong> 2.2.1 Identidad y Misión Institucional:</strong></td></tr>
	 <tr><td> </td></tr>
	<tr><td>'.__toHtml($proyecto['IMI'], ENT_QUOTES, "ISO-8859-1").' </td></tr>	
	<tr><td></td></tr>
	<tr><td class="title"> <strong>2.2.2 Alineación al plan Estratégico, Plan Operativo Anual y Presupuesto:</strong></td></tr>	
	<tr><td class="title"> <strong>2.2.2.1:</strong></td></tr>
	<tr><td></td></tr>	
	<tr><td class="title"><strong>Plan Estratégico:</strong></td></tr>
    '.$this->getPlanEstrategico($proyecto['PK_PESTRATEGICO']).'
	<tr><td></td></tr>
	<tr><td class="title"><strong>Plan Operativo:</strong></td></tr> 	
	'.$this->getPlanOperativo($proyecto['PK_POPERATIVO']).' 
	<tr><td></td></tr>			   
	<tr><td  class="title"><strong>Linea Estrategica:</strong></td></tr> 
	'.$this->getLineasPlane($proyecto['PK_LESTRATEGICA']).' 
	<tr><td></td></tr>
	<tr><td  class="title"><strong>Objetivo Estratégico:</strong></td></tr> 
	'.$this->getObjetivo($proyecto['PK_OESTRATEGICA']).' 
	<tr><td></td></tr>
	<tr><td  class="title"><strong>Resultados:</strong></td></tr> 
	'.$this->getResultado($proyecto['PK_RESULTADO']).' 
	<tr><td></td></tr>
	<tr><td class="title"><strong>Manera que contribuye el proyecto a la línea y objetivo estratégicos:</strong></td></tr>
	<tr><td>'.__toHtml($proyecto['CONT_PROYECTO'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>	
	
	<tr><td><strong>2.2.3 Protocolos, normas, estatutos institucionales</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['CONT_PROYECTO'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>2.3 Objetivo General y Objetivos específicos</strong></td></tr>   <tr><td></td></tr>	
	<tr><td><strong>Objetivo General</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['OBJETIVO_GENERAL'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>Objetivos especificos</strong></td></tr>	
	'.$this->getObjetivosEspecificos($_GET['idProyecto']).' 
	<tr><td><strong>2.4 Descripción y características del proyecto</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['CARACTERISTICAS'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>2.5 Participantes en el proyecto (Socios/Aliados)</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['PARTICIPANTES'], ENT_QUOTES, "ISO-8859-1").' </td></tr></table><p></p>';
	
	
	 $html .= ' <table>	 	
	<tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>3.1 Aspectos Generales del Mercado</strong></td></tr>	
	<tr><td></td></tr>	
	<tr><td><strong>3.1.1 Proveedores</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['PROVEEDORES'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>3.1.2 Oferta</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['OFERTA'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>3.1.3 Demanda</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['DEMANDA'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>3.2 Balance Oferta-Demanda</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['BOFERTA'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>3.3 Sistema de precios</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['SPRECIOS'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>3.4 Promoción. Estrategias de promoción del proyecto</strong></td></tr>	
	<tr><td></td></tr>
	<tr><td><strong>3.4.1Canales de Distribución</strong></td></tr>
	<tr><td>'.__toHtml($proyecto['CDISTRIBUCION'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>3.4.2Promoción</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['PROMOCION'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>	
	<tr><td><strong>3.5 Descripción de las fuentes de Información y metodología utilizada</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['FINFORMACION'], ENT_QUOTES, "ISO-8859-1").' </td></tr></table>
	<p></p>';
	
	
	 $html .= ' <table>	 
	
	<tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>4. Aspectos Técnicos</strong></td></tr>
	<tr><td></td></tr>
	<tr><td><strong>4.1 Localización y área de influencia del proyecto</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['LOCALIZACION'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>Disponibilidad de Recursos</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['DRECURSOS'], ENT_QUOTES, "ISO-8859-1").' </td></tr></table>
	<p></p>';
	
	 $html .= ' <table>	 
	
	<tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>5. Aspectos Legales</strong></td></tr>
	<tr><td></td></tr>
	<tr><td><strong>5.1 Consideraciones Legales</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['CLEGALES'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>5.2 Consideraciones Jurídicas</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['CJURIDICAS'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>5.3 Consideraciones patrimoniales</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['CPATRIMONIALES'], ENT_QUOTES, "ISO-8859-1").' </td></tr></table>
	<p></p>';
	
	 $html .= ' <table>	 
	
	<tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>6. Análisis Financiero</strong></td></tr>
	<tr><td></td></tr>
	<tr><td class="titulo"><strong>6.1 Presupuesto:</strong></td></tr>		
	<tr><td></td></tr>	
	<tr><td><strong>Fuentes de Financiamiento:</strong></td></tr>
	<tr><td><strong>interna</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['DESC_INTERNA'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>	
	<tr><td><strong>Externa</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['DESC_EXTERNA'], ENT_QUOTES, "ISO-8859-1").' </td></tr>	
	<tr><td></td></tr>
	<tr><td><strong>6.2 Distribución de Inversión:</strong></td></tr>
	'.$this->getDistribucionInversion($_GET['idProyecto']).' 
	<tr><td></td></tr>
	
	
	<tr><td><strong>6.3 Evaluación Financiera</strong></td></tr>	
	<tr><td></td></tr>
	<tr><td><strong>6.3.1 Valor Presente Neto (VPN)</strong></td></tr>	
	<tr><td>$'.$proyecto['dinVPN'].'</td></tr>
	<tr><td>'.__toHtml($proyecto['VPN'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>6.3.2 Tasa Interna de Retorno (TIR)</strong></td></tr>	
	<tr><td>'.$proyecto['porcTIR'].'%</td></tr>
	<tr><td>'.__toHtml($proyecto['TIR'], ENT_QUOTES, "ISO-8859-1").'</td></tr>
	
	<tr><td></td></tr>
	
	<tr><td><strong>6.3.3 Relación Beneficio – Costo</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['RBC'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
		
	<tr><td></td></tr>
	<tr><td><strong>6.3.4 Punto de Equilibrio</strong></td></tr>	
	<tr><td>$'.$proyecto['DINPUNTOE'].' </td></tr>
	<tr><td>'.__toHtml($proyecto['PUNTOE'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>6.3.5 Retorno de Inversión (ROI):</strong></td></tr>	
	<tr><td>'.$proyecto['PORCROI'].'% </td></tr>
	<tr><td>'.__toHtml($proyecto['PUNTOE'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	</table><p></p>';
	
	
	$html .='
	
	<p bgcolor="#F8991D" style="color:#7C430B;"><strong>7. Datos del diagrama de gantt</strong></p>
	
	<table  width="100%"   style="border:1px solid #000000;" cellspacing="0" cellpadding="0">
<tbody>

<tr>
 <td style="border:1px solid #000000;" align="center"><strong>Fecha Inicial</strong></td>
 <td style="border:1px solid #000000;" align="center"><strong></strong></td>
 <td style="border:1px solid #000000;" align="center"><strong>Fecha termino</strong></td>
</tr>


 <tr>
	   <td style="border:1px solid #000000;">'.$proyecto['FECHA_I'].'</td>
	   <td style="border:1px solid #000000;"><strong>Descripción de estapas y Pasos</strong></td>	
	   <td style="border:1px solid #000000;">'.$proyecto['FECHA_T'].'</td>   
  </tr>
  '.$this->ObtnerGantt($_GET['idProyecto']).'
  
    
</tbody>

</table><p></p>
	
	
	';	
	
	
	$html .='<table>	
	
	<tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>8. Equipo Directivo y Responsable</strong></td></tr>
	
	<tr><td>'.__toHtml($proyecto['EDIRECTIVO'], ENT_QUOTES, "ISO-8859-1").' </td></tr></table>
	<p></p>';
	
	
	$html .='<table>
	
	<tr><td bgcolor="#F8991D" style="color:#7C430B;"><strong>9. Conclusiones</strong></td></tr>
	<tr><td></td></tr>
	<tr><td><strong> Conclusiones y recomendaciones del rector</strong></td></tr>	
	<tr><td>'.__toHtml($proyecto['CONCLUSIONES'], ENT_QUOTES, "ISO-8859-1").' </td></tr>
	<tr><td></td></tr>
	<tr><td><strong>  Consideraciones o comentarios de los órganos colegiados</strong></td></tr>
	<tr><td>'.__toHtml($proyecto['CONSIDERACIONES'], ENT_QUOTES, "ISO-8859-1").' </td></tr>	   ';	
	 
	$html .="</table>";	
		
		
	 return $html;
   }
		
		function getInversion_Interna($id){		
	    $html = "";
	    $sql = "SELECT * FROM FINVERSION_INTERNA WHERE PK_PROYECTO='$id'";   
		$row = database::getRow($sql);		
	
		if($row){
			
			
			 if($row['PRESUPUESTO']== 1){
				$html .= '<tr><td>Presupuesto</td></tr>';			
			}
			
			if($row['AHORRO'] == 1){
				$html .= '<tr><td>Ahorro</td></tr>';
			}//else{$html .= '<tr><td>'.__toHtml('', ENT_QUOTES, "ISO-8859-1").'</td></tr>';}	
					
			if($row['SUBEJERCICIO'] == 1){
				$html .= '<tr><td>Subejercicio</td></tr>';
			}
			
			if($row['TRASPASO']==1){
				 $html .= '<tr><td>Traspaso</td></tr>';
				  
			}
			if($row['AMPLIACION']==1){
				 $html .= '<tr><td>Ampliación</td></tr>';		
			}  
			 $html .= '<tr><td><strong>Monto:</strong></td></tr>
			            <tr><td>'.$row['MONTO'].'</td></tr>';
			
			return $html;
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}
	}
	
	function getInversion_Externa($id){		
		 $html = "";
	  $sql = "SELECT * FROM FINVERSION_EXTERNA WHERE PK_PROYECTO='$id'";   
		$row = database::getRow($sql);		
	
		if($row){
			
			 if($row['DONATIVOPRES']== 1){
				$html .= '<tr><td>Donativo presupuestado</td></tr>';			
			}
			
			if($row['DONATIVONOPRES'] == 1){
				$html .= '<tr><td>Donativo no presupuestado</td></tr>';
			}//else{$html .= '<tr><td>'.__toHtml('', ENT_QUOTES, "ISO-8859-1").'</td></tr>';}			
			
			if($row['CREDITO']==1){
				 $html .= '<tr><td>Credito</td></tr>';				  
			}
			if($row['OTROS']==1){
				 $html .= '<tr><td>Otros</td></tr>';				  
			}
			 $html .= '<tr><td><strong>Monto:</strong></td></tr>
			            <tr><td>'.$row['MONTO'].'</td></tr>';
			
			return $html;
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}
	}
	
	function getPlanEstrategico($id){
		$html = "";
		 $sql = "SELECT * FROM PL_PESTRATEGICOS WHERE PK1 ='$id'"; 
		  
		 database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');  
		$row = database::getRow($sql);		
	
		if($row){
			$html .= ' <tr><td class="title"><strong>'.__toHtml($row['TITULO'], ENT_QUOTES, "ISO-8859-1").'</strong></td></tr>';
			
			return $html ;
			
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}			
		
	}
	function getPlanOperativo($id){
		
		$html = "";
		$sql = "SELECT * FROM PL_POPERATIVOS WHERE PK1 ='$id'"; 
		
		database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac');   
		$row = database::getRow($sql);		
	
		if($row){
			$html .= ' <tr><td class="title"><strong>'.__toHtml($row['TITULO'], ENT_QUOTES, "ISO-8859-1").'</strong></td></tr>';
			return $html;			
			
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}			
		
	}
	
	function getLineasPlane($id){
		
   	$html="";
		$sql = "SELECT * FROM PL_PESTRATEGICOS_LINEASE WHERE PK1 = '$id' ";
		
	   database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac'); 	
	   $row = database::getRow($sql);	
		
		if($row){
			$html .= ' <tr><td class="title"><strong>'.__toHtml($row['LINEA'], ENT_QUOTES, "ISO-8859-1").'</strong></td></tr>';
			return $html;			
			
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}
	   
		
     }
     	
	
	  function getObjetivo($id){
	  	
		$html = "";
		
		$sql = "SELECT * FROM PL_PESTRATEGICOS_OBJETIVOSE WHERE PK1 = '$id' ";	
		
	   database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac'); 
	   $row = database::getRow($sql);	
		
		if($row){
			$html .= ' <tr><td class="title"><strong>'.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</strong></td></tr>';
			return $html;			
			
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}
	   
    }
	
	
	  function getResultado($id){
	  	
		$html = "";
		
		$sql = "SELECT * FROM PL_POPERATIVOS_OBJETIVOST WHERE PK1 = '$id' ";
		
		database::newConnection('UANAHUACSQL01','webapp1','abc123','redanahuac'); 	
	   $row = database::getRow($sql);	
		
		if($row){
			$html .= ' <tr><td class="title"><strong>'.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</strong></td></tr>';
			return $html;			
			
		}else{
			 $html .= '<tr><td></td></tr>';
			 return $html;
		}
	   
    }
	
	 function getObjetivosEspecificos($id){ 
		 	
		$html="";
		
		$this->objetivosEspecificos = array();
    
		$sql = "SELECT * FROM OBJETIVOS_ESPECIFICOS WHERE PK_PROYECTO = '$id' ORDER BY ORDEN";
			
		database::newConnection('UANAHUACSQL01','webapp2','P@$$w0rd','proyectos'); 
	    //$result = database::executeQuery($sql);
		
		$i=1;
	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
			$html .= '	<tr><td>'.$i.'.  '.__toHtml($row["OBJETIVO"], ENT_QUOTES, "ISO-8859-1").'</td></tr>';
			$i++;
		
        }
		return $html;
    }
	
	
	function getDistribucionInversion($id){ 
		$html="";	
		$sql = "SELECT * FROM DISTRIBUCION_INVERSION WHERE PK_PROYECTO = '$id' ORDER BY ORDEN";	
		
	    //$result = database::executeQuery($sql);
		$i=1;
	    //while ($row = mssql_fetch_array($result, MSSQL_ASSOC)) {
		foreach(database::getRows($sql) as $row){
		
			$html .= '	<tr><td>'.$i.'.  '.__toHtml($row["CONCEPTO"], ENT_QUOTES, "ISO-8859-1").'</td></tr>';
			$i++;
		
        }
		
		return $html;
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
		
		function ObtnerGantt($idProyecto){
		  	
		
			$this->getEtapas($idProyecto);
			
			$numrecursos = sizeof($this->etapas);
			
		    
	 $content =""; 	    
	$countetapas=1;	    
			    
		    if($numrecursos != 0){
			
		    foreach($this->etapas as $row){
		    	$countpasos=1;
		      $content .='	
<tr>
   <td style="border:1px solid #000000;" colspan="3" align="center"><strong>Etapa '.$countetapas.': '.__toHtml($row['ETAPA'], ENT_QUOTES, "ISO-8859-1").'</strong></td>  
 </tr>';			     			      				
		         
			           $this->getPasos($row['PK1']);
			           $numrecursos2 = sizeof($this->pasos);
			         if($numrecursos2 != 0){
					   foreach($this->pasos as $rowpaso){
					   	
						$fechasi = explode("-", $rowpaso['F_INICIO']);     
			
			            $fechast = explode("-", $rowpaso['F_TERMINO']);
			           						
$content .='
			            
<tr>
  <td style="border:1px solid #000000;" >'.$rowpaso['F_INICIO'].'</td>
  <td style="border:1px solid #000000;" >PASO '.$countpasos.': '.__toHtml($rowpaso['PASO'], ENT_QUOTES, "ISO-8859-1").'</td>
  <td style="border:1px solid #000000;">'.$rowpaso['F_TERMINO'].'</td>
</tr>		             
			            
			            
	  ';
			            
			         $countpasos++;   
			          
					   }
					   
					 } else{
					   	
					   	
					   	$content .='
			            
<tr>
  <td style="border:1px solid #000000;" ></td>
  <td style="border:1px solid #000000;" >PASO '.$countpasos.': </td>
  <td style="border:1px solid #000000;"></td>
</tr>		             
			             
			            
	  ';
					   	
					 $countpasos++;    	
					   }
			
			      $countetapas++;
			      // $content .='>'.__toHtml($row['ETAPA'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}	
			      
			}else{
				
				 $content .='	
<tr>
   <td style="border:1px solid #000000;" colspan="3" align="center"><strong>Etapa '.$countetapas.': </strong></td>  
 </tr>';	
			}  
		  
		  return $content;
			
		  }  
  
	 
	
	
	
	
	
	
}
?>