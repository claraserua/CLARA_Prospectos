<?php
include "models/proyectos/revisadoproyecto.model.php";
include "libs/resizeimage/class.upload.php";


class revisadoproyecto {

    var $View;
	var $Model;
	var $menu;
	private $image;
	private $adjunto;
	private $targetPathumbail;
	private $tipo;
	private $num;
	private $nomRImage;
	var $nodoprincipal;
	var $script;
	var $script2;
	

	function __construct() {
		
		
     $this->passport = new Authentication();
	 $this->menu = new Menu();
	//  $this->nodoprincipal = new Niveles("option");	 
	 $this->Model = new revisadoProyectoModel();
     
		
	 switch($_GET['method']){
	 	
		case "GuardarProyecto":
			$this->GuardarProyecto();
			break;
			
		case "BuscarPlanesEstrategicos":
			$this->BuscarPlanesEstrategicos();
			break;
			
		case "obtenerLineas":
			$this->obtenerLineas();
			break;	
			
		case "BuscarPlanesOperativos":
			$this->BuscarPlanesOperativos();
			break;
			
		case "obtenerResultados":
			$this->obtenerResultados();
			break;
			
			
		case "obtenerObjetivosE_Res":
			$this->obtenerObjetivosE_Res();
			break;
			
		 case "UploadFile": 
		  //  $this->View = new View();
	        $this->UploadFile();
			break;	
			
		case "obtenerArchivo":
		   $this->View = new View();
	        $this->obtenerArchivo();
			break;			
			
		case "EliminarArchivo":		
	        $this->EliminarArchivo();
			break;	
			
		case "insertarComentario": 		   
	        $this->insertarComentario();
			break;	
		
		 case "eliminarComentario":
	        $this->eliminarComentario();
			break;						
			
		case "insertarComentarioGral": 		   
	        $this->insertarComentarioGral();
			break;
			
		 case "eliminarComentarioGral":
	        $this->eliminarComentarioGralProyecto();
			break;		
					
		case "EnviarAjustesUniversidad":
	        $this->EnviarAjustesUniversidad();
			break;
			
					
		case "IntegrarPropuesta":
	        $this->IntegrarPropuesta();
			break;	
													
		default:	
	      $this->View = new View(); 
          $this->loadPage();
		  break;
		}
				 
		 
	}
	

	
	 function loadPage(){
	
		$this->View->template = TEMPLATE.'modules/proyecto/FRMPRINCIPAL.TPL';	
		$this->View->loadTemplate();
	    $this->loadHeader();
		$this->loadMenu();
		
		
	
	
		//if($this->passport->privilegios->hasPrivilege('P20')){
		$this->loadContent();
		/*}else{
		$this->error();
		}*/
		$this->loadFooter();
		$this->View->viewPage();
		
	 }
	 
	 
	   function loadHeader(){

	  $section = TEMPLATE.'sections/header.tpl';
	  $section = $this->View->loadSection($section);
	 $nombre = $_SESSION['session']['titulo'].' '.__toHtml($_SESSION['session']['nombre']).' '.__toHtml($_SESSION['session']['apellidos']);
	  $imagen = 'thum_40x40_'.$_SESSION['session']['imagen'];
	  $section = $this->View->replace('/\#AVATAR\#/ms' ,$imagen,$section);
	  $section = $this->View->replace('/\#USUARIO\#/ms' ,$nombre,$section);
	  $this->View->replace_content('/\#HEADER\#/ms' ,$section);
	  
	 }
	 
	 
	 function loadFooter(){
	 	
      $section = TEMPLATE.'sections/footer.tpl';
	  $section = $this->View->loadSection($section);
	  $this->View->replace_content('/\#FOOTER\#/ms' ,$section);
		
	 }
	 
	 
	
	 function loadMenu(){
	
	 $menu =  $this->menu->menu; 
	 $this->View->replace_content('/\#MENU\#/ms' ,$menu);
	 
	 
	 }
	 
	

	function error(){
		
		$contenido = $this->View->Template(TEMPLATE.'modules/error.tpl');
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
	}


  
	 function loadContent(){
	 	$row=NULL;
		$rowInvI=NULL;
		$rowInvE=NULL;
	 	if(isset($_GET['IDProyecto'])){
		
			$row = $this->Model->getProyecto($_GET['IDProyecto']);
			$finicio = $row['FECHA_I'];
			$ftermino = $row['FECHA_T'];
			//if(strlen(trim($row['PK_FINVERSION_INTERNA']))!=0){
		    $rowInvI = $this->Model->getInversion_Interna($_GET['IDProyecto']);
		    // }
			 //if(strlen(trim($row['PK_FINVERSION_EXTERNA']))!=0){
		    $rowInvE = $this->Model->getInversion_Externa($_GET['IDProyecto']);		 
			 
		}
			
		$contenido = $this->View->Template(TEMPLATE.'modules/proyecto/REVISADOPROYECTO.TPL');
		
		if($row){
			$idProyecto = $row['PK1'];
			//$contenido =  $this->View->replace('/\#ESTADO\#/ms' ,'E',$contenido);
			//$contenido =  $this->View->replace('/\#EDITARCHIVO\#/ms' ,TRUE,$contenido);
			//$estado = $this->Model->getEstadoProyecto($_GET['IDProyecto']);				
			$estado = '<span class="label label-warning">Revisado</span> <span class="label label-info">expertos</span>';
		}	
		
		
		
		
		$btnSalir ='<a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large"><i class="icon-thumbs-down"></i> Salir</a>';
		
		$contenido =  $this->View->replace('/\<!--#BTNSALIR#-->/ms' ,$btnSalir,$contenido);
		
		
		/*if($this->passport->getPrivilegio($idProyecto,'P245')){
		
	    $btneditar ='<a href="?execute=proyectos/editproyecto&method=default&Menu=F1&SubMenu=SF11&IDProyecto='.$row['PK1'].'&IDJerarquia='.$row['PK_JERARQUIA'].'&nodo='.$row['PK_JERARQUIA'].'" class="btn btn-large"><i class="icon-pencil"></i> Editar</a>';
		
		$contenido =  $this->View->replace('/\<!--#BTNEDITAR#-->/ms' ,$btneditar,$contenido);	
		}	*/			
					
		
		
		if($this->passport->getPrivilegio($idProyecto,'P308')){
		
	    $btnEnviar ='<button class="btn btn-large btn-primary" onclick="EnviarAjustesUniversidad(false);"><span class="icon icon-white icon-sent"></span> Ajustes Universidad</button>';
		
		$contenido =  $this->View->replace('/\<!--#BTNREGRESARIARPROP#-->/ms' ,$btnEnviar,$contenido);	
		}
		
		if($this->passport->getPrivilegio($idProyecto,'P310')){
		
	    $btnEnviar ='<button class="btn btn-large btn-primary" onclick="IntegrarPropuesta(false);"><span class="icon icon-white icon-sent"></span> Integrar Propuesta</button>';
		
		$contenido =  $this->View->replace('/\<!--#BTNENVIARPROP#-->/ms' ,$btnEnviar,$contenido);	
		}
		
		
		//if($this->passport->getPrivilegio($idProyecto,'P291')){
			
	    $btnAdjuntar ='<div class="box">
					                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p> Documentos que apoyan el Análisis de Mercado
				
									 </p>
									 
									 
					                  </div>
				                   </div>';
		
		$contenido =  $this->View->replace('/\<!--#BTNADJUNTARANALISIS#-->/ms' ,$btnAdjuntar,$contenido);	
		
	//	}
		
		//if($this->passport->getPrivilegio($idProyecto,'P292')){
			
	    $btnAdjuntar ='<div class="box">		
				                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p>6.4 Flujo de efectivo</p>	 
									 
					                 </div>
				                  </div>';
		
		$contenido =  $this->View->replace('/\<!--#BTNADJUNTARAM#-->/ms' ,$btnAdjuntar,$contenido);	
		
		//}
		
	//	if($this->passport->getPrivilegio($idProyecto,'P293')){
			
	    $btnAdjuntar ='<div class="box">
					                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p> Documentos apoyan la evaluación del proyecto
								
									 </p>
									 
									 
					                 </div>
				                  </div>';
		
		$contenido =  $this->View->replace('/\<!--#BTNADJUNTARANEXOS#-->/ms' ,$btnAdjuntar,$contenido);	
		
		//}
		
		
		
	//	if($this->passport->getPrivilegio($idProyecto,'P246')){
	    $btnguardar ='<li class=""><a href="#tab1" id="che">Resumen</a></li>';
		$contenido =  $this->View->replace('/\<!--#TABRESUMEN#-->/ms' ,$btnguardar,$contenido);	
		
		//    if($this->passport->getPrivilegio($idProyecto,'P257')){
		     	 $permisocomentar='P258';
		      	 $permisoborrar='P259';	
	          	 $contenido =  $this->View->replace('/\<!--#COMENTARIOSTABRESUMEN#-->/ms' ,$this->getComentariosProyecto($idProyecto,1,$permisocomentar,$permisoborrar),$contenido);
		
		//     } 
	//	}
	//	if($this->passport->getPrivilegio($idProyecto,'P247')){
	   		$btnguardar ='<li class=""><a href="#tab2">Identificación</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABIPROYECTO#-->/ms' ,$btnguardar,$contenido);
			
