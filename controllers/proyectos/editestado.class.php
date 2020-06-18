<?php
include "models/proyectos/editestado.model.php";
include "libs/resizeimage/class.upload.php";


class editestado {

    var $View;
	var $Model;
	var $menu;
	var $nodos;
	var $image;
	var $targetPathumbail;
	var $script;
	

	function __construct() {
		
     $this->passport = new Authentication();
	 $this->menu = new Menu();
	 $this->Model = new editestadoModel();
		
	 switch($_GET['method']){
	 	
		case "GuardarEstadoProyecto":
			$this->GuardarEstadoProyecto();
			break;
			
		default:	
	      $this->View = new View(); 
          $this->loadPage();
		  break;
		}
				 
		 
	}
	
	
	
	 function loadPage(){
	
		$this->View->template = TEMPLATE.'FRMPRINCIPAL.TPL';	
		$this->View->loadTemplate();
		$this->loadHeader();
		$this->loadMenu();
		
		//if($this->passport->privilegios->hasPrivilege('P26')){
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
	 	
		
		$contenido = $this->View->Template(TEMPLATE.'modules/proyecto/ESTADO.TPL');
		
		$row = $this->Model->getProyecto($_GET['IDProyecto']);
		
		
		$contenido =  $this->View->replace('/\#IDPROYECTO\#/ms' ,__toHtml($row['PK1']),$contenido);
		
		$contenido =  $this->View->replace('/\#TITULO\#/ms' ,__toHtml($row['PROYECTO'], ENT_QUOTES, "ISO-8859-1"),$contenido);
		
		
		/*ESTADO*/
	    
		$estado = trim($row['ESTADO']);
		

		switch($estado){
			
			case "E":
			$contenido =  $this->View->replace('/\#ELABORANDO\#/ms' ,'checked="checked"',$contenido);
			break;
						
			case "RP":
			$contenido =  $this->View->replace('/\#REVISIONP\#/ms' ,'checked="checked"',$contenido);
			break;
			
			case "R":
			$contenido =  $this->View->replace('/\#REVISION\#/ms' ,'checked="checked"',$contenido);
			break;
						
			case "RE":
			$contenido =  $this->View->replace('/\#REVISIONE\#/ms' ,'checked="checked"',$contenido);
			break;			
			
			case "EX":
			$contenido =  $this->View->replace('/\#REVISADOE\#/ms' ,'checked="checked"',$contenido);
			break;	
			
			case "PA":
			$contenido =  $this->View->replace('/\#PROPAJUSTES\#/ms' ,'checked="checked"',$contenido);
			break;
			
			case "RA":
			$contenido =  $this->View->replace('/\#REVISIONA\#/ms' ,'checked="checked"',$contenido);
			break;
			
			case "IN":
			$contenido =  $this->View->replace('/\#INTEGRARPROPUESTA\#/ms' ,'checked="checked"',$contenido);
			break;
			
			case "AP":
			$contenido =  $this->View->replace('/\#AGENDARPRES\#/ms' ,'checked="checked"',$contenido);
			break;
			
			case "PP":
			$contenido =  $this->View->replace('/\#PRESENTACION\#/ms' ,'checked="checked"',$contenido);
			break;			
			
			case "IP":
			$contenido =  $this->View->replace('/\#INICIOPROP\#/ms' ,'checked="checked"',$contenido);
			break;
			
			case "NA":
			$contenido =  $this->View->replace('/\#NOAPROBADO\#/ms' ,'checked="checked"',$contenido);
			break;
			
			default:
			$contenido =  $this->View->replace('/\#PENDIENTE\#/ms' ,'checked="checked"',$contenido);
			break;
			
		}
	
		
		$this->View->replace_content('/\#CONTENT\#/ms' ,$contenido);
		 }
	 

         function GuardarEstadoProyecto(){
		
		 
		    $this->Model->idProyecto = $_POST['idProyecto'];			
			$this->Model->estado = $_POST['estado'];
			$this->Model->GuardarEstadoProyecto();
			
			
			
          }
		  	  
	

	
}

?>