	//	    if($this->passport->getPrivilegio($idProyecto,'P260')){
				$permisocomentar='P261';
				$permisoborrar='P262';
	  			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABIDENT#-->/ms' ,$this->getComentariosProyecto($idProyecto,2,$permisocomentar,$permisoborrar),$contenido);		
		//     } 		  			
	//	}
	//	if($this->passport->getPrivilegio($idProyecto,'P248')){
	   		$btnguardar ='<li class=""><a href="#tab3">Análisis de Mercado</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABAMERCADO#-->/ms' ,$btnguardar,$contenido);
		
	//		if($this->passport->getPrivilegio($idProyecto,'P263')){
				$permisocomentar='P264';
				$permisoborrar='P265';
	  			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABANALISISM#-->/ms' ,$this->getComentariosProyecto($idProyecto,3,$permisocomentar,$permisoborrar),$contenido);	   
	//	      }		
	//	} 
		
	//	if($this->passport->getPrivilegio($idProyecto,'P249')){
	    	$btnguardar ='<li class=""><a href="#tab4">Aspectos Técnicos</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABASPECTOST#-->/ms' ,$btnguardar,$contenido);	
		
	//	     if($this->passport->getPrivilegio($idProyecto,'P266')){
				$permisocomentar='P267';
				$permisoborrar='P268';
	  			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABASPECTOST#-->/ms' ,$this->getComentariosProyecto($idProyecto,4,$permisocomentar,$permisoborrar),$contenido);		
		//       }
	//	} 		
		
	//	if($this->passport->getPrivilegio($idProyecto,'P250')){
	    	$btnguardar ='<li class=""><a href="#tab5">Aspectos Legales</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABASPECTOSL#-->/ms' ,$btnguardar,$contenido);	
		
		//	if($this->passport->getPrivilegio($idProyecto,'P269')){
				$permisocomentar='P270';
				$permisoborrar='P271';
	  			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABASPECTOSL#-->/ms' ,$this->getComentariosProyecto($idProyecto,5,$permisocomentar,$permisoborrar),$contenido);		
		//	  }		
		
	//	} 		
	//	if($this->passport->getPrivilegio($idProyecto,'P251')){
	   		 $btnguardar ='<li class=""><a href="#tab6" id="ver">Análisis Financiero</a></li>';
			 $contenido =  $this->View->replace('/\<!--#TABANALISISF#-->/ms' ,$btnguardar,$contenido);
		 	
	//		if($this->passport->getPrivilegio($idProyecto,'P272')){
				$permisocomentar='P273';
				$permisoborrar='P274';	
	   			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABANALISISF#-->/ms' ,$this->getComentariosProyecto($idProyecto,6,$permisocomentar,$permisoborrar),$contenido);		
	//		   }
		  	
	//	} 
	//	if($this->passport->getPrivilegio($idProyecto,'P252')){
	   		 $btnguardar ='<li class=""><a href="#tab7">Programa</a></li>';
			 $contenido =  $this->View->replace('/\<!--#TABPROGRAMAE#-->/ms' ,$btnguardar,$contenido);
			 
		//	 if($this->passport->getPrivilegio($idProyecto,'P275')){
				$permisocomentar='P276';
				$permisoborrar='P277';	
	  			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABPROGRAMA#-->/ms' ,$this->getComentariosProyecto($idProyecto,7,$permisocomentar,$permisoborrar),$contenido);	
		//		}			
	//	  } 
	//	if($this->passport->getPrivilegio($idProyecto,'P253')){
	   		 $btnguardar ='<li class=""><a href="#tab8">E Directivo</a></li>';
			 $contenido =  $this->View->replace('/\<!--#TABEQUIPODR#-->/ms' ,$btnguardar,$contenido);
				
	//		if($this->passport->getPrivilegio($idProyecto,'P278')){
				$permisocomentar='P279';
				$permisoborrar='P280';	
	  			$contenido =  $this->View->replace('/\<!--#COMENTARIOSTABEQUIPODR#-->/ms' ,$this->getComentariosProyecto($idProyecto,8,$permisocomentar,$permisoborrar),$contenido);		
		//	   }	
	//	} 
	//	if($this->passport->getPrivilegio($idProyecto,'P254')){
	    	$btnguardar ='<li class=""><a href="#tab9">Conclusiones</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABCONCLUSIONES#-->/ms' ,$btnguardar,$contenido);
		
		//	if($this->passport->getPrivilegio($idProyecto,'P281')){
				$permisocomentar='P282';
				$permisoborrar='P283';	
	  		    $contenido =  $this->View->replace('/\<!--#COMENTARIOSTABCONCLUSIONES#-->/ms' ,$this->getComentariosProyecto($idProyecto,9,$permisocomentar,$permisoborrar),$contenido);		
		//	  }		
	//	} 
		
	//	if($this->passport->getPrivilegio($idProyecto,'P255')){
	    	$btnguardar ='<li class=""><a href="#tab10">Anexos</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABANEXOS#-->/ms' ,$btnguardar,$contenido);
		
		//	if($this->passport->getPrivilegio($idProyecto,'P284')){
				$permisocomentar='P285';
				$permisoborrar='P286';		
	   		    $contenido =  $this->View->replace('/\<!--#COMENTARIOSTABANEXOS#-->/ms' ,$this->getComentariosProyecto($idProyecto,10,$permisocomentar,$permisoborrar),$contenido);		
		//	  }		
	//	} 
	//	if($this->passport->getPrivilegio($idProyecto,'P256')){			
	   		$btnguardar =' <li class=""><a href="#tab11">Comentarios</a></li>';
			$contenido =  $this->View->replace('/\<!--#TABCOMENTARIOSGENERALES#-->/ms' ,$btnguardar,$contenido);
			
	        $permisocomentar='P287';
			$permisoborrar='P288';	
	       	$contenido =  $this->View->replace('/\#NR\#/ms' ,$this->Model->getNumComentariosGralesProyecto($idProyecto),$contenido);
		
				$contenido =  $this->View->replace('/\<!--#COMENTARIOSGENERALEStTABCOMGRALES#-->/ms' ,$this->getComentariosGralesProyecto($idProyecto,$permisocomentar,$permisoborrar),$contenido);	
		       
	//	} 	
		
				
		$contenido =  $this->View->replace('/\#LABELESTADO\#/ms' ,$estado,$contenido);	
		$contenido =  $this->View->replace('/\#EDITARCHIVO\#/ms' ,TRUE,$contenido);
		$contenido =  $this->View->replace('/\#IDPROYECTO\#/ms' ,$idProyecto,$contenido);	
		
		$contenido =  $this->View->replace('/\#TITULOPROYECTO\#/ms' ,__toHtml($row['PROYECTO'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#FOLIO\#/ms' ,$row['FOLIO'],$contenido);
		$contenido =  $this->View->replace('/\#DESCRIPCION\#/ms' ,__toHtml($row['DESCRIPCION'], ENT_QUOTES, "ISO-8859-1"),$contenido);		
		
		 if($row['CONT_PE']==0){
		$contenido =  $this->View->replace('/\#CONTRIBUYE\#/ms' ,'Sí',$contenido);
		}else{
		$contenido =  $this->View->replace('/\#CONTRIBUYE\#/ms' ,'No',$contenido);
		}
		
		if($row['CONT_PO']==0){
		$contenido =  $this->View->replace('/\#ESTAENPO\#/ms' ,'Sí',$contenido);
		}else{
		$contenido =  $this->View->replace('/\#ESTAENPO\#/ms' ,'No',$contenido);	}
		
		if($row['INC_PRESUPUESTO']=='S'){
		$contenido =  $this->View->replace('/\#INC_PRESUPUESTO\#/ms' ,'Sí',$contenido);		
		}
		if($row['INC_PRESUPUESTO']=='P'){
		$contenido =  $this->View->replace('/\#INC_PRESUPUESTO\#/ms' ,'No',$contenido);		
		}
		else{
		$contenido =  $this->View->replace('/\#INC_PRESUPUESTO\#/ms' ,'Una parte',$contenido);	
		}
		
		$contenido =  $this->View->replace('/\#TOTALINV\#/ms' ,$row['INVERSION'],$contenido);
		
	if(strlen(trim($row['PK_FINVERSION_INTERNA']))==0){
			
		$contenido =  $this->View->replace('/\#FINVERSION_INTERNA\#/ms' ,'No',$contenido);
		$contenido =  $this->View->replace('/\#STYLEFTES\#/ms' ,'style="display: none"',$contenido);
		 $contenido =  $this->View->replace('/\#STYLEFTESMONTO\#/ms' ,'style="display: none"',$contenido);
		  $contenido =  $this->View->replace('/\#MONTOINVI\#/ms' ,"",$contenido);
		  
		   $contenido =  $this->View->replace('/\#PRESUPUESTO\#/ms' ,'style="display: none"',$contenido);
		   $contenido =  $this->View->replace('/\#AHORRO\#/ms' ,'style="display: none"',$contenido);
		   $contenido =  $this->View->replace('/\#SUBEJERCICIO\#/ms' ,'style="display: none"',$contenido);
		   $contenido =  $this->View->replace('/\#TRASPASO\#/ms' ,'style="display: none"',$contenido);
		   $contenido =  $this->View->replace('/\#AMPLIACION\#/ms' ,'style="display: none"',$contenido);
		   
		   
	}else{
			$contenido =  $this->View->replace('/\#FINVERSION_INTERNA\#/ms' ,'Sí',$contenido);
			 $contenido =  $this->View->replace('/\#STYLEFTESMONTO\#/ms' ,'style="display: block"',$contenido);		   
			$contenido =  $this->View->replace('/\#STYLEFTES\#/ms' ,'style="display: block"',$contenido);
		   
			$contenido =  $this->View->replace('/\#MONTOINVI\#/ms' ,$rowInvI['MONTO'],$contenido);
		   if($rowInvI['PRESUPUESTO']== 1){
				 $contenido =  $this->View->replace('/\#PRESUPUESTO\#/ms' ,'style="display: block"',$contenido);
				 $contenido =  $this->View->replace('/\#LABELPRESUPUESTO\#/ms' ,'Presupuesto',$contenido);	
			}
			else{
				$contenido =  $this->View->replace('/\#LABELPRESUPUESTO\#/ms' ,'',$contenido);
				 $contenido =  $this->View->replace('/\#PRESUPUESTO\#/ms' ,'style="display: none"',$contenido);
			}
			
			if($rowInvI['AHORRO'] == 1){
				 $contenido =  $this->View->replace('/\#AHORRO\#/ms' ,'style="display: block"',$contenido);	
				  $contenido =  $this->View->replace('/\#LABELAHORRO\#/ms' ,'Ahorro',$contenido);
			}
			else{
				$contenido =  $this->View->replace('/\#LABELAHORRO\#/ms' ,'',$contenido);
				 $contenido =  $this->View->replace('/\#AHORRO\#/ms' ,'style="display: none"',$contenido);
				
			}
			
			if($rowInvI['SUBEJERCICIO'] == 1){
				 $contenido =  $this->View->replace('/\#SUBEJERCICIO\#/ms' ,'style="display: block"',$contenido);	
				  $contenido =  $this->View->replace('/\#LABELSUBEJERCICIO\#/ms' ,'Subejercicio',$contenido);
			}
			else{
				$contenido =  $this->View->replace('/\#LABELSUBEJERCICIO\#/ms' ,'',$contenido);
				 $contenido =  $this->View->replace('/\#SUBEJERCICIO\#/ms' ,'style="display: none"',$contenido);		
			}
			
			if($rowInvI['TRASPASO']==1){
				 $contenido =  $this->View->replace('/\#TRASPASO\#/ms' ,'style="display: block"',$contenido);
				  $contenido =  $this->View->replace('/\#LABELTRASPASO\#/ms' ,'Traspaso',$contenido);	
				  
			}else{
				 $contenido =  $this->View->replace('/\#LABELTRASPASO\#/ms' ,'',$contenido);
				  $contenido =  $this->View->replace('/\#TRASPASO\#/ms' ,'style="display: none"',$contenido);	
			}
			if($rowInvI['AMPLIACION']==1){
				 $contenido =  $this->View->replace('/\#AMPLIACION\#/ms' ,'style="display: block"',$contenido);
				  $contenido =  $this->View->replace('/\#LABELAMPLIACION\#/ms' ,'Ampliación',$contenido);	
			}else{
				  $contenido =  $this->View->replace('/\#LABELAMPLIACION\#/ms' ,'',$contenido);
				  $contenido =  $this->View->replace('/\#AMPLIACION\#/ms' ,'style="display: none	"',$contenido);
			}	    
		
		
		}		
			
		if(strlen(trim($row['PK_FINVERSION_EXTERNA']))==0){
		$contenido =  $this->View->replace('/\#FINVERSION_EXTERNA\#/ms' ,'No',$contenido);
		$contenido =  $this->View->replace('/\#STYLEFTESE\#/ms' ,'style="display: none"',$contenido);
		 $contenido =  $this->View->replace('/\#STYLEFTESMONTOE\#/ms' ,'style="display: none"',$contenido);
		  $contenido =  $this->View->replace('/\#MONTOINVE\#/ms' ,"",$contenido);
		  
		  $contenido =  $this->View->replace('/\#DONATIVOPRES\#/ms' ,'style="display: none"',$contenido);
		   $contenido =  $this->View->replace('/\#DONATIVONOPRES\#/ms' ,'style="display: none"',$contenido);
		   $contenido =  $this->View->replace('/\#CREDITO\#/ms' ,'style="display: none"',$contenido);
		    $contenido =  $this->View->replace('/\#OTROS\#/ms' ,'style="display: none"',$contenido);	
		
		}else{
			$contenido =  $this->View->replace('/\#FINVERSION_EXTERNA\#/ms' ,'Sí',$contenido);
			 $contenido =  $this->View->replace('/\#STYLEFTESMONTO\#/ms' ,'style="display: block"',$contenido);
			$contenido =  $this->View->replace('/\#STYLEFTESE\#/ms' ,'style="display: block"',$contenido);
		  
			 $contenido =  $this->View->replace('/\#MONTOINVIE\#/ms' ,$rowInvE['MONTO'],$contenido);
		   if($rowInvE['DONATIVOPRES']== 1){
		   	     $contenido =  $this->View->replace('/\#DONATIVOPRES\#/ms' ,'style="display: block"',$contenido);
				 $contenido =  $this->View->replace('/\#LABELDONATIVOPRES\#/ms' ,'Donativo presupuestado',$contenido);	
			}else{
				  $contenido =  $this->View->replace('/\#DONATIVOPRES\#/ms' ,'style="display: none"',$contenido);
				  $contenido =  $this->View->replace('/\#LABELDONATIVOPRES\#/ms' ,'',$contenido);
			}
			
			if($rowInvE['DONATIVONOPRES'] == 1){
				 $contenido =  $this->View->replace('/\#DONATIVONOPRES\#/ms' ,'style="display: block"',$contenido);
				 $contenido =  $this->View->replace('/\#LABELDONATIVONOPRES\#/ms' ,'Donativo no presupuestado',$contenido);;	
			}else{
				$contenido =  $this->View->replace('/\#DONATIVONOPRES\#/ms' ,'style="display: none"',$contenido);
				  $contenido =  $this->View->replace('/\#LABELDONATIVONOPRES\#/ms' ,'',$contenido);
			}
			if($rowInvE['CREDITO']==1){
				 $contenido =  $this->View->replace('/\#CREDITO\#/ms' ,'style="display: block"',$contenido);
				 $contenido =  $this->View->replace('/\#LABELCREDITO\#/ms' ,'Credito',$contenido);	
			}else{
				  $contenido =  $this->View->replace('/\#CREDITO\#/ms' ,'style="display: none"',$contenido);
				  $contenido =  $this->View->replace('/\#LABELCREDITO\#/ms' ,'',$contenido);
			}
			if($rowInvE['OTROS']==1){
				 $contenido =  $this->View->replace('/\#OTROS\#/ms' ,'style="display: block"',$contenido);
				 $contenido =  $this->View->replace('/\#LABELOTROS\#/ms' ,'Otros',$contenido);	
			}else{
				 $contenido =  $this->View->replace('/\#OTROS\#/ms' ,'style="display: none"',$contenido);
				  $contenido =  $this->View->replace('/\#LABELOTROS\#/ms' ,'',$contenido);
			}		
		
		}				
		
		$contenido =  $this->View->replace('/\#MONTOINVE\#/ms' ,$rowInvE['MONTO'],$contenido);		
	    $contenido =  $this->View->replace('/\#TIEMPO_EJECUCION\#/ms' ,__toHtml($row['TIEMPO_EJECUCION'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#JERARQUIAPROY\#/ms' ,__toHtml($row['PK_JERARQUIA'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		
		$contenido =  $this->View->replace('/\#ANTECEDENTES\#/ms' ,__toHtml($row['ANTECEDENTES'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#IMI\#/ms' ,__toHtml($row['IMI'], ENT_QUOTES, "ISO-8859-1"),$contenido);	
		
	    if(strlen(trim($row['PK_PESTRATEGICO']))==0){
		$contenido =  $this->View->replace('/\#NORDOPLANE\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#STYLEDISPLAYPE\#/ms' ,'style="display: none"',$contenido);
		$contenido =  $this->View->replace('/\#HIDDENPE\#/ms' ,"",$contenido);	
		$contenido =  $this->View->replace('/\#DISLINEAE\#/ms' ,'disabled="disabled"',$contenido);	
		$contenido =  $this->View->replace('/\#LINEAE\#/ms' ,"",$contenido);
		 $contenido =  $this->View->replace('/\#OBJE\#/ms','',$contenido);	
		$contenido =  $this->View->replace('/\#DISOBJE\#/ms' ,'disabled="disabled"',$contenido);		
		$contenido =  $this->View->replace('/\#PLANE\#/ms' ,'',$contenido);		
		}else{
			
		$contenido =  $this->View->replace('/\#RDOPLANE\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#STYLEDISPLAYPE\#/ms' ,'style="display: block"',$contenido);	
		$rowPE = $this->Model->getPlanE($row['PK_PESTRATEGICO']);	
		$contenido =  $this->View->replace('/\#HIDDENPE\#/ms' ,$rowPE['PK1'],$contenido);
		$contenido =  $this->View->replace('/\#PLANE\#/ms' ,__toHtml($rowPE['TITULO'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		   if(strlen(trim($row['PK_LESTRATEGICA']))==0){
		    $contenido =  $this->View->replace('/\#DISLINEAE\#/ms' ,'disabled="disabled"',$contenido);
			$contenido =  $this->View->replace('/\#DISOBJE\#/ms' ,'disabled="disabled"',$contenido);
			 $contenido =  $this->View->replace('/\#LINEAE\#/ms','',$contenido);
			 $contenido =  $this->View->replace('/\#OBJE\#/ms','',$contenido);	
			 
		    }else{   
				    $cadenaLe = $this->Model->getLineaPlane($row['PK_LESTRATEGICA'],$row['PK_PESTRATEGICO']);
				    $contenido =  $this->View->replace('/\#LINEAE\#/ms',__toHtml($cadenaLe, ENT_QUOTES, "ISO-8859-1"),$contenido);	
									
				    if(strlen(trim($cadenaLe))==0){
		              $contenido =  $this->View->replace('/\#DISLINEAE\#/ms' ,'disabled="disabled"',$contenido);
					}
				    if(strlen(trim($row['PK_OESTRATEGICA']))==0){ 
				      $contenido =  $this->View->replace('/\#DISOBJE\#/ms' ,'disabled="disabled"',$contenido);
				 
				    }else{
				 	      $cadenaOE =$this->Model->getObjetivoE($row['PK_OESTRATEGICA'],$row['PK_LESTRATEGICA']);
					      if(strlen(trim($cadenaOE))==0){
		                  $contenido =  $this->View->replace('/\#DISOBJE\#/ms' ,'disabled="disabled"',$contenido);
					      } 
					      $contenido =  $this->View->replace('/\#OBJE\#/ms',__toHtml($cadenaOE, ENT_QUOTES, "ISO-8859-1"),$contenido);					
				      }				 
		          }   	
		}
		
		 if(strlen(trim($row['PK_POPERATIVO']))==0){
		  $contenido =  $this->View->replace('/\#NORDOPLANO\#/ms' ,'checked="checked"',$contenido);
		  $contenido =  $this->View->replace('/\#STYLEDISPLAYPO\#/ms' ,'style="display: none"',$contenido);
		  $contenido =  $this->View->replace('/\#HIDDENPO\#/ms' ,"",$contenido);
		  $contenido =  $this->View->replace('/\#DISRESULTADO\#/ms' ,'disabled="disabled"',$contenido);
		  $contenido =  $this->View->replace('/\#RESULTADO\#/ms' ,"",$contenido);	
		   $contenido =  $this->View->replace('/\#PLANO\#/ms' ,'',$contenido);	
		 }else{
		  $contenido =  $this->View->replace('/\#RDOPLANO\#/ms' ,'checked="checked"',$contenido);
		  $contenido =  $this->View->replace('/\#STYLEDISPLAYPO\#/ms' ,'style="display: block"',$contenido);	
		  $rowPO = $this->Model->getPlanO($row['PK_POPERATIVO']);	
		  $contenido =  $this->View->replace('/\#HIDDENPO\#/ms' ,$rowPO['PK1'],$contenido);
		  $contenido =  $this->View->replace('/\#PLANO\#/ms' ,__toHtml($rowPO['TITULO'], ENT_QUOTES, "ISO-8859-1"),$contenido);		  
		      if(strlen(trim($row['PK_RESULTADO']))==0){
		      $contenido =  $this->View->replace('/\#DISRESULTADO\#/ms' ,'disabled="disabled"',$contenido);
			  $contenido =  $this->View->replace('/\#RESULTADO\#/ms' ,"",$contenido);
		       }else{
				      $cadenaRes = $this->Model->getResultado($row['PK_RESULTADO'],$row['PK_POPERATIVO']);
				      $contenido =  $this->View->replace('/\#RESULTADO\#/ms',__toHtml($cadenaRes, ENT_QUOTES, "ISO-8859-1"),$contenido);
				      if(strlen(trim($cadenaRes))==0){
		               $contenido =  $this->View->replace('/\#DISRESULTADO\#/ms' ,'disabled="disabled"',$contenido);		                   }
		            }
		   }  			
					
		$contenido =  $this->View->replace('/\#CONT_PROYECTO\#/ms' ,__toHtml($row['CONT_PROYECTO'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		/*if($row['CONS_PRESUPUESTO']=='N'){
		$contenido =  $this->View->replace('/\#NOCONS_PRESUPUESTO\#/ms' ,'checked="checked"',$contenido);
		}if($row['CONS_PRESUPUESTO']=='S'){
		$contenido =  $this->View->replace('/\#SICONS_PRESUPUESTO\#/ms' ,'checked="checked"',$contenido);
		}
		if($row['CONS_PRESUPUESTO']=='P'){
			$contenido =  $this->View->replace('/\#PCONS_PRESUPUESTO\#/ms' ,'checked="checked"',$contenido);
		}
		
		$contenido =  $this->View->replace('/\#MONTO_PRESUPUESTADO\#/ms' ,$row['MONTO_PRESUPUESTADO'],$contenido);
		$contenido =  $this->View->replace('/\#PARTIDA\#/ms' ,$row['PARTIDA'],$contenido);
		$contenido =  $this->View->replace('/\#IMPLICACIONES\#/ms' ,$row['IMPLICACIONES'],$contenido);*/
		$contenido =  $this->View->replace('/\#PROTOCOLOS\#/ms' ,__toHtml($row['PROTOCOLOS'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#OBJETIVO_GENERAL\#/ms' ,__toHtml($row['OBJETIVO_GENERAL'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		//objetivos especificos 
		$contenido =  $this->View->replace('/\#OBJETIVOSESPECIFICOS\#/ms' ,$this->getObjetivosEspecificos(),$contenido);
								
		$contenido =  $this->View->replace('/\#CARACTERISTICAS\#/ms' ,__toHtml($row['CARACTERISTICAS'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#PARTICIPANTES\#/ms' ,__toHtml($row['PARTICIPANTES'], ENT_QUOTES, "ISO-8859-1"),$contenido);		
		$contenido =  $this->View->replace('/\#PROVEEDORES\#/ms' ,__toHtml($row['PROVEEDORES'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#OFERTA\#/ms' ,__toHtml($row['OFERTA'], ENT_QUOTES, "ISO-8859-1"),$contenido);///aqui
		$contenido =  $this->View->replace('/\#DEMANDA\#/ms' ,__toHtml($row['DEMANDA'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#BOFERTA\#/ms' ,__toHtml($row['BOFERTA'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#SPRECIOS\#/ms' ,__toHtml($row['SPRECIOS'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#CDISTRIBUCION\#/ms' ,__toHtml($row['CDISTRIBUCION'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#PROMOCION\#/ms' ,__toHtml($row['PROMOCION'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#FINFORMACION\#/ms' ,__toHtml($row['FINFORMACION'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#LOCALIZACION\#/ms' ,__toHtml($row['LOCALIZACION'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#DRECURSOS\#/ms' ,__toHtml($row['DRECURSOS'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#CLEGALES\#/ms' ,__toHtml($row['CLEGALES'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#CJURIDICAS\#/ms' ,__toHtml($row['CJURIDICAS'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#CPATRIMONIALES\#/ms' ,__toHtml($row['CPATRIMONIALES'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		//$contenido =  $this->View->replace('/\#PINVERSIONES\#/ms' ,$row['PINVERSIONES'],$contenido);
		//posibles validaciones interna
		$contenido =  $this->View->replace('/\#DESC_INTERNA\#/ms' ,__toHtml($row['DESC_INTERNA'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		//posibles validaciones externa
		$contenido =  $this->View->replace('/\#DESC_EXTERNA\#/ms' ,__toHtml($row['DESC_EXTERNA'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		//distribucion de inversion
		$contenido =  $this->View->replace('/\#DISTRIBUCION_INVERSION\#/ms' ,$this->getDistribucionInversion(),$contenido);
		
		
		//$contenido =  $this->View->replace('/\#EFINANCIERA\#/ms' ,$row['EFINANCIERA'],$contenido);	
		
		
		$contenido =  $this->View->replace('/\#DINVPN\#/ms' ,__toHtml($row['dinVPN'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		
		$contenido =  $this->View->replace('/\#VPN\#/ms' ,__toHtml($row['VPN'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#PORCTIR\#/ms' ,$row['porcTIR'],$contenido);
		$contenido =  $this->View->replace('/\#TIR\#/ms' ,__toHtml($row['TIR'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#RBC\#/ms' ,__toHtml($row['RBC'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#DINPUNTOE\#/ms' ,__toHtml($row['DINPUNTOE'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#PUNTOE\#/ms' ,__toHtml($row['PUNTOE'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		
		$contenido =  $this->View->replace('/\#PORCROI\#/ms' ,$row['PORCROI'],$contenido);
		$contenido =  $this->View->replace('/\#ROI\#/ms' ,__toHtml($row['ROI'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		/* if(strlen($row['VPN'])==0){		 	
		$contenido =  $this->View->replace('/\#NORDOVPN\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#DISVPN\#/ms' ,'disabled="disabled"',$contenido);
		$contenido =  $this->View->replace('/\#VPN\#/ms' ,"",$contenido);
		}else{
		$contenido =  $this->View->replace('/\#RDOVPN\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#VPN\#/ms' ,$row['VPN'],$contenido);
		
		}		
		if(strlen($row['RBC'])==0){		 	
		$contenido =  $this->View->replace('/\#NORDORBC\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#DISRBC\#/ms' ,'disabled="disabled"',$contenido);	
		$contenido =  $this->View->replace('/\#RBC\#/ms' ,"",$contenido);
		}else{
		$contenido =  $this->View->replace('/\#RDORBC\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#RBC\#/ms' ,$row['RBC'],$contenido);
		
		}
		if(strlen($row['TIR'])==0){		 	
		$contenido =  $this->View->replace('/\#NORDOTIR\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#DISTIR\#/ms' ,'disabled="disabled"',$contenido);
		$contenido =  $this->View->replace('/\#TIR\#/ms' ,"",$contenido);
		}else{
		$contenido =  $this->View->replace('/\#RDOTIR\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#TIR\#/ms' ,$row['TIR'],$contenido);		
		}
		if(strlen($row['PUNTOE'])==0){		 	
		$contenido =  $this->View->replace('/\#NORDOPUNTOE\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#DISPUNTOE\#/ms' ,'disabled="disabled"',$contenido);
		$contenido =  $this->View->replace('/\#PUNTOE\#/ms' ,"",$contenido);
		}else{
		$contenido =  $this->View->replace('/\#RDOPUNTOE\#/ms' ,'checked="checked"',$contenido);
		$contenido =  $this->View->replace('/\#PUNTOE\#/ms' ,$row['PUNTOE'],$contenido);		
		}	*/
		
		$contenido =  $this->View->replace('/\#EDIRECTIVO\#/ms' ,__toHtml($row['EDIRECTIVO'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#CONCLUSIONES\#/ms' ,__toHtml($row['CONCLUSIONES'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		$contenido =  $this->View->replace('/\#CONSIDERACIONES\#/ms' ,__toHtml($row['CONSIDERACIONES'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		
		//$contenido =  $this->View->replace('/\#NODOSPRINCIPAL\#/ms' ,$this->nodoprincipal->nodos,$contenido);	
			$gantt = $this->ObtnerGantt($finicio,$ftermino);
		
		$contenido =  $this->View->replace('/\#FINICIO\#/ms' ,$finicio,$contenido);
		$contenido =  $this->View->replace('/\#FTERMINO\#/ms' ,$ftermino,$contenido);
	    $contenido =  $this->View->replace('/\#GANTT\#/ms' ,$gantt,$contenido);				
		
			
		
				
	$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
	
  }
  
  
  
  function ObtnerGantt($finicio,$ftermino){
		  	
			$gantt = "";
		  	
		    if($finicio != "" | $ftermino != ""){
			 	
			$this->Model->getEtapas($_GET['IDProyecto']);
			
			$numrecursos = sizeof($this->Model->etapas);
		    
		    $content = "";
		    if($numrecursos != 0){
			
		    foreach($this->Model->etapas as $row){
			     
			       $content .='{ id: "'.$row['PK1'].'", name: "'.$row['ETAPA'].'", series: [';				
		
			           $this->Model->getPasos($row['PK1']);
					   foreach($this->Model->pasos as $rowpaso){
					   	
						$fechasi = explode("-", $rowpaso['F_INICIO']);
			            $anoi = $fechasi[0];
			            $mesi = $fechasi[1]-1;
			            $diai = $fechasi[2];
			
			            $fechast = explode("-", $rowpaso['F_TERMINO']);
			            $anot = $fechast[0];
			            $mest = $fechast[1]-1;
			            $diat = $fechast[2];
						
			
			           $content .='{ id: "'.$rowpaso['PK1'].'", name: "'.$rowpaso['PASO'].'", start: new Date('.$anoi.','.$mesi.','.$diai.'), end: new Date('.$anot.','.$mest.','.$diat.'), color: "'.$rowpaso['COLOR'].'" },';
					   }
			
			       $content .=']},';
			      // $content .='>'.__toHtml($row['ETAPA'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}	
			      
			}else{
				
				$content = '' ;
			}
			
			
			$fechasi = explode("-", $finicio);
			$anoi = $fechasi[0];
			$mesi = $fechasi[1]-1;
			$diai = $fechasi[2];
			
			$fechast = explode("-", $ftermino);
			$anot = $fechast[0];
			$mest = $fechast[1]-1;
			$diat = $fechast[2];
			
		  	
			$gantt = '<script type="text/javascript">
		  	
			var ganttData = [
	{
		id: 1, name: "", series: [
			{ name: "Duración del Proyecto", start: new Date('.$anoi.','.$mesi.','.$diai.'), end: new Date('.$anot.','.$mest.','.$diat.'), color: "#F37410" }
		]
	}, 
	'.$content.'
    ];


$(function () {
			$("#ganttChart").ganttView({ 
				data: ganttData,
				slideWidth: 900,
			/*	behavior: {
					onClick: function (data) { 
						var msg = "You clicked on an event: {id:"+data.id+" start: " + data.start.toString("M/d/yyyy") + ", end: " + data.end.toString("M/d/yyyy") + " }";
						//$("#eventMessage").text(msg);
					},
					onResize: function (data) { 
						var msg = "You resized an event: { start: " + data.start.toString("M/d/yyyy") + ", end: " + data.end.toString("M/d/yyyy") + " }";
						//$("#eventMessage").text(msg);
						updatepasofecha(data.id,data.start.toString("yyyy-M-d"),data.end.toString("yyyy-M-d"));
					},
					onDrag: function (data) { 
						var msg = "You dragged an event: { start: " + data.start.toString("M/d/yyyy") + ", end: " + data.end.toString("M/d/yyyy") + " }";
						//$("#eventMessage").text(msg);
						updatepasofecha(data.id,data.start.toString("yyyy-M-d"),data.end.toString("yyyy-M-d"))
					}
				}*/
			});
			
		//	 $("#ganttChart").ganttView("setSlideWidth", 600);
		});
			
		  </script>';
		  
		  }
		  
		 
		  
		  return $gantt;
			
		  }
		  
		  
		  
		  
		  function getEtapas(){
		  	
			$content = '';
			$this->Model->getEtapas($_POST['idProyecto']);
			
			$numrecursos = sizeof($this->Model->etapas);
		    
		
		    if($numrecursos != 0){
			
		    foreach($this->Model->etapas as $row){
			     
			       $content .='<option value="'.$row['PK1'].'"';				
			
			       $content .='>'.__toHtml($row['ETAPA'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}	
			      
			
			
			}else{
				
				$content = '<option value="0">No existen resultados</option>' ;
			}
			
			echo $content;
		  	
		  }
      	 
	 
	   function getLineaE($idLe,$idPe){  			 
			
			$panelcontent = "";				
         
	    
	     $this->Model->getLineasPlane($idPe);
		$numlineas = sizeof($this->Model->lineas); 			
		if($numlineas != 0){ 
			
	        foreach($this->Model->lineas as $row){	
 	
			$panelcontent .='option value="'.$row['PK1'].'"';	
			
			if($idLe == $row['PK1']){
			$panelcontent .= 'selected="selected"';
		    }
						
			
			$panelcontent .='>'.__toHtml($row['LINEA'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}	       
		 
		  }
			
		 else{
		 	$panelcontent .='<option ><option>';
			 }				
		
			return $panelcontent;
	   }
	   
	    function getResultados($idOT,$idPlanO){
	   	//$idOT=PK_RESULTADOS
		$panelcontent = "";	
			
        //$ban = $_GET['ban'];
	    $this->Model->getResultados($idPlanO);
		$numRes = sizeof($this->Model->resultados); 			
		if($numRes != 0){ 
			
	        foreach($this->Model->resultados as $row){	
 	
			$panelcontent .='<option value="'.$row['PK1'].'"';				
			
			if($idOT == $row['PK1']){
			$panelcontent .= 'selected="selected"';
		    }	
			
			$panelcontent .='>'.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}		
			
	   
          }
			
		 else{ 
		       $panelcontent .='<option ><option>';
		     }				
		
		  
	    return $panelcontent;
		
		
	   }
	   
	   function getObjetivosE($idOE,$idLineaE){
	   	
		$panelcontent = "";		     	
         
	    $this->Model->getObjetivosE($idLineaE);
		$numobjetivos = sizeof($this->Model->objetivosE); 			
		if($numobjetivos != 0){ 
			
	        foreach($this->Model->objetivosE as $row){	
 	
			$panelcontent .='<option value="'.$row['PK1'].'"';
			
			if($idOE == $row['PK1']){
			$panelcontent .= 'selected="selected"';
		    }		
			
			$panelcontent .='>'.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}		
				   
          }
			
		 else{
		 	$panelcontent .='<option ><option>';
			 }				
		
		return $panelcontent;
		
	   }	 
	 
	
	 
	 
	 	
	 
	  function getObjetivosEspecificos(){
	  	
		$panelcontent = "";
		$script = "<script>";	
		$numOE=(int)0;
		if(isset($_GET['IDProyecto'])){		
			$this->Model->getObjetivosEspecificos( $_GET['IDProyecto']);
		    $numOE = sizeof($this->Model->objetivosEspecificos); 
			 
		}        
		
		if($numOE != 0){
			
			if($numOE>2){
		$script .='$(\'#BEP\').removeAttr("disabled");';
		}
		
		$cont=1;
		foreach($this->Model->objetivosEspecificos as $row){
		
		$id = $row['PK1'];		
        $objetivo = $row['OBJETIVO'];
	   
		
		$script .= "array_objespecificos.push('1');";
		//$script .= '$(\'#BEP\').removeAttr("disabled");';
		
	   	$panelcontent .=' 
        <tr id="P'.$cont.'">
        <td>&nbsp; </td>
        <td width="505">  
        <div class="input-prepend">
		<span class="" id="LABEL-P'.$cont.'">'.$cont.'. </span>'.
       __toHtml($objetivo, ENT_QUOTES, "ISO-8859-1").'
		</div></td>        
        </tr>';
		
		
		$cont++;
		  }
		}
		
		
		$script .= "</script>";
		
		$this->script = $script;		
		
		return $panelcontent;
		
	  }
	  
	  
	  function getDistribucionInversion(){
	  	
		$panelcontent = "";
		$script = "<script>";	
		$numDI=(int)0;
		if(isset($_GET['IDProyecto'])){		
			$this->Model->getDistribucionInversion( $_GET['IDProyecto']);
		    $numDI = sizeof($this->Model->distribucion_Inversion);			 
		}  	
		
		if($numDI != 0){
			
		if($numDI>2){
		$script .='$(\'#BED\').removeAttr("disabled");';
		}		
		
		$cont=1;
		foreach($this->Model->distribucion_Inversion as $row){
		
		$id = $row['PK1'];		
        $concepto = $row['CONCEPTO'];
		$monto = $row['MONTO'];
		
		$script .= "distribucion.push('1');";
		//$script .= '$(\'#BED\').removeAttr("disabled");';
		
	   	$panelcontent .=' 
        <tr id="D'.$cont.'">
        <td>&nbsp; </td>
        <td width="550px">  
        <div class="input-prepend">
		&nbsp;&nbsp;<span class="" id="LABEL-D'.$cont.'">'.$cont.'.</span>
        '.__toHtml($concepto, ENT_QUOTES, "ISO-8859-1").'
		</div>
		</td>		
		<td width=""><div class="input-prepend input-append">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="">$</span>'.$monto.' </div>
		</td>
		       
        </tr>';
		
		
		$cont++;
		  }
		}else{
			
		
			
			$panelcontent.= '<tr id="D1">
        	<td>&nbsp; </td>
        	<td width="505">  
       		<div class="input-prepend" >
			&nbsp;&nbsp;<span class="" id="LABEL-D1"></span>
        	
			</div></td>                          
       		<td width=""><div class="input-prepend input-append">
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 </div></td>        
        </tr>';		
			
		}		
		
		$script .= "</script>";
		
		$this->script2 = $script;		
		
		return $panelcontent;
		
	  } 
		 
	 

  public  function GuardarProyecto(){	
  
 /* $campos="";
		$objEspec = explode("|",$_POST['seguimiento']);
		
		for($i=0;$i<sizeof($objEspec)-1;$i++){			 		      
			   
		       $campos.= $objEspec[$i];}*/
		$this->Model->GuardarProyecto();				
	//	echo $campos;
		
		
 
		 
	
  }
		  
		  
	//=================================BUSCAR PLANES ESTRATEGICOS================================//
	   function BuscarPlanesEstrategicos(){
		
		$this->Model->buscarPlanesEstrategicos();
		$recurso = $this->getPaginadoHeaderModal();
		$recurso .= "#%#";
	
		$numrecursos = sizeof($this->Model->planes);
		$total = $this->Model->totalnum;
		
		if($numrecursos != 0){
			
		foreach($this->Model->planes as $row){
			
		
			 $recurso .= '<tr>
			 
			                     <td width="20"><input type="radio" value="'.$row['PK1'].'|'.$row['PK_JERARQUIA'].'|'.__toHtml($row['TITULO'], ENT_QUOTES, "ISO-8859-1").'" name="rbtplane" /></td>
			                    <td><h3>'.__toHtml($row['TITULO'], ENT_QUOTES, "ISO-8859-1").'</h3>
								</td>
			<td width="100"><h3>'.$row['PK_JERARQUIA'].'</h3></td>
								
								';
			
			}	
		
		$recurso .= "#%#";
		$recurso .= $this->getpaginadoFooterModal();
		$recurso .= "#%#";
		$recurso .= $total;
	    echo $recurso;	
	   
		}else{
		
		$recurso =$this->getPaginadoHeaderModal();
		$recurso .= "#%#";
		$recurso .= '<tr> <td colspan="5"><div class="empty_results">NO EXISTEN RESULTADOS</div></td></tr>';
		$recurso .= "#%#";
		$recurso .=$this->getpaginadoFooterModal();
		$recurso .= "#%#";
		$recurso .= $total;
		echo $recurso;	
		
		}
		
		
	}
	
	//=================================BUSCAR PLANES OPERATIVOS================================//
	
	function BuscarPlanesOperativos(){
		
		$this->Model->buscarPlanesOperativos();
		$recurso = $this->getPaginadoHeaderModal2();
		$recurso .= "#%#";
	
		$numrecursos = sizeof($this->Model->planes);
		$total = $this->Model->totalnum;
		
		if($numrecursos != 0){
			
		foreach($this->Model->planes as $row){
			
		
			 $recurso .= '<tr>
			 
			                     <td width="20"><input type="radio" value="'.$row['PK1'].'|'.$row['PK_JERARQUIA'].'|'.__toHtml($row['TITULO'], ENT_QUOTES, "ISO-8859-1").'" name="rbtplano" /></td>
			                    <td><h3>'.__toHtml($row['TITULO'], ENT_QUOTES, "ISO-8859-1").'</h3>
								</td>
			<td width="100"><h3>'.$row['PK_JERARQUIA'].'</h3></td>
								
								';
			
			}	
		
		$recurso .= "#%#";
		$recurso .= $this->getpaginadoFooterModal2();
		$recurso .= "#%#";
		$recurso .= $total;
		//$recurso .= "#%#";
		//$recurso .=  $this->obtenerLineas();
	    echo $recurso;	
	   
		}else{
		
		$recurso =$this->getPaginadoHeaderModal2();
		$recurso .= "#%#";
		$recurso .= '<tr> <td colspan="5"><div class="empty_results">NO EXISTEN RESULTADOS</div></td></tr>';
		$recurso .= "#%#";
		$recurso .=$this->getpaginadoFooterModal2();
		$recurso .= "#%#";
		$recurso .= $total;
		//$recurso .= "#%#";
		//$recurso .=  $this->obtenerLineas();
		echo $recurso;	
		
		}
		
		
	}
	
	
	   function obtenerLineas(){  			 
			
			$panelcontent = "";				
         
	    
	     $this->Model->getLineasPlane($_GET['idplane']);
		$numlineas = sizeof($this->Model->lineas); 			
		if($numlineas != 0){ 
			
	        foreach($this->Model->lineas as $row){	
 	
			$panelcontent .='<option value="'.$row['PK1'].'"';				
			
			$panelcontent .='>'.__toHtml($row['LINEA'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}	       
		 
		  }
			
		 else{
		 	
			$panelcontent .= '<option>NO EXISTEN RESULTADOS</option> ';
			$panelcontent .=  "#%#";
			$panelcontent .= 'no existen lineas';
			
		 }				
		
			echo $panelcontent;
	   }
	   
	   
	   function obtenerObjetivosE_Res(){
	   	
		$panelcontent2 = "";		     	
         
	    $this->Model->getObjetivosE(trim($_GET['idLineaE']));
		$numobjetivos = sizeof($this->Model->objetivosE); 			
		if($numobjetivos != 0){ 
			
	        foreach($this->Model->objetivosE as $row){	
 	
			$panelcontent2 .='<option value="'.$row['PK1'].'"';		
			
			$panelcontent2 .='>'.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}		
			
			//$panelcontent2 .= "#%#";			
		   // $panelcontent2 .= $this->obtenerResultados();    
	        echo $panelcontent2;
	   
          }
			
		 else{
		 	$panelcontent2 .= '<option>NO EXISTEN RESULTADOS</option> ';
			//$panelcontent2 .= "#%#";			
		    //$panelcontent2 .= $this->obtenerResultados(); 
			$panelcontent2 .= "#%#";
			$panelcontent2 .= 'no existen lineas';   
	        echo $panelcontent2;
		 }				
		
		
		
	   }
	   
	   function obtenerResultados(){
	   	
		$panelcontent2 = "";	
			
      
	    $this->Model->getResultados($_GET['idPlanO']);
		$numRes = sizeof($this->Model->resultados); 			
		if($numRes != 0){ 
			
	        foreach($this->Model->resultados as $row){	
 	
			$panelcontent2 .='<option value="'.$row['PK1'].'"';		
			
			$panelcontent2 .='>'.__toHtml($row['OBJETIVO'], ENT_QUOTES, "ISO-8859-1").'</option>';
			}		
			
	   
          }
			
		 else{
		 	
			$panelcontent2 .= '<option>NO EXISTEN RESULTADOS</option> ';
			$panelcontent2 .= "#%#";
			$panelcontent2 .= 'no existen lineas'; 
		 }				
		
		  
	    echo $panelcontent2;
		
		
	   }
	   
	   
	
    function UploadFile(){
		
		//$this->num = intval(trim($_GET['numFrm']));
		$this->num = $_REQUEST['numFrm'];
		
			//echo $num;
							
	  $filext = strtolower(basename($_FILES['imagearticulo'.$this->num]['name']));
	  $filext = explode(".",$filext);
	  $tipofile = $filext[1];
	  
	  	
	   switch($tipofile){
	   	
		case "jpg":
		case "png":
		    $this->tipo = "IMG";
			$this->UploadImagen();
			break;
		
		case "mp3":
		case "wav":
		$this->UploadArchivo();
		$this->tipo = "AUD";
		$this->image = "media/thumbnails/thum_ik_audio.png";
			break;
		
		
		case "mp4":
		case "m4v":
		case "flv":
		case "avi":
		case "mov":
		
		$this->UploadArchivo();
		$this->tipo = "VID";
		$this->image = "media/thumbnails/thum_ik_video.png";
			break;
		
		
		case "doc":
		case "docx":
			$this->UploadArchivo();
			$this->tipo = "DOC";
			$this->image = "media/thumbnails/thum_ik_word.png";
			break;
		
		
		case "xls":
		case "xlsx":
			$this->UploadArchivo();
			$this->tipo = "XLS";
			$this->image = "media/thumbnails/thum_ik_excel.png";
			break;
		
		
		
		case "ppt":
		case "pptx":
			$this->UploadArchivo();
			$this->tipo = "PPT";
			$this->image = "media/thumbnails/thum_ik_ppt.png";
			break;
		
		case "pdf":
		$this->UploadArchivo();
		$this->tipo = "PDF";
		$this->image = "media/thumbnails/thum_ik_pdf.png";
			break;
		
		
		case "zip":
		$this->UploadArchivo();
		$this->tipo = "ZIP";
		$this->image = "media/thumbnails/thum_ik_zip.png";
			break;
		
		case "txt":
		$this->UploadArchivo();
		$this->image = "media/thumbnails/thum_ik_txt.png";
		$this->tipo = "TXT";
		break;		
			
	    default:
		
		$this->image = "media/thumbnails/thum_ik_file.png";
		$this->UploadArchivo();
		break;
		
		}
			
		
		    $idProyecto = $_REQUEST['idProyecto'.$this->num];
			 
			$tipo = $this->tipo;
			$titulo = $_POST['titulo'.$this->num];
			//$autor = $_POST['autor'.$this->num];
			$descripcionModal = $_POST['descripcionModal'.$this->num];			
			$imagen = $this->image;
			$adjunto = $this->adjunto;	
			$nomRImage = $this->nomRImage;   
			
			
			if($_POST['editar'.$this->num]=="TRUE"){
				
				$idArchivo = $_POST['idArchivo'.$this->num];
				$this->Model->EditFile($idArchivo,$tipo, $titulo, $descripcionModal, $idProyecto, $imagen, $adjunto,$nomRImage);				
			}else{
			
				$this->Model->UploadFile($tipo, $titulo,$descripcionModal, $idProyecto, $imagen, $adjunto,$nomRImage);
			}
								
			
				
			
			
			
	
        }


     function UploadImagen(){
		 	
	
	if($_FILES['imagearticulo'.$this->num]['name']){
		
	       $num = (int)$this->num;
	       if($num == 1){$this->targetPathumbail = "media/proyectos/analisisM/";}	
	       elseif($num == 2){$this->targetPathumbail = "media/proyectos/analisisF/";}
	       else{$this->targetPathumbail = "media/proyectos/anexos/";}
		   
	//$this->targetPathumbail = "media/proyectos/anexos/";	   
	
	setlocale(LC_CTYPE, 'es');
	$image = strtolower(basename($_FILES['imagearticulo'.$this->num]['name']));
	$imagensinext = explode(".",$image);
	$name =  strtolower(uniqid('IMG'));
	$image = strtolower($name.'.'.$imagensinext[1]);
	$imageupload = new Upload($_FILES['imagearticulo'.$this->num]);
	$imageupload->file_new_name_body = $name;
	
	$this->nomRImage = $imagensinext[0];
      
	$this->image = strtolower($name.'.'.$imagensinext[1]);

    $this->adjunto = $this->targetPathumbail.$this->image;
	
	if ($imageupload->uploaded) {
	
         $imageupload->Process($this->targetPathumbail);
            if ($imageupload->processed) {


			//Escalamos la imagen para thumbail
		 $imageupload->file_new_name_body = 'thum_170x170_'.$name;
	     $imageupload->image_resize = true;
         $imageupload->image_ratio_fill = true;
         $imageupload->image_y = 170;
         $imageupload->image_x = 170;
		 
		 $imageupload->Process($this->targetPathumbail);
		 if ($imageupload->processed) {
             //creamos la imagen pequeña
	    
		 $imageupload->file_new_name_body =  'thum_340x220_'.$name; 
	     $imageupload->image_resize = true;
         $imageupload->image_y = 220;
         $imageupload->image_x = 340;
		 $imageupload->Process($this->targetPathumbail);
		 
		 if ($imageupload->processed) {
			
			return TRUE;

				}
			 	 
    
         } else {
         return FALSE; //ERROR THUMBAIL
          }
			
             } else {
               return FALSE; //echo 'error : ' . $foo->error;
             }
			 
			 //SI NO ANEXARON  IMAGEN
			 }else
			 {
			 	
				return TRUE;
			  }
			
     }
		  
		  }
		
	
	
	
	 function UploadArchivo(){
		 	
	
	if($_FILES['imagearticulo'.$this->num]['name']){		
		
		
	   $num=(int)$this->num;
	   if($num == 1){$this->targetPathumbail = "media/proyectos/analisisM/";}	
	   else if($num == 2){$this->targetPathumbail = "media/proyectos/analisisF/";}
	   else{$this->targetPathumbail = "media/proyectos/anexos/";}
	//$this->targetPathumbail = "media/proyectos/anexos/";
		   
	setlocale(LC_CTYPE, 'es');
	$this->image = strtolower(basename($_FILES['imagearticulo'.$this->num]['name']));
    
	$imagensinext = explode(".",$this->image);
	$name =  strtolower(uniqid('file'));
	$this->image = strtolower($name.'.'.$imagensinext[1]);
	$imageupload = new Upload($_FILES['imagearticulo'.$this->num]);
	$imageupload->file_new_name_body = $name;
	$this->adjunto = $this->targetPathumbail.$name.'.'.$imagensinext[1];
	
	$this->nomRImage = $imagensinext[0];
	
	if ($imageupload->uploaded) {
	
         $imageupload->Process($this->targetPathumbail);
            if ($imageupload->processed) {

                 return TRUE;
			
             } else {
               return FALSE; //echo 'error : ' . $foo->error;
             }
			 
			 //SI NO ANEXARON  IMAGEN
			 }else{
			 	
				return TRUE;
			 }
			
     }
		  
		  }
	
	 function obtenerArchivo(){
	 	
		$num = $_GET['num'];
		$this->num = (int)$num;
		
		$idProyecto = $_GET['idProyecto'];
		
		//$editArchivo = $_GET['editArchivo'];
		
		/*if($editArchivo == TRUE){*/
			$this->Model->buscarArchivosEdit($this->num, $idProyecto);
		/*}else{
			$this->Model->buscarArchivos($this->num);
		}*/
	
		$recurso ="";		
	
		$numrecursos = sizeof($this->Model->archivos);
		$total = $this->num;//$this->Model->totalnum;
		
		if($numrecursos != 0){
			
		foreach($this->Model->archivos as $row){
			
            $nombre = $row['NOMBRE'];
			$titulo = $row['TITULO'];
			$ID = $row['PK1'];
            //$imagen = $row['IMAGEN'];
			
			
			if(trim($row['TIPO'])=="IMG"){
				
				 $dirfile = $row['ADJUNTO'];				
				 $partes_ruta = pathinfo($dirfile);	
											
				$IMAGEN170X170 = $partes_ruta['dirname'].'/thum_170x170_'.$partes_ruta['basename'];
	                  
				
				//$IMAGEN170X170 = "media/proyectos/anexos/thum_170x170_".$row['IMAGEN'];
			}else{
				$IMAGEN170X170 = $row['IMAGEN'];
			}
			
			$imagen = ($row['IMAGEN']=="") ? "skins/default/img/desconocido.jpg" : $IMAGEN170X170 ;
			$fecha = __formatDate($row['FECHA_R']);
			$formato = $row['TIPO'];
			
			$linkrecurso = "";
			
						
			if($row['IMAGEN']==""){
				
				$linkrecurso = "uploadEditFiles('".$this->num."',true,'".$row['PK1']."','".__toHtml($row['TITULO'])."','".__toHtml($row['DESCRIPCION'])."','".__toHtml($row['AUTOR'])."');return false;";
			    }
			
			else{
				$linkrecurso = "WindowOpen('".$row['PK1']."','".$row['PK_PROYECTO']."');return false;";			
		         }
		
		
	 //$lindelete = "Javascript: deleteEvidencia('".$row['PK1']."');";  
	  
	  $content = $this->View->Template(TEMPLATE.'modules/proyecto/RECURSO.TPL');
	  $content = $this->View->replace('/\#TITULO\#/ms' ,__toHtml($titulo,25) ,$content);
	  $content = $this->View->replace('/\#IMAGEN\#/ms' ,$imagen,$content);
	  $content = $this->View->replace('/\#FORMATO\#/ms' ,$formato,$content);
     //$content = $this->View->replace('/\#ID\#/ms' ,$ID,$content);
	 $content = $this->View->replace('/\#ID\#/ms' ,__toHtml($nombre,25),$content);
	  $content = $this->View->replace('/\#FECHA\#/ms' ,$fecha,$content);
	  $content = $this->View->replace('/\#LINKRECURSO\#/ms' ,$linkrecurso,$content);
	  
	  if($this->num == 1){$permisoedit='P294';}
	  if($this->num == 2){$permisoedit='P296';}
	  if($this->num == 3){$permisoedit='P298';}
	 
	 
	/* if($this->passport->getPrivilegio($idProyecto,$permisoedit)){
			
	   $urledit = '<div class="action-icon price"><a href="#" onclick="uploadEditFiles(\''.$this->num.'\',true,\''.$row['PK1'].'\',\''.__toHtml($row['TITULO']).'\',\''.__toHtml($row['DESCRIPCION']).'\',\''.__toHtml($row['PK_PROYECTO']).'\');return false;"><img border="0" src="skins/default/img/icn_edit.png" width="16" height="16"></div>';
		
		$content = $this->View->replace('/\<!--#LINKEDIT#-->/ms' ,$urledit,$content);;	
		
		}
	  if($this->num == 1){$permisoborrar='P295';}
	  if($this->num == 2){$permisoborrar='P297';}
	  if($this->num == 3){$permisoborrar='P299';}
	  
	 if($this->passport->getPrivilegio($idProyecto,$permisoborrar)){
			
	   $urlborrar = '<div class="action-icon cart"><a href="javascript:void(0)" onclick="deleteArchivo(\''.$row['PK1'].'\',\''.$this->num.'\');"><img border="0" src="skins/default/img/icn_trash.png" width="16" height="14"></div>'; 
	  $content = $this->View->replace('/\<!--#LINKDELETE#-->/ms' ,$urlborrar,$content);	 	 
		
		}  */ 
	 
	  
	  $recurso .= $content;
			
	}	
		
		
		$recurso .= "#%#";
		$recurso .= $total;
	    echo $recurso;	
	   
		}else{
		
		$recurso .= '<tr> <td colspan="5"><div class="empty_results">NO EXISTEN RESULTADOS</div></td></tr>';
		$recurso .= "#%#";
		$recurso .= $total;
		echo $recurso;	
		
		}
		
		
	}
	
	 function EliminarArchivo(){
	 	
	 	$this->num = $_GET['num'];
		$recurso = $this->num;
		$fila = $this->Model->getArchivo($_GET['idArchivo']);
		$dirfile = $fila['ADJUNTO'];
		
			
			if(trim($fila['TIPO']) == 'IMG'){
				//eliminar archivos del servidor
				unlink($dirfile);
				$partes_ruta = pathinfo($dirfile);								
				unlink($partes_ruta['dirname'].'/thum_340x220_'.$partes_ruta['basename']);
				unlink($partes_ruta['dirname'].'/thum_170x170_'.$partes_ruta['basename']);
				
			}else{
				//eliminar archivo del servidor
				unlink($dirfile);			
				}
		
		//eliminar la referencia del archivo de la BD
		$this->Model->EliminarArchivo($_GET['idArchivo']);
		
		
		echo $recurso;	
		  }
	
	
	 function getPaginadoHeaderModal(){	
	 

		// $this->Model->buscarUsuarios();
		 	
	#---------------------PAGINADO---------------------------#
			 $q = (isset($_GET['q']))? "&q=".$_GET['q'] : ""; 
			$paginadoHeader ='
			
		
     <div class="left">
	  
            <input type="text" name="searchbarpe" id="searchbarpe"    />
							<button class="btn btn-small" onclick="buscarPE();"   id="search_go-button-pe"><i class="icon-search"></i> Buscar</button>
                        
	  </div>
	  
	  
      <div class="bar_seperator"></div>
      
	  <div id="search_page_size-panel">
	    
        <div class="page_size_25" onClick="showLimitPage2(25,this);" id="page_size_25-panel2"></div>
		<div class="page_size_50" onClick="showLimitPage2(50,this);" id="page_size_50-panel2"></div>
        <div class="page_size_100" onClick="showLimitPage2(100,this);" id="page_size_100-panel2"></div>
        <div class="page_size_200" onClick="showLimitPage2(200,this);" id="page_size_200-panel2"></div>
	
     
	 </div>
     
	 
	 
	   
	    
      <div class="search_pagination">
	  ';
		 
	  
      $prevpag = (int)$_GET["p"]-1;
	 
	  if($prevpag>$this->Model->totalPag || $prevpag<1){
	  
	  $prevbutton  ='<div class="page_button left button_disable"></div>';
	  }else{
	 
	  $prevbutton = '<a href="javascript:void(0)" onclick="showPage('.$prevpag.');"> <div class="page_button left"></div></a>';
	  }
	  
	   
     
	   $paginadoHeader.=  $prevbutton.' <div class="page_overview_display">
          <input type="text" value="'.$_GET["p"].'" class="page_number-box">
          &nbsp;de&nbsp;'.$this->Model->totalPag.'</div>';
       
	  $nextpag = (int)$_GET["p"]+1;
	  
	  if($nextpag>$this->Model->totalPag){
	  	$nextbutton = '<div class="page_button right button_disable"></div>';
	  }else{
	  	$nextbutton = '<a href="javascript:void(0)" onclick="showPage('.$nextpag.');"> <div class="page_button right "></div></a>';
	  }
	   
	 $paginadoHeader .= $nextbutton.' 
	  </div>';
		#--------------------- END PAGINADO---------------------------#
		
			
		
		//$this->View->replace_content('/\#FILTERHEADER\#/ms' ,$paginadoHeader);
		return $paginadoHeader;
		}
		
		
		
		function getpaginadoFooterModal(){
		
		#---------------------PAGINADO FOOTER---------------------------#
		$paginadoFooter ='<div class="search_navigation">
    <div class="search_pagination">';
      
	  $prevpag = (int)$_GET["p"]-1;
	  
	  if($prevpag>$this->Model->totalPag || $prevpag<1){
	  
	  $prevbutton  ='<div class="page_button left button_disable"></div>';
	  }else{
	  $prevbutton = '<a href="javascript:void(0)" onclick="showPage('.$prevpag.');"> <div class="page_button left"></div></a>';
	  }
	  
	   $paginadoFooter.=  $prevbutton.' <div class="page_overview_display">
          <input type="text" value="'.$_GET["p"].'" class="page_number-box">
          &nbsp;de&nbsp;'.$this->Model->totalPag.'</div>';
       
	  $nextpag = (int)$_GET["p"]+1;
	  
	  if($nextpag>$this->Model->totalPag){
	  	$nextbutton = '<div class="page_button right button_disable"></div>';
	  }else{
	  	$nextbutton = '<a href="javascript:void(0)" onclick="showPage('.$nextpag.');"> <div class="page_button right "></div></a>';
	  }
	   
	 $paginadoFooter .= $nextbutton.'
    </div>
	
	  <div class="left"> 
                        <div id="results_textModal">
               0 resultados
               </div>
               </div>
	
  </div>';	
		 #---------------------END PAGINADO FOOTER---------------------------#
		
		//$this->View->replace_content('/\#FILTERFOOTER\#/ms' ,$paginadoFooter);
		
		return $paginadoFooter;
	}
	
	#-------------------------HEADER modal PLAN OPERATIVO   -----#
	
	
	function getPaginadoHeaderModal2(){	
	 

		
		 	
	#---------------------PAGINADO---------------------------#
			 $q = (isset($_GET['q']))? "&q=".$_GET['q'] : ""; 
			$paginadoHeader ='
			
		
     <div class="left">
	  
            <input type="text" name="searchbarpo" id="searchbarpo"    />
							<button class="btn btn-small" onclick="buscarPO();"   id="search_go-button-pe"><i class="icon-search"></i> Buscar</button>
                        
	  </div>
	  
	  
      <div class="bar_seperator"></div>
      
	  <div id="search_page_size-panel">
	    
        <div class="page_size_25" onClick="showLimitPage(25,this);" id="page_size_25-panel"></div>
		<div class="page_size_50" onClick="showLimitPage(50,this);" id="page_size_50-panel"></div>
        <div class="page_size_100" onClick="showLimitPage(100,this);" id="page_size_100-panel"></div>
        <div class="page_size_200" onClick="showLimitPage(200,this);" id="page_size_200-panel"></div>
	
     
	 </div>
     
	 
	 
	   
	    
      <div class="search_pagination">
	  ';
		 
	  
      $prevpag = (int)$_GET["p"]-1;
	 
	  if($prevpag>$this->Model->totalPag || $prevpag<1){
	  
	  $prevbutton  ='<div class="page_button left button_disable"></div>';
	  }else{
	 
	  $prevbutton = '<a href="javascript:void(0)" onclick="showPage2('.$prevpag.');"> <div class="page_button left"></div></a>';
	  }
	  
	   
     
	   $paginadoHeader.=  $prevbutton.' <div class="page_overview_display">
          <input type="text" value="'.$_GET["p"].'" class="page_number-box">
          &nbsp;de&nbsp;'.$this->Model->totalPag.'</div>';
       
	  $nextpag = (int)$_GET["p"]+1;
	  
	  if($nextpag>$this->Model->totalPag){
	  	$nextbutton = '<div class="page_button right button_disable"></div>';
	  }else{
	  	$nextbutton = '<a href="javascript:void(0)" onclick="showPage2('.$nextpag.');"> <div class="page_button right "></div></a>';
	  }
	   
	 $paginadoHeader .= $nextbutton.' 
	  </div>';
		#--------------------- END PAGINADO---------------------------#
		
			
		
		//$this->View->replace_content('/\#FILTERHEADER\#/ms' ,$paginadoHeader);
		return $paginadoHeader;
		}
		
		
		
	function getpaginadoFooterModal2(){
		
		#---------------------PAGINADO FOOTER---------------------------#
		$paginadoFooter ='<div class="search_navigation">
    <div class="search_pagination">';
      
	  $prevpag = (int)$_GET["p"]-1;
	  
	  if($prevpag>$this->Model->totalPag || $prevpag<1){
	  
	  $prevbutton  ='<div class="page_button left button_disable"></div>';
	  }else{
	  $prevbutton = '<a href="javascript:void(0)" onclick="showPage2('.$prevpag.');"> <div class="page_button left"></div></a>';
	  }
	  
	   $paginadoFooter.=  $prevbutton.' <div class="page_overview_display">
          <input type="text" value="'.$_GET["p"].'" class="page_number-box">
          &nbsp;de&nbsp;'.$this->Model->totalPag.'</div>';
       
	  $nextpag = (int)$_GET["p"]+1;
	  
	  if($nextpag>$this->Model->totalPag){
	  	$nextbutton = '<div class="page_button right button_disable"></div>';
	  }else{
	  	$nextbutton = '<a href="javascript:void(0)" onclick="showPage2('.$nextpag.');"> <div class="page_button right "></div></a>';
	  }
	   
	 $paginadoFooter .= $nextbutton.'
    </div>
	
	  <div class="left"> 
                        <div id="results_textModal2">
               0 resultados
               </div>
               </div>
	
  </div>';	
		 #---------------------END PAGINADO FOOTER---------------------------#
		
		//$this->View->replace_content('/\#FILTERFOOTER\#/ms' ,$paginadoFooter);
		
		return $paginadoFooter;
	}
	
	
	function getComentariosProyecto($idProyecto,$cont,$permisocomentar,$permisoborrar){
	  $script ='<script> ';	  
	  $script .='   						
		    $("#inputField-T'.$cont.'").bind("blur focus keydown keypress keyup", function(){recount(\''.$cont.'\');});
	        $("#update_button-T'.$cont.'").attr("disabled","disabled");
		    $("#inputField-T'.$cont.'").Watermark("Agrega tu comentario ...");
			 ';			 
	    $script .='
			</script>';			 
			 
		$section = "";
		
		
		
	  	$panelcontent='   
		
		 <!--====================BOTON DE COMENTARIOS=====================-->';
				 
				/* $permiso = ($_GET['estado']=="R") ? "P86" : "P50";
				 if($this->passport->getPrivilegio($_GET['IDPlan'],$permiso)){*/
				 
				$panelcontent .=' <div class="box-icon" align="right">
				  <span style="float:right; position:relative; left:-10px;" class="notification">'.$this->Model->getNumeroComentarios($idProyecto,$cont).'</span>
<a href="javascript:void(0)" onclick="Tooglecomentarios(this.id);" class="btn btn-minimize btn-round" id="COM-T'.$cont.'"><i class="icon-chevron-down"></i> Comentarios</a>
						
					
</div>';
        //}
		
		$panelcontent .= '<!--====================BOTON DE COMENTARIOS=====================-->
		  
		  <!--====================COMENTARIOS=====================-->
		
		  
		 <div class="box-objetivos" style="display:none;" id="BOXCOM-T'.$cont.'">';
			
			// $permiso = ($_GET['estado']=="R") ? "P84" : "P48";			
			//   if($this->passport->getPrivilegio($idProyecto,$permisocomentar)){
			   
			   $panelcontent .='<div id="twitter-container"> <span class="counter" id="counter-T'.$cont.'"></span>
			    <textarea name="inputField" id="inputField-T'.$cont.'"   tabindex="1" rows="2" cols="40" style="width: 800px; height: 60px;"></textarea></br></br>';
			   
			  
			 // if($this->passport->getPrivilegio($_GET['IDPlan'],'P82')){ 
			   $panelcontent .= '<label class="checkbox inline">
			   <div class="checker"><span><input type="checkbox" value="option1" id="mandatorio-proyecto-T'.$cont.'" style="opacity: 0;"></span></div><h3>Mandatorio</h3>
				</label>';
	           // }			
			   
			   
			   
			  
			 $panelcontent .='<input class="submitButton inact" name="submit" type="button" onClick="guardarComentario(this.id,\''.$idProyecto.'\',\''.$cont.'\');" value="comentar" disabled="disabled" id="update_button-T'.$cont.'" />
			 
			 </div><div class="clear"></div>';
			   
			//	}
				
				
	$panelcontent .='
		  
		
          <div id="flashmessage">	
    <div id="flash"></div>
	  		</div>
   		  <div class="comentarios" id="comentarios-T'.$cont.'">';
		  
		  
		            //  echo $rowobj['PK1']."<";
	           $this->Model->getComentarios($idProyecto,$cont);
		       $numcomentarios = sizeof($this->Model->comentarios); 
					
					if($numcomentarios != 0){
					
						foreach($this->Model->comentarios as $rowcomentarios){
 						{
                             
							 
							$tipo = trim($rowcomentarios['TIPO']);							 
							$comentario_id= $rowcomentarios['PK1'];
							$usuario_id=$rowcomentarios['PK_USUARIO'];
							$fecha = $rowcomentarios['FECHA_R'];
							$comentario = stripslashes(__toHtml($rowcomentarios['COMENTARIO']));
												
							$rowusuario	= $this->Model->getImagen($usuario_id);	
							$imagen =  "media/usuarios/".$rowusuario['IMAGEN'];
							
							$usuario = $rowusuario['NOMBRE']."".$rowusuario['APELLIDOS'];
				             
							 
							if($tipo=="M"){$class = "stbody2"; $class2='<span class="label label-important">Mandatorio</span>';}else{ $class = "stbody"; $class2=""; }
							 
							 
				$panelcontent .='<div class="'.$class.'" id="stbody'.$comentario_id.'">
    		<div class="sttimg"><img src="'.$imagen.'" class="big_face"/></div> 
    		<div class="sttext">';
			
			  //$permiso = ($_GET['estado']=="R") ? "P85" : "P49";
			  
			/*if($this->passport->getPrivilegio($idProyecto,$permisoborrar)){
		      $panelcontent .='<a class="stdelete" href="#" id="'.$comentario_id.'" title="Borrar comentario"><i class="icon-remove"></i></a>';
		     }*/
			
	$panelcontent .=' 
    					<strong><a href="#" class="comentuser">'.__toHtml($usuario, ENT_QUOTES, "ISO-8859-1").'</a></strong>
						'.$class2.'
						<br/>
						'.$comentario.'
   						<div class="sttime">'.date('d/m/Y H:i:s', strtotime($fecha)).'</div> 
    				</div>  
				</div>';
    
 		}
	 }
	
	}
	
   $panelcontent .=' </div></div>
           <!--====================END COMENTARIOS=====================-->';
		
		
		
	$section .= $panelcontent;
	$section .= $script;
	$section .= '</br></br></br></br>';									
	return $section;
		
		
 }
 
 function insertarComentario(){
	
			
			if(isset($_POST['tipo'])){$tipo = $_POST['tipo'];}else{ $tipo = "R";}
			
			if($tipo=="M"){$class = "stbody2"; $class2='<span class="label label-important">Mandatorio</span>';}else{ $class = "stbody"; $class2=""; }
			
			$id = $this->Model->insertarComentario($_POST['comentario'],$_POST['idProyecto'],$_POST['num'],$tipo);
		    $usuario = $_SESSION['session']['titulo'].' '.$_SESSION['session']['nombre'].' '.$_SESSION['session']['apellidos'];
		    $imagen = 'media/usuarios/thum_40x40_'.$_SESSION['session']['imagen'];
			
			$fecha = date("d/m/Y H:i:s");
			
			echo '<div class="'.$class.'" id="stbody'.$id.'">
    <div class="sttimg"><img src="'.$imagen.'" class="big_face"/></div> 
    <div class="sttext"><a class="stdelete" href="#" id="'.$id.'" title="Borrar comentario"><i class="icon-remove"></i></a>
	
	<strong><a href="#">'.__toHtml($usuario).'</a></strong>
	'.$class2.'
	<br/>
    '.$_POST['comentario'].'
   	<div class="sttime">'.$fecha.'</div> 
</div>';
		 	
		 }

          
	 function eliminarComentario(){
	
			$this->Model->eliminarComentario($_POST['idcomentario']);
		
	 }
		 
	
	
	
	
	function insertarComentarioGral(){
		 	
			
			if(isset($_POST['tipo'])){$tipo = $_POST['tipo'];}else{ $tipo = "R";}
			
			if($tipo=="M"){$class = "stbody2"; $class2='<span class="label label-important">Mandatorio</span>';}else{ $class = "stbody"; $class2=""; }
			
			$id = $this->Model->insertarComentarioGralProyecto($_POST['comentario'],$_POST['idProyecto'],$tipo);
			 $usuario = $_SESSION['session']['titulo'].' '.$_SESSION['session']['nombre'].' '.$_SESSION['session']['apellidos'];
		    $imagen = 'media/usuarios/thum_40x40_'.$_SESSION['session']['imagen'];
			
			$fecha = date("d/m/Y H:i:s");
			
			echo '<div class="'.$class.'" id="stbodyr'.$id.'">
    <div class="sttimg"><img src="'.$imagen.'" class="big_face"/></div> 
    <div class="sttext"><a class="stdeleter" href="#" id="r'.$id.'" title="Borrar comentario"><i class="icon-remove"></i></a>
	
	<strong><a href="#">'.__toHtml($usuario).'</a></strong>
	'.$class2.'
	<br/>
    '.$_POST['comentario'].'
   	<div class="sttime">'.$fecha.'</div> 
</div>';
		 	
		 }
		 
	  //pestaña COMENTARIOS 
	  function getComentariosGralesProyecto($idProyecto,$permisocomentar,$permisoborrar){
		  	
			$panelcontent = "";
			
		// $permiso = ($_GET['estado']=="R") ? "P84" : "P48";			
		//	if($this->passport->getPrivilegio($idProyecto,$permisocomentar)){
			$panelcontent = '<!--====================COMENTARIOS=====================-->
		  
		 
		   <div id="twitter-container">
			
			    <span class="counter" id="counter-gralproyecto"></span>
			    <textarea name="inputField" id="inputField-gralproyecto"   tabindex="1" rows="2" cols="40" style="width: 800px; height: 60px;"></textarea></br></br>';
			   
			
				  $panelcontent .= '<label class="checkbox inline">
			   <div class="checker"><span><input type="checkbox" value="option1" id="mandatorio-gralproyecto" style="opacity: 0;"></span></div><h3>Mandatorio</h3>
				</label>';
				
			   
			  $panelcontent .= '<input class="submitButton inact" name="submit" type="button" onClick="guardarComentarioGralProyecto();" value="comentar" disabled="disabled" id="update_button-gralproyecto" />
			    <div class="clear"></div>
		    
		  </div>';
		  
		//  }
		  
       $panelcontent .='<div id="flashmessage">	
    <div id="flash"></div>
	  		</div>
   		  <div class="comentarios" id="comentarios-gralproyecto">';
		  
		  
		            
	           $this->Model->getComentariosGralesProyecto($idProyecto);
		       $numcomentarios = sizeof($this->Model->comentarios); 
		  
		            
					if($numcomentarios != 0){
			
						foreach($this->Model->comentarios as $rowcomentariosr){
 						{
							
							$tipo = trim($rowcomentariosr['TIPO']);
							$comentario_id=$rowcomentariosr['PK1'];
							$usuario_id=$rowcomentariosr['PK_USUARIO'];
							$fecha = $rowcomentariosr['FECHA_R'];
							$comentario = stripslashes(__toHtml($rowcomentariosr['COMENTARIO']));
							
							$rowusuario	= $this->Model->getImagen($usuario_id);	
							$imagen =  "media/usuarios/".$rowusuario['IMAGEN'];
							
							$usuario = $rowusuario['NOMBRE']." ".$rowusuario['APELLIDOS'];
							 
							 
							if($tipo=="M"){$class = "stbody2"; $class2='<span class="label label-important">Mandatorio</span>'; }else{ $class = "stbody"; $class2=""; }
							 
				$panelcontent .='<div class="'.$class.'" id="stbodyr'.$comentario_id.'">
    		<div class="sttimg"><img src="'.$imagen.'" class="big_face"/></div> 
    		<div class="sttext">';
			
		/*	if($this->passport->getPrivilegio($idProyecto,$permisoborrar)){
		   $panelcontent .='<a class="stdeleter" href="#" id="r'.$comentario_id.'" title="Borrar comentario"><i class="icon-remove"></i></a>';
		   }*/
			
			 $panelcontent .= ' 
    					<strong><a href="#" class="comentuser">'.__toHtml($usuario).'</a></strong>
						'.$class2.'<br>
						'.$comentario.'
   						<div class="sttime">'.date('d/m/Y H:i:s', strtotime($fecha)).'</div> 
    				</div>  
				</div>';
    
 		}
	 }
	
	}
	
   $panelcontent .=' </div>
        
                     <!--====================END COMENTARIOS=====================-->';
		  
			return $panelcontent;
		  }
		  
		  
		  
		  function eliminarComentarioGralProyecto(){
		  	
			$this->Model->eliminarComentarioGralProyecto($_POST['idcomentario']);
			
		  }
	
	 function EnviarAjustesUniversidad(){		
			
			 $idProyecto = $_GET['idProyecto'];	
			 $this->Model->EnviarAjustesUniversidad($idProyecto,$_GET['estado']);
		
			
		  }
		  
	  function IntegrarPropuesta(){		
			
			 $idProyecto = $_GET['idProyecto'];	
			 $this->Model->IntegrarPropuesta($idProyecto,$_GET['estado']);
		
			
		  }
		  
	

		  
	

	
}

?